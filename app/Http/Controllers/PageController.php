<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    
    protected $viewsDir;
    
    public function __construct() {        
        $this->viewsDir = "application.cms.pages.";
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->viewsDir.'index_pages');
    }
    
    public function listPagesJson() {
        $pages = $this->getPagesTree(null, collect(), 0);        
        return response()->json($pages);
    }
    
    public function getPagesTree($idPageParent, $pages_tree, $nivel) {                
        if ($idPageParent == NULL) {
            $pages = \App\Page::whereNull('page_parent_id')
                    ->whereIn('state',array('A','I'))
                    ->orderBy('order','asc')
                    ->get();
        } else {
            $pages = \App\Page::where('page_parent_id','=',$idPageParent)
                    ->whereIn('state',array('A','I'))
                    ->orderBy('order','asc')
                    ->get();
        }
        
        if (!$pages->isEmpty()) { 
            foreach ($pages as $page) :                
                $etiqueta = "<table class='menu_index_tree'><tr>";
                $etiqueta .= str_repeat('<td style="width: 2%;"></td>', $nivel);
                $etiqueta .= "<td>";
                $etiqueta = $page->children_pages->count()>0 ? $etiqueta."<i class='fa fa-sort-down' /> " : $etiqueta;
                $etiqueta .= $page->page_id."</td></tr></table>";                
                $page->name = $etiqueta;                
                $pages_tree->push($page);                
                $pages_tree = $this->getPagesTree($page->page_id, $pages_tree, $nivel+1);
            endforeach;
        }
        
        return $pages_tree;
    }        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $pages_list = $this->getPagesOptionTree(NULL, '', 1, NULL);
        $page = new \App\Page();
        $page_content = array();
        $active_sliders = \App\Slider::where('state','A')->get();
        $page_types = \App\CatalogDetail::where('catalog_id','TIPPAGWEB')->get();
        return view($this->viewsDir.'create_page',compact(['pages_list','page','page_content','active_sliders','page_types']));
    }
    
    public function getPagesOptionTree($idPageParent, $pages_list, $nivel, $idSelectedPage) {               
        if ($idPageParent == NULL) {
            $pages = \App\Page::whereNull('page_parent_id')
                    ->whereIn('state',array('A','I'))
                    ->orderBy('order','asc')
                    ->get();
        } else {
            $pages = \App\Page::where('page_parent_id','=',$idPageParent)
                    ->whereIn('state',array('A','I'))
                    ->orderBy('order','asc')
                    ->get();
        }               
        
        if (!$pages->isEmpty()) {            
            foreach ($pages as $page) :
                $selected = '';
            
                if ($idSelectedPage != NULL && $idSelectedPage==$page->page_id):
                    $selected = 'selected="selected"';
                endif;                                
                
                $prefijoMenu = "";
                
                for ($i=1; $i<$nivel;$i++) :
                    $prefijoMenu .= str_repeat('&nbsp;', 10).' ';
                endfor;
                
                $prefijoMenu .= $page->children_pages->count()>0 ? str_repeat('&nbsp;', 10).'> ' : str_repeat('&nbsp;', 10).' ';
                
                $pages_list = $pages_list
                        .'<option value="'.$page->page_id.'" '.$selected.' >'
                            //.str_repeat('&nbsp;', $nivel*10)
                            .$prefijoMenu
                            .$page->page_id
                        .'</option>';                                                    
                $pages_list = $this->getPagesOptionTree($page->page_id, $pages_list, $nivel+1, $idSelectedPage);
            endforeach;
        }
        
        return $pages_list;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $this->validate(request(),[
            'page_id' => 'string|required|unique:pages',
            'cat_det_id_type' => 'required',            
            'name' => 'string',
            'icon' => 'max:20',
            'menu_class' => 'max:50',            
            'order' => 'numeric|integer',
            
            'container_class' => 'max:50',
            'title' => 'max:255',
            
            'state' => 'required|max:1'
            
        ]);                                                                       
        
        $page = new \App\Page();
        $page->page_id = $request->page_id;
        $page->cat_id_type = "TIPPAGWEB";
        $page->cat_det_id_type = $request->cat_det_id_type;
        
        if (isset($request->is_menu_item)) :
            $page->name = $request->name;
            $page->icon = $request->icon;
            $page->menu_class = $request->menu_class;
            $page->order = $request->order;
            $page->is_menu_item = true;
        else:
            $page->is_menu_item = false;
        endif;
        
        $page->container_class = $request->container_class;
        $page->title = $request->title;
                
        $page->state = $request->state;        
        if($request->page_parent_id != '0') {
            $page->page_parent_id = $request->page_parent_id;
        } else {
            $page->page_parent_id = NULL;
        }
        $page->save();
        
        
        $request_page_content = $request->page_content;
        
        if (isset($request_page_content)):
            //Crear page content
            foreach ($request_page_content as $pagcont) :                                    
                $new_content = new \App\Content();
                $new_content->cat_id_type = "TIPCONWEB";
                                
                if ($pagcont['content_type'] == 'HTMLSEC') :
                    $newhtmlsec = new \App\HtmlSection();
                    $newhtmlsec->html_content = $pagcont['html_content'];
                    $newhtmlsec->save();
                    
                    $new_content->htmlsection_id = $newhtmlsec->htmlsection_id;
                    $new_content->cat_det_id_type = "HTMLSEC";
                    
                elseif($pagcont['content_type'] == 'SLIDER') :
                    $new_content->cat_det_id_type = "SLIDER";
                    $new_content->slider_id = $pagcont['slider_id'];
                
                elseif($pagcont['content_type'] == 'FORM') :
                    $new_content->cat_det_id_type = "FORM";
                
                endif;
                
                $new_content->save();
                
                $new_pagecontent = new \App\PageContent();
                $new_pagecontent->content_id = $new_content->content_id;
                $new_pagecontent->order = $pagcont['order'];
                $new_pagecontent->columns_on_lg = $pagcont['columns_on_lg'];
                $new_pagecontent->columns_on_g = $pagcont['columns_on_g'];
                $new_pagecontent->columns_on_md = $pagcont['columns_on_md'];
                $page->page_content()->save($new_pagecontent);                                
            endforeach;
        endif;
        
        $page_content = \App\PageContent::where("page_id",$page->page_id)
                                    ->orderBy('order','asc')
                                    ->get();
        
        return view($this->viewsDir.'partial.view_page', compact(['page','page_content']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = \App\Page::find($id);
        $page_content = \App\PageContent::where("page_id",$page->page_id)
                                    ->orderBy('order','asc')
                                    ->get();
        return view($this->viewsDir.'show_page',compact(['page','pages_list','page_content']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = \App\Page::findOrFail($id);
        $pages_list = $this->getPagesOptionTree(NULL, '', 1, $page->parent_page == null?null:$page->parent_page->page_id);
        $page_content = \App\PageContent::where("page_id",$page->page_id)
                                    ->orderBy('order','asc')
                                    ->get();
        $active_sliders = \App\Slider::where('state','A')->get();
        $page_types = \App\CatalogDetail::where('catalog_id','TIPPAGWEB')->get();
        return view($this->viewsDir.'edit_page',compact(['page','pages_list','page_content','active_sliders','page_types']));                                
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $messages = [
            'page_parent_id.different' => 'Error de recursividad. Una página no puede ser escogida como su propia Página Padre.',
        ];                        
        
        $this->validate(request(),[
            'page_id' => 'string|required',
            'cat_det_id_type' => 'required',
            
            'name' => 'string',
            'icon' => 'max:20',
            'menu_class' => 'max:50',            
            'order' => 'numeric|integer',
            
            'container_class' => 'max:50',
            'title' => 'max:255',
            
            'state' => 'required|max:1',
            'page_parent_id' => 'different:page_id'
        ], $messages);
        
        $page = \App\Page::find($request->page_id);
        $page->cat_id_type = "TIPPAGWEB";
        $page->cat_det_id_type = $request->cat_det_id_type;
        
        if (isset($request->is_menu_item)) :
            $page->name = $request->name;
            $page->icon = $request->icon;
            $page->menu_class = $request->menu_class;
            $page->order = $request->order;
            $page->is_menu_item = true;
        else:
            $page->is_menu_item = false;
        endif;
        
        $page->container_class = $request->container_class;
        $page->title = $request->title;
                
        $page->state = $request->state;        
        if($request->page_parent_id != '0') {
            $page->page_parent_id = $request->page_parent_id;
        } else {
            $page->page_parent_id = NULL;
        }

        $page->update();                
        
        
        $request_page_content = $request->page_content;
        
        if (!$page->page_content->isEmpty()) :
            if (isset($request_page_content)) :
                // Update Content
                foreach($page->page_content as $pagcont):                                                            
                    if (isset($request_page_content[$pagcont->page_content_id])) :                                                                                                 
                        
                        if ($pagcont->content->cat_det_id_type == "HTMLSEC" && isset($pagcont->content->htmlsection)
                                && $pagcont->content->htmlsection->html_content != $request_page_content[$pagcont->page_content_id]['html_content']) :
                            $pagcont->content->htmlsection->html_content = $request_page_content[$pagcont->page_content_id]['html_content'];
                            $pagcont->content->htmlsection->update();
                        endif;                                                                                                                                           
                        
                        $contentHasChanged = false;
                        
                        if ($pagcont->columns_on_lg != $request_page_content[$pagcont->page_content_id]['columns_on_lg']):
                            $pagcont->columns_on_lg = $request_page_content[$pagcont->page_content_id]['columns_on_lg'];
                            $contentHasChanged = true;
                        endif;
                        
                        if ($pagcont->columns_on_g != $request_page_content[$pagcont->page_content_id]['columns_on_g']):
                            $pagcont->columns_on_g = $request_page_content[$pagcont->page_content_id]['columns_on_g'];
                            $contentHasChanged = true;
                        endif;
                        
                        if ($pagcont->columns_on_md != $request_page_content[$pagcont->page_content_id]['columns_on_md']):
                            $pagcont->columns_on_md = $request_page_content[$pagcont->page_content_id]['columns_on_md'];
                            $contentHasChanged = true;
                        endif;
                        
                        if ($pagcont->order != $request_page_content[$pagcont->page_content_id]['order']):
                            $pagcont->order = $request_page_content[$pagcont->page_content_id]['order'];
                            $contentHasChanged = true;
                        endif;
                        
                        if ($contentHasChanged):
                            $pagcont->update();
                        endif;
                        
                        unset($request_page_content[$pagcont->page_content_id]);                    
                    else:
                        $contfordelete = $pagcont->content;
                        $pagcont->delete();
                        $contfordelete->delete();
                    endif; 
                endforeach;
            else :
                // Delete all page content                
                foreach($page->page_content as $pagcontd) :
                    $contfordelete = $pagcontd->content;
                    $pagcontd->delete();
                    $contfordelete->delete();                    
                endforeach;                 
            endif;
        endif;
        
        if (isset($request_page_content)):
            //Crear page content
            foreach ($request_page_content as $pagcont) :                                    
                $new_content = new \App\Content();
                $new_content->cat_id_type = "TIPCONWEB";
                                
                if ($pagcont['content_type'] == 'HTMLSEC') :
                    $newhtmlsec = new \App\HtmlSection();
                    $newhtmlsec->html_content = $pagcont['html_content'];
                    $newhtmlsec->save();
                    
                    $new_content->htmlsection_id = $newhtmlsec->htmlsection_id;
                    $new_content->cat_det_id_type = "HTMLSEC";
                    
                elseif($pagcont['content_type'] == 'SLIDER') :
                    $new_content->cat_det_id_type = "SLIDER";
                    $new_content->slider_id = $pagcont['slider_id'];
                
                elseif($pagcont['content_type'] == 'FORM') :
                    $new_content->cat_det_id_type = "FORM";
                
                endif;
                
                $new_content->save();
                
                $new_pagecontent = new \App\PageContent();
                $new_pagecontent->content_id = $new_content->content_id;
                $new_pagecontent->order = $pagcont['order'];
                $new_pagecontent->columns_on_lg = $pagcont['columns_on_lg'];
                $new_pagecontent->columns_on_g = $pagcont['columns_on_g'];
                $new_pagecontent->columns_on_md = $pagcont['columns_on_md'];
                $page->page_content()->save($new_pagecontent);                                
            endforeach;
        endif;      
        
        $page_content = \App\PageContent::where("page_id",$page->page_id)
                                    ->orderBy('order','asc')
                                    ->get();
        
        return view($this->viewsDir.'partial.view_page', compact(['page','page_content']));
    }
     
    public function listMediaFilesJson(Request $request) {
                        
        if (!isset($request->parent_dir)) :
            $request->parent_dir = '_resource/images/';
        endif;
        
        $parent_dir = realpath($request->parent_dir);        
        
        $images_files = array_diff(scandir($parent_dir,0), array('.','..'));                
        $dir_tree = '';

        $files_tree = '';
                
        //$files_tree .= '<p-lightbox>';
        
        if ($parent_dir != realpath('_resource/images/')):
            $ud = realpath($request->parent_dir.DIRECTORY_SEPARATOR."..");
            $pd = str_replace(base_path().DIRECTORY_SEPARATOR."public_html".DIRECTORY_SEPARATOR, "", $ud);
            $up_level_dir = str_replace(DIRECTORY_SEPARATOR, "/", $pd);

            $dir_tree.= '<a class="back_directory" id="'.$up_level_dir.'" >'
                        . '<div class="ui-g-6 ui-md-4 ui-lg-2" >'
                        . '<img style="width: 100px; height: 100px;" src="'.asset('_resource/thumbs/folder-back-128.png').'" />'
                        . '<p><small><span class="text-center bolded"></span></small></p>'
                        . '</div>'                    
                        . '</a>';
        endif;                
        
        foreach ($images_files as $fichero) :
            $t = $parent_dir."/".$fichero;            
            if (is_dir($t)) :
                $dir_tree.= '<a class="directory" id="'.$fichero.'" >'
                    . '<div class="ui-g-6 ui-md-4 ui-lg-2" >'
                    . '<img style="width: 100px; height: 100px;" src="'.asset('_resource/thumbs/folder-128.png').'" />'
                    . '<p><small><span class="text-center bolded">'.$fichero.'</span></small></p>'
                    . '</div>'                    
                    . '</a>';
            elseif(is_file($t)):                               
                $check = getimagesize($t);                
                $dimensionesFichero = "";
                if ($check != false) {
                    $dimensionesFichero .= "".$check[0]." x ".$check[1]." px.";
                }                
                
                $infoFichero = '<p>'.$fichero;
                $infoFichero .= "<br /> <small>(".  number_format(filesize($t)/1024,2)." Kb)</small>";
                $infoFichero .= "<br /><small>".$dimensionesFichero."</small></p>";
                
                $detallesFichero = "<p><small>".$fichero."</small>";                                
                $detallesFichero .= '<br /><small>'.$dimensionesFichero.'</small>';
                $detallesFichero .= "<br /> <small>(".  number_format(filesize($t)/1024,2)." Kb)</small>";
                $detallesFichero .= '</p>';
                
                $files_tree.= ''
                    . '<div class="ui-g-6 ui-md-4 ui-lg-2">'
                    . '<a class="file" onclick="selectFile(\''.asset($request->parent_dir.$fichero).'\',\''.$request->parent_dir.$fichero.'\',\''.$infoFichero.'\')"  >'
                    . '<img style="width: 100px; height: 100px;" src="'.asset($request->parent_dir.$fichero).'" title="'.$dimensionesFichero.'" />'
                    . '</a>'                   
                    . $detallesFichero
                    . ''
                    . '</div>';  
            endif;
            clearstatcache();            
        endforeach;
        //$files_tree .= '</p-lightbox>';
        
        $files_tree = $dir_tree.$files_tree;
        return $files_tree;
    }
    
    public function viewImageSelector() {
        $root_dir = '_resource/images/';           
        return view($this->viewsDir.'partial.image_selector',compact('root_dir'));
    }
}
