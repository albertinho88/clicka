<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function viewList(){
        return view('application.management.users.listUsers');
    }
    
}
