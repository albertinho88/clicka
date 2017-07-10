<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $viewsDir;
    
    public function __construct() {        
        $this->viewsDir = "application.management.services.";
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->viewsDir.'index_services');
    }
    
    public function listServicesJson() {
        $services = \App\Service::all();        
        return response()->json($services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = new \App\Service();
        return view($this->viewsDir.'create_service', compact('service'));
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
            'service_id' => 'required|unique:services',
            'name' => 'required|max:50',
            'slogan' => 'required|max:500',
            'icon' => 'max:20',
            'website_bg_color' => 'max:6',            
            //'featured' => 'boolean',
            'state' => 'required|max:1',
            'order' => 'required|numeric|integer'
        ]);
        
        $service = new \App\Service();
        $service->service_id = $request->service_id;
        $service->name = $request->name;
        $service->slogan = $request->slogan;
        $service->icon = $request->icon;
        $service->website_bg_color = $request->website_bg_color;
        $service->website_html_content = $request->website_html_content;
        $service->featured = isset($request->featured) ? true : false;
        $service->state = $request->state;
        $service->order = $request->order;
        $service->save();
        
        return view($this->viewsDir.'partial.view_service', compact('service'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = \App\Service::find($id);
        return view($this->viewsDir.'show_service', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = \App\Service::findOrFail($id);
        return view($this->viewsDir.'edit_service', compact('service'));
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
        $this->validate(request(),[
            'name' => 'required|max:50',
            'slogan' => 'required|max:500',
            'icon' => 'max:20',
            'website_bg_color' => 'max:6',            
            //'featured' => 'boolean',
            'state' => 'required|max:1',
            'order' => 'required|numeric|integer'
        ]);
        $service = \App\Service::find($request->service_id);
        $service->name = $request->name;
        $service->slogan = $request->slogan;
        $service->icon = $request->icon;
        $service->website_bg_color = $request->website_bg_color;
        $service->website_html_content = $request->website_html_content;
        $service->featured = isset($request->featured) ? true : false;
        $service->state = $request->state;
        $service->order = $request->order;
        $service->update();
        
        return view($this->viewsDir.'partial.view_service', compact('service'));
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
