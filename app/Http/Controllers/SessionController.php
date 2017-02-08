<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    
    public function __construct() {
        $this->middleware('guest',['except' => 'destroy']);
    }
    
    public function create() {       
        return view('auth.login');
    }
    
    public function store(Request $request) {        
        
        $this->validate(request(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if (!auth()->attempt(request(['email','password']))) {
            return back()->withErrors([
                'general_message' => 'Por favor revise sus credenciales y vuelva a intentar.'
            ]);
        }
        
        return redirect()->home();
    }
    
    public function destroy() {
        auth()->logout();
        return redirect()->route('login');
    }
}
