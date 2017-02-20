<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $viewsDir;
    
    public function __construct() {
        $this->middleware('auth');
        $this->viewsDir = "application.management.users.";
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view($this->viewsDir.'index_users');
    }   
    
    public function listUsersJson() {
        $users = \App\User::all();        
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $active_roles = \App\Role::where('state','A')->get();
        return view($this->viewsDir.'create_user', ['active_roles' => $active_roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {            
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'state' => 'required'
        ]);
        
        $user = new \App\User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);        
        $user->state = $request->state;
        $user->save();
        
        if ($request->user_roles) {
            foreach ($request->user_roles as $userole) {
                $user_per_role = new \App\UserRole();
                $user_per_role->role_id = $userole;
                $user_per_role->state = 'A';                
                $user->users_roles()->save($user_per_role);
            }
        }
        
        return view($this->viewsDir.'partial.view_user', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $user = \App\User::find($id);
        return view($this->viewsDir.'show_user', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $active_roles = \App\Role::where('state','A')->get();
        $user = \App\User::find($id);
        return view($this->viewsDir.'edit_user', ['user' => $user, 'active_roles' => $active_roles]);
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
        
        $user = \App\User::find($request->user_id);
        $user->name = $request->name;                
        $user->state = $request->state;
        $user->save();
        
        return view($this->viewsDir.'partial.view_user', compact('user'));
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
