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
        return view($this->viewsDir.'create_page',compact('pages_list'));
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
            
            'name' => 'string',
            'icon' => 'max:20',
            'menu_class' => 'max:50',            
            'order' => 'numeric|integer',
            
            'title' => 'max:255',
            
            'state' => 'required|max:1'
            
        ]);
        
        $page = new \App\Page();
        $page->page_id = $request->page_id;
        
        if (isset($request->is_menu_item)) :
            $page->name = $request->name;
            $page->icon = $request->icon;
            $page->menu_class = $request->menu_class;
            $page->order = $request->order;
            $page->is_menu_item = true;
        else:
            $page->is_menu_item = false;
        endif;
        
        $page->title = $request->title;
                
        $page->state = $request->state;        
        if($request->page_parent_id != '0') {
            $page->page_parent_id = $request->page_parent_id;
        } else {
            $page->page_parent_id = NULL;
        }
        $page->save();
        
        return view($this->viewsDir.'partial.view_page', compact('page'));
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
        return view($this->viewsDir.'edit_page',compact(['page','pages_list','page_content']));                                
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
            
            'name' => 'string',
            'icon' => 'max:20',
            'menu_class' => 'max:50',            
            'order' => 'numeric|integer',
            
            'title' => 'max:255',
            
            'state' => 'required|max:1',
            'page_parent_id' => 'different:page_id'
        ], $messages);
        
        $page = \App\Page::find($request->page_id);
        
        if (isset($request->is_menu_item)) :
            $page->name = $request->name;
            $page->icon = $request->icon;
            $page->menu_class = $request->menu_class;
            $page->order = $request->order;
            $page->is_menu_item = true;
        else:
            $page->is_menu_item = false;
        endif;
        
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
                        
                        if ($pagcont->order != $request_page_content[$pagcont->page_content_id]['order']):
                            $pagcont->order = $request_page_content[$pagcont->page_content_id]['order'];
                            $pagcont->update();
                        endif;
                        
                        unset($request_page_content[$pagcont->page_content_id]);                    
                    else:
                        $pagcont->delete();
                    endif; 
                endforeach;
            else :
                // Delete all page content                
                foreach($page->page_content as $pagcontd) :                    
                    $pagcontd->delete();
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
                
                elseif($pagcont['content_type'] == 'FORM') :
                    $new_content->cat_det_id_type = "FORM";
                
                endif;
                
                $new_content->save();
                
                $new_pagecontent = new \App\PageContent();
                $new_pagecontent->content_id = $new_content->content_id;
                $new_pagecontent->order = $pagcont['order'];
                $page->page_content()->save($new_pagecontent);                                
            endforeach;
        endif;      
        
        $page_content = \App\PageContent::where("page_id",$page->page_id)
                                    ->orderBy('order','asc')
                                    ->get();
        
        return view($this->viewsDir.'partial.view_page', compact(['page','page_content']));
    }

}
