<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        //$menu_options = \App\MenuOption::all();        
        $menu_options = $this->getMenuTree(null, collect(), 0);                
        return response()->json($menu_options);
    }
    
    public function getMenuTree($idMenuParent, $menu_tree, $nivel) {                
        if ($idMenuParent == NULL) {
            $menus = \App\MenuOption::whereNull('menu_parent_id')
                    ->whereIn('state',array('A','I'))
                    ->orderBy('order','asc')
                    ->get();
        } else {
            $menus = \App\MenuOption::where('menu_parent_id','=',$idMenuParent)
                    ->whereIn('state',array('A','I'))
                    ->orderBy('order','asc')
                    ->get();
        }
        
        if (!$menus->isEmpty()) { 
            foreach ($menus as $menu) :
                
                $etiqueta = "<table class='menu_index_tree'><tr>";
                $etiqueta .= str_repeat('<td style="width: 2%;"></td>', $nivel);
                $etiqueta .= "<td>";
                $etiqueta = $menu->children_menu_option->count()>0 ? $etiqueta."<i class='fa fa-sort-down' /> " : $etiqueta;
                $etiqueta .= $menu->label."</td></tr></table>";                
                $menu->label = $etiqueta;                
                $menu_tree->push($menu);                
                $menu_tree = $this->getMenuTree($menu->menu_id, $menu_tree, $nivel+1);
            endforeach;
        }
        
        return $menu_tree;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_options_list = $this->getMenuOptionTree(NULL, '', 1, NULL);        
        return view($this->viewsDir.'create_menu_option',['menu_options_list'=>$menu_options_list]);
    }        
    
    public function getMenuOptionTree($idMenuParent, $menu_options_list, $nivel, $idSelectedMenu) {               
        if ($idMenuParent == NULL) {
            $menus = \App\MenuOption::whereNull('menu_parent_id')
                    ->whereIn('state',array('A','I'))
                    ->orderBy('order','asc')
                    ->get();
        } else {
            $menus = \App\MenuOption::where('menu_parent_id','=',$idMenuParent)
                    ->whereIn('state',array('A','I'))
                    ->orderBy('order','asc')
                    ->get();
        }                
        
        if (!$menus->isEmpty()) {            
            foreach ($menus as $menu) :
                $selected = '';
            
                if ($idSelectedMenu != NULL && $idSelectedMenu==$menu->menu_id):
                    $selected = 'selected="selected"';
                endif;
                
                //$prefijoMenu = $menu->children_menu_option->count()>0 ? "> " : "";
                
                $prefijoMenu = "";
                
                for ($i=1; $i<$nivel;$i++) :
                    $prefijoMenu .= str_repeat('&nbsp;', 10).' ';
                endfor;
                
                $prefijoMenu .= $menu->children_menu_option->count()>0 ? str_repeat('&nbsp;', 10).'> ' : str_repeat('&nbsp;', 10).' ';
                
                $menu_options_list = $menu_options_list
                        .'<option value="'.$menu->menu_id.'" '.$selected.' >'
                            //.str_repeat('&nbsp;', $nivel*10)
                            .$prefijoMenu
                            .$menu->label
                        .'</option>';                                                    
                $menu_options_list = $this->getMenuOptionTree($menu->menu_id, $menu_options_list, $nivel+1, $idSelectedMenu);
            endforeach;
        }
        
        return $menu_options_list;
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
            'icon' => 'max:20',
            'url' => 'required|max:500',
            'type' => 'required|max:10',
            'state' => 'required|max:1',
            'order' => 'required|numeric|integer'
        ]);
        
        $menu_option = new \App\MenuOption();
        $menu_option->label = $request->label;
        $menu_option->icon = $request->icon;
        $menu_option->url = $request->url;
        $menu_option->type = $request->type;
        $menu_option->state = $request->state;
        $menu_option->order = $request->order;
        if($request->menu_parent_id != '0') {
            $menu_option->menu_parent_id = $request->menu_parent_id;
        } else {
            $menu_option->menu_parent_id = NULL;
        }
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
        $menu_option = \App\MenuOption::find($id);                
        $menu_options_list = $this->getMenuOptionTree(NULL, '', 1, $menu_option->parent_menu_option == null?null:$menu_option->parent_menu_option->menu_id);        
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
        $messages = [
            'menu_parent_id.different' => 'Error de recursividad. Una opción de menú no puede ser escogida como su propio Menú Padre.',
        ];
        
        $this->validate(request(),[
            'label' => 'required|max:100',
            'icon' => 'max:20',
            'url' => 'required|max:500',
            'type' => 'required|max:10',
            'state' => 'required|max:1',
            'order' => 'required|numeric|integer',
            'menu_parent_id' => 'different:menu_id',            
        ], $messages);
        
        $menu_option = \App\MenuOption::find($request->menu_id);
        $menu_option->label = $request->label;
        $menu_option->icon = $request->icon;
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
