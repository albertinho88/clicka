<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class SessionController extends Controller
{
    
    public function __construct() {
        $this->middleware('guest',['except' => 'destroy']);
    }
    
    public function create() {
        $userLogin = new User();        
        return view('auth.login')->with('userLogin', $userLogin);
    }
    
    public function store(Request $request) {
        
        $userLogin = new User(); 
        $userLogin->email = $request->email;
        
        $this->validate(request(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if (!auth()->attempt(request(['email','password']))) {
            return back()->withErrors([
                'general_message' => 'Por favor revise sus credenciales y vuelva a intentar.'
            ])->with('userLogin', $userLogin);
        }
        
        return redirect()->home();
    }
    
    public function destroy() {
        auth()->logout();
        return redirect()->home();
    }
}
