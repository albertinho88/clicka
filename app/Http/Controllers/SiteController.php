<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class SiteController extends Controller
{
    //        
    
    public function viewService($service_id) {
        $service = \App\Service::findOrFail($service_id);
        return view('site.custom.service',compact('service'));
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
    
    public function viewPage($page_id = null) {
        
        if (!isset($page_id)):
            $page_id = 'home';
        endif;
        
        $page = \App\Page::findOrFail($page_id);                
        
        if ($page->cat_det_id_type == 'DYNPAG') :
            return view('site.dynamic.page',compact('page'));
        elseif ($page->cat_det_id_type == 'ESTPAG') :
            return view('site.static.'.$page->page_id,compact('page'));        
        elseif ($page->cat_det_id_type == 'CUSPAG') :
            $data = array();
            if ($page->page_id == 'services') {
                $active_services = \App\Service::where('state','A')->get();
                array_push($data, 'page');
                array_push($data, 'active_services');
            }
            return view('site.custom.'.$page->page_id,compact($data));        
        endif;
        
        return view('site.dynamic.page',compact('page'));
    }
}
