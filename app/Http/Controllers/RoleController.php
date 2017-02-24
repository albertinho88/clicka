<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $viewsDir;
    
    public function __construct() {
        $this->middleware('auth');
        $this->viewsDir = "application.management.roles.";
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view($this->viewsDir.'index_roles');
    } 
    
    public function listRolesJson() {
        $roles = \App\Role::all();        
        return response()->json($roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active_menu_options = $this->getActiveMenuOptionsTree(null, collect(), 1);
        return view($this->viewsDir.'create_role',['active_menu_options'=>$active_menu_options]);
    }
    
    public function getActiveMenuOptionsTree($idMenuParent, $menu_tree, $nivel) {                
        if ($idMenuParent == NULL) {
            $menus = \App\MenuOption::whereNull('menu_parent_id')
                    ->whereIn('state',array('A'))
                    ->orderBy('order','asc')
                    ->get();
        } else {
            $menus = \App\MenuOption::where('menu_parent_id','=',$idMenuParent)
                    ->whereIn('state',array('A'))
                    ->orderBy('order','asc')
                    ->get();
        }
        
        if (!$menus->isEmpty()) { 
            foreach ($menus as $menu) :
                $etiqueta = "";
                
                for ($i=1; $i<$nivel;$i++) :
                    $etiqueta .= str_repeat('&nbsp;', 10).' ';
                endfor;
                
                $etiqueta .= $menu->children_menu_option->count()>0 ? '> ' : ' ';
                
                //$etiqueta = $menu->children_menu_option->count()>0 ? $etiqueta."> " : $etiqueta;
                $etiqueta .= $menu->label;                
                $menu->label = $etiqueta;                
                $menu_tree->push($menu);                
                $menu_tree = $this->getActiveMenuOptionsTree($menu->menu_id, $menu_tree, $nivel+1);
            endforeach;
        }
        
        return $menu_tree;
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
            'name' => 'required',
            'state' => 'required'
        ]);
        
        $role = new \App\Role();
        $role->name = $request->name;                
        $role->state = $request->state;
        $role->save();
        
        return view($this->viewsDir.'partial.view_role', compact('role'));
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
        $role = \App\Role::find($id);
        return view($this->viewsDir.'show_role', compact('role'));
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
        $role = \App\Role::find($id);
        return view($this->viewsDir.'edit_role', compact('role'));
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
            'name' => 'required',
            'state' => 'required'
        ]);
        
        $role = \App\Role::find($request->role_id);
        $role->name = $request->name;                
        $role->state = $request->state;
        $role->save();
        
        return view($this->viewsDir.'partial.view_role', compact('role'));
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
