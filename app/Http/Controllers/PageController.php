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
                $etiqueta .= $page->name."</td></tr></table>";                
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
                            .$page->name
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
            'name' => 'required|unique:pages',
            'icon' => 'max:20',
            'html_class' => 'max:50',            
            'state' => 'required|max:1',
            'order' => 'required|numeric|integer'
        ]);
        
        $page = new \App\Page();
        $page->name = $request->name;
        $page->icon = $request->icon;
        $page->html_class = $request->html_class;
        $page->is_menu_item = isset($request->is_menu_item) ? true : false;        
        $page->state = $request->state;
        $page->order = $request->order;
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
        return view($this->viewsDir.'show_page',compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = \App\Page::find($id);
        $pages_list = $this->getPagesOptionTree(NULL, '', 1, $page->parent_page == null?null:$page->parent_page->page_id);        
        return view($this->viewsDir.'edit_page',compact(['page','pages_list']));                                
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
            'icon' => 'max:20',
            'html_class' => 'max:50',            
            'state' => 'required|max:1',
            'order' => 'required|numeric|integer',
            'page_parent_id' => 'different:page_id',
        ], $messages);
        
        $page = \App\Page::find($request->page_id);
        //$page->name = $request->name;
        $page->icon = $request->icon;
        $page->html_class = $request->html_class;
        $page->is_menu_item = isset($request->is_menu_item) ? true : false;        
        $page->state = $request->state;
        $page->order = $request->order;
        if($request->page_parent_id != '0') {
            $page->page_parent_id = $request->page_parent_id;
        } else {
            $page->page_parent_id = NULL;
        }
        $page->save();
        
        return view($this->viewsDir.'partial.view_page', compact('page'));
    }

}
