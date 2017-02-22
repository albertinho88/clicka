<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuOptionController extends Controller
{
    
    protected $viewsDir;
    
    public function __construct() {
        $this->middleware('auth');
        $this->viewsDir = "application.management.menu_options.";
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view($this->viewsDir.'index_menu_options');
    }
    
    public function listMenuOptionsJson() {
        $menu_options = \App\MenuOption::all();        
        return response()->json($menu_options);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $menu_options_list = \App\MenuOption::whereIn('state',array('A','I'))->get();            
        return view($this->viewsDir.'create_menu_option',['menu_options_list'=>$menu_options_list]);
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
            'label' => 'required|max:100',
            'url' => 'required|max:500',
            'type' => 'required|max:10',
            'state' => 'required|max:1',
            'order' => 'required|numeric|integer'
        ]);
        
        $menu_option = new \App\MenuOption();
        $menu_option->label = $request->label;
        $menu_option->url = $request->url;
        $menu_option->type = $request->type;
        $menu_option->state = $request->state;
        $menu_option->order = $request->order;
        $menu_option->menu_parent_id = $request->menu_parent_id;
        $menu_option->save();
        
        return view($this->viewsDir.'partial.view_menu_option', compact('menu_option'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $menu_option = \App\MenuOption::find($id);
        return view($this->viewsDir.'show_menu_option', compact('menu_option'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $menu_option = \App\MenuOption::find($id);
                
        $menu_options_list = \App\MenuOption::whereIn('state',array('A','I'))->get();      
        
        if (isset($menu_option->parent_menu_option)) {
            foreach ($menu_options_list as $menop) :                
                if ($menu_option->parent_menu_option->menu_id == $menop->menu_id) :
                    $menop->selected = 'selected="selected"';
                endif;
            endforeach;
        }
        return view($this->viewsDir.'edit_menu_option', ['menu_option'=>$menu_option, 'menu_options_list'=>$menu_options_list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $this->validate(request(),[
            'label' => 'required|max:100',
            'url' => 'required|max:500',
            'type' => 'required|max:10',
            'state' => 'required|max:1',
            'order' => 'required|numeric|integer'
        ]);
        
        $menu_option = \App\MenuOption::find($request->menu_id);
        $menu_option->label = $request->label;
        $menu_option->url = $request->url;
        $menu_option->type = $request->type;
        $menu_option->state = $request->state;
        $menu_option->order = $request->order;
        if($request->menu_parent_id != '0') {
            $menu_option->menu_parent_id = $request->menu_parent_id;
        } else {
            $menu_option->menu_parent_id = NULL;
        }
        $menu_option->update();
        
        return view($this->viewsDir.'partial.view_menu_option', compact('menu_option'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
