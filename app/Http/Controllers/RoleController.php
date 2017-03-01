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
        
        if ($request->role_menu_options) :                    
            foreach ($request->role_menu_options as $menuop) :                        
                $role_per_menop = new \App\RoleMenuOption();
                $role_per_menop->menu_id = $menuop;
                $role_per_menop->state = 'A';                
                $role->role_menu_options()->save($role_per_menop);
            endforeach;
        endif;
        
        $active_menu_options = $this->getActiveMenuOptionsTree(null, collect(), 1);
        foreach($active_menu_options as $menop) :            
            if ($role->active_role_menu_options->contains('menu_id',$menop->menu_id)) :
                $menop->selected = 'visible';
            endif;               
        endforeach;
        
        return view($this->viewsDir.'partial.view_role', ['role'=>$role,'active_menu_options'=>$active_menu_options]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $active_menu_options = $this->getActiveMenuOptionsTree(null, collect(), 1);
        $role = \App\Role::find($id);
        
        foreach($active_menu_options as $menop) :            
            if ($role->active_role_menu_options->contains('menu_id',$menop->menu_id)) :
                $menop->selected = 'visible';
            endif;               
        endforeach;
        
        return view($this->viewsDir.'show_role', ['role'=>$role,'active_menu_options'=>$active_menu_options]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $active_menu_options = $this->getActiveMenuOptionsTree(null, collect(), 1);
        $role = \App\Role::find($id);
        
        foreach($active_menu_options as $menop) :            
            if ($role->active_role_menu_options->contains('menu_id',$menop->menu_id)) :
                $menop->selected = 'checked';
            endif;               
        endforeach;
        
        return view($this->viewsDir.'edit_role', ['role'=>$role,'active_menu_options'=>$active_menu_options]);
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
        
        if (!$role->role_menu_options->isEmpty()) :
            if ($request->role_menu_options) :
                // Save-Update Menu Options
                foreach($role->role_menu_options as $role_menop):
                    if (in_array($role_menop->menu_id, $request->role_menu_options) && $role_menop->state = 'I'):                        
                        $role_menop->state = 'A';                
                        $role->role_menu_options()->save($role_menop); 
                        $request->role_menu_options = array_diff($request->role_menu_options, [$role_menop->menu_id]);
                    elseif (!in_array($role_menop->menu_id, $request->role_menu_options) && $role_menop->state = 'A') :
                        $role_menop->state = 'I';                
                        $role->role_menu_options()->save($role_menop); 
                    endif;
                endforeach;                                
            else:
                // Inactivar todos los menú opciones activos
                foreach ($role->role_menu_options as $role_menop) :                    
                    $role_menop->state = 'I';                
                    $role->role_menu_options()->save($role_menop);                    
                endforeach;
            endif;
        endif;
        
        if ($request->role_menu_options) :                    
            foreach ($request->role_menu_options as $menuop) :                        
                $role_per_menop = new \App\RoleMenuOption();
                $role_per_menop->menu_id = $menuop;
                $role_per_menop->state = 'A';                
                $role->role_menu_options()->save($role_per_menop);
            endforeach;
        endif;
        
        $role = \App\Role::find($request->role_id);
        $active_menu_options = $this->getActiveMenuOptionsTree(null, collect(), 1);
        foreach($active_menu_options as $menop) :            
            if ($role->active_role_menu_options->contains('menu_id',$menop->menu_id)) :
                $menop->selected = 'visible';
            endif;               
        endforeach;
        
        return view($this->viewsDir.'partial.view_role', ['role'=>$role,'active_menu_options'=>$active_menu_options]);                
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
