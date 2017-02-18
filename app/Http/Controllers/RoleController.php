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
        //
        return view($this->viewsDir.'create_role');
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
