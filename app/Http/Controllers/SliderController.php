<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SliderController extends Controller
{
    
    protected $viewsDir;
    
    public function __construct() {        
        $this->viewsDir = "application.cms.sliders.";
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->viewsDir.'index_sliders');
    }
    
    public function listSlidersJson() {
        $sliders = \App\Slider::orderBy('created_at','desc')->get();
        return response()->json($sliders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->viewsDir.'create_slider');
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
            'name' => 'string|max:50|required',                        
            'transition_speed' => 'numeric|integer|required',
            'time_between_transition' => 'numeric|integer|required',
            'prev_text' => 'max:50',
            'next_text' => 'max:50',
            'max_width' => 'max:10',
            'state' => 'required|max:1'            
        ]);
        
        $slider = new \App\Slider();
        $slider->name = $request->name;                        
        $slider->animate_automatically = isset($request->animate_automatically)?true:false;       
        $slider->transition_speed = $request->transition_speed;
        $slider->time_between_transition = $request->time_between_transition;        
        $slider->show_pager = isset($request->show_pager)?true:false;
        $slider->show_navigation = isset($request->show_navigation)?true:false;
        $slider->random_slides_order = isset($request->random_slides_order)?true:false;
        $slider->pause_on_hover = isset($request->pause_on_hover)?true:false;
        $slider->pause_hover_controls = isset($request->pause_hover_controls)?true:false;                
        $slider->prev_text = $request->prev_text;
        $slider->next_text = $request->next_text;
        $slider->max_width = $request->max_width;
        $slider->state = $request->state;
        
        $slider->save();
        
        return view($this->viewsDir.'partial.view_slider',compact('slider'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = \App\Slider::findOrFail($id);
        return view($this->viewsDir.'show_slider',compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = \App\Slider::findOrFail($id);
        return view($this->viewsDir.'edit_slider',compact('slider'));
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
            'name' => 'string|max:50|required',                        
            'transition_speed' => 'numeric|integer|required',
            'time_between_transition' => 'numeric|integer|required',
            'prev_text' => 'max:50',
            'next_text' => 'max:50',
            'max_width' => 'max:10',
            'state' => 'required|max:1'            
        ]);
        
        $slider = \App\Slider::findOrFail($request->slider_id);
        $slider->name = $request->name;                        
        $slider->animate_automatically = isset($request->animate_automatically)?true:false;       
        $slider->transition_speed = $request->transition_speed;
        $slider->time_between_transition = $request->time_between_transition;        
        $slider->show_pager = isset($request->show_pager)?true:false;
        $slider->show_navigation = isset($request->show_navigation)?true:false;
        $slider->random_slides_order = isset($request->random_slides_order)?true:false;
        $slider->pause_on_hover = isset($request->pause_on_hover)?true:false;
        $slider->pause_hover_controls = isset($request->pause_hover_controls)?true:false;                
        $slider->prev_text = $request->prev_text;
        $slider->next_text = $request->next_text;
        $slider->max_width = $request->max_width;
        $slider->state = $request->state;
        
        $slider->update();
        
        return view($this->viewsDir.'partial.view_slider',compact('slider'));
        
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
