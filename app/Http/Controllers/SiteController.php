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
        $services = \App\Service::where('state','A')->get();
        
        return view('site.services',compact('services'));
    }
    
    public function viewService($service_id) {
        return view('site.'.$service_id);
    }
    
    public function viewContactUsPage() {
        return view('site.contact');
    }
    
    public function getContactFormAjax() {
        return view('partial.contact_form');
    }
    
    public function contactAjax(Request $request) {
        
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
        $newContacto->state = 'R'; //R -> REGISTRADO
        $newContacto->save();

        return view('partial.contact_form_response', ['contacto' => $newContacto]);
    }
    
    public function viewPage($page_id) {
        $page = \App\Page::findOrFail($page_id);
        return view('site.page',compact('page'));
    }
}
