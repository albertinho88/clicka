<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class SiteController extends Controller
{
    //
    
    public function viewHomePage() {
        return view('site.home');
    }
    
    public function viewAboutUsPage() {
        return view('site.about');
    }
    
    public function viewServicesPage() {
        return view('site.services');
    }
    
    public function viewService($service_id) {
        return view('site.'.$service_id);
    }
    
    public function viewContactUsPage() {
        return view('site.contact');
    }
    
    public function contactUs(Request $request) {
        
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'            
        ]);
        
        $newContacto = new Contact();
        $newContacto->name = $request->name;
        $newContacto->email = $request->email;
        $newContacto->phone = $request->phone;
        $newContacto->message = $request->message;        
        $newContacto->ip_creator = $request->ip();
        $newContacto->state = 'CR';
        $newContacto->save();

        return response()->json(["codigoRespuesta"=>"1"]);
    }
}
