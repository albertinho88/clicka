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
        $slider = new \App\Slider();
        $root_dir = '_resource/images/';        
        return view($this->viewsDir.'create_slider',compact(['root_dir','slider']));
    }
    
    public function listMediaFilesJson(Request $request) {
                
        $parent_dir = realpath($request->parent_dir);         
        $images_files = array_diff(scandir($parent_dir,0), array('.','..'));        
        $dir_tree = '';

        $files_tree = '';
                
        //$files_tree .= '<p-lightbox>';
        
        if ($parent_dir != realpath('_resource/images/')):            
            $ud = realpath($request->parent_dir.DIRECTORY_SEPARATOR."..");
            $pd = str_replace(base_path().DIRECTORY_SEPARATOR."public_html".DIRECTORY_SEPARATOR, "", $ud);
            $up_level_dir = str_replace(DIRECTORY_SEPARATOR, "/", $pd);

            $dir_tree.= '<a class="back_directory" id="'.$up_level_dir.'" >'
                        . '<div class="ui-g-6 ui-md-4 ui-lg-2" >'
                        . '<img style="width: 100px; height: 100px;" src="'.asset('_resource/thumbs/folder-back-128.png').'" />'
                        . '<p><small><span class="text-center bolded"></span></small></p>'
                        . '</div>'                    
                        . '</a>';
        endif;                
        
        foreach ($images_files as $fichero) :            
            $t = $parent_dir."/".$fichero;             
            if (is_dir($t)) :                
                $dir_tree.= '<a class="directory" id="'.$fichero.'" >'
                    . '<div class="ui-g-6 ui-md-4 ui-lg-2" >'
                    . '<img style="width: 100px; height: 100px;" src="'.asset('_resource/thumbs/folder-128.png').'" />'
                    . '<p><small><span class="text-center bolded">'.$fichero.'</span></small></p>'
                    . '</div>'                    
                    . '</a>';
            elseif(is_file($t)):                
                $check = getimagesize($t);                
                $dimensionesFichero = "";
                if ($check != false) {
                    $dimensionesFichero .= "".$check[0]." x ".$check[1]." px.";
                }                
                
                $infoFichero = '<p>'.$fichero;
                $infoFichero .= "<br /> <small>(".  number_format(filesize($t)/1024,2)." Kb)</small>";
                $infoFichero .= "<br /><small>".$dimensionesFichero."</small></p>";
                
                $detallesFichero = "<p><small>".$fichero."</small>";                                
                $detallesFichero .= '<br /><small>'.$dimensionesFichero.'</small>';
                $detallesFichero .= "<br /><small>(".  number_format(filesize($t)/1024,2)." Kb)</small>";                
                $detallesFichero .= '<br /><a class="file" ><i class="fa fa-search" /></a>';                
                $detallesFichero .= '| <a class="file" onclick="selectFile(\''.asset($request->parent_dir.$fichero).'\',\''.$request->parent_dir.$fichero.'\',\''.$infoFichero.'\')"  >';
                $detallesFichero .= '<i class="fa fa-hand-pointer-o" /></a></p>';
                
                $files_tree.= ''
                    . '<div class="ui-g-6 ui-md-4 ui-lg-2">'                    
                    . '<img style="width: 100px; height: 100px;" src="'.asset($request->parent_dir.$fichero).'" />'                    
                    . $detallesFichero
                    . ''
                    . '</div>';  
            endif;
            clearstatcache();            
        endforeach;
        //$files_tree .= '</p-lightbox>';                
        
        $files_tree = $dir_tree.$files_tree;
        return $files_tree;
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
        
        //slider_images
        $request_slider_images = $request->slider_images;
        
        if (isset($request_slider_images)):
            //Crear page content
            foreach ($request_slider_images as $slide) :                                    
                $new_slide = new \App\SliderImage();
                $new_slide->image_path = $slide['path'];
                $new_slide->order = $slide['order'];                        
                $new_slide->caption = $slide['caption'];
                $new_slide->icon = $slide['icon'];
                $slider->slider_images()->save($new_slide);                                
            endforeach;
        endif;
        
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
        $root_dir = '_resource/images/';
        return view($this->viewsDir.'edit_slider',compact('root_dir', 'slider'));
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
        
        //slider_images
        $request_slider_images = $request->slider_images;
        
        if (!$slider->slider_images->isEmpty()) :
            if (isset($request_slider_images)) :
                foreach($slider->slider_images as $slide):
                    if (isset($request_slider_images[$slide->slider_image_id])) :
                        
                        $contentHasChanged = false;
                        
                        if ($slide->caption != $request_slider_images[$slide->slider_image_id]['caption']):
                            $slide->caption = $request_slider_images[$slide->slider_image_id]['caption'];
                            $contentHasChanged = true;                            
                        endif;
                        
                        if ($slide->icon != $request_slider_images[$slide->slider_image_id]['icon']):
                            $slide->icon = $request_slider_images[$slide->slider_image_id]['icon'];
                            $contentHasChanged = true;                            
                        endif;
                        
                        if ($slide->order != $request_slider_images[$slide->slider_image_id]['order']):
                            $slide->order = $request_slider_images[$slide->slider_image_id]['order'];
                            $contentHasChanged = true;                            
                        endif;
                        
                        if ($contentHasChanged):
                            $slide->update();
                        endif;
                        
                        unset($request_slider_images[$slide->slider_image_id]);
                    else:
                        $slide->delete();
                    endif; 
                endforeach;
            else :                              
                foreach($slider->slider_images as $slide) :                    
                    $slide->delete();
                endforeach;                 
            endif;
        endif;
        
        if (isset($request_slider_images)):
            //Crear page content
            foreach ($request_slider_images as $slide) :                                    
                $new_slide = new \App\SliderImage();
                $new_slide->image_path = $slide['path'];
                $new_slide->order = $slide['order'];                        
                $new_slide->caption = $slide['caption'];
                $new_slide->icon = $slide['icon'];
                $slider->slider_images()->save($new_slide);                                
            endforeach;
        endif;
        
        $slider = \App\Slider::findOrFail($request->slider_id);
        
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
