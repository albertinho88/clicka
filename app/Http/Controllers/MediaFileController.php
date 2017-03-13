<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaFileController extends Controller
{
    
    protected $viewsDir;
    
    public function __construct() {        
        $this->viewsDir = "application.management.media_files.";
    } 
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {             
        $root_dir = '_resource/images/';
        return view($this->viewsDir.'index_media_files', compact('root_dir'));
    }
    
    public function listMediaFilesJson(Request $request) {
                
        $parent_dir = $request->parent_dir;    
        
        $images_files = array_diff(scandir($parent_dir,0), array('.'));        
        
        $dir_tree = '';
        $files_tree = '';
        
        $files_tree .= '<p-lightbox>';
        foreach ($images_files as $fichero) :
            $t = public_path().'/'.$parent_dir.$fichero;
            if (is_dir($t)) :
                $dir_tree.= '<a class="directory" id="'.$fichero.'" >'
                    . '<div class="ui-g-6 ui-md-3 ui-lg-2" >'
                    . '<img style="width: 60px; height: 50px;" src="'.asset('_resource/thumbs/folder-50.png').'" />'
                    . '<p><span class="text-center bolded">'.$fichero.'</span></p>'
                    . '</div>'
                    . '</a>';
            elseif(is_file($t)):                
                if (file_exists(public_path().'/_resource/thumbs/'.$fichero)) :
                    $files_tree.= '<a class="file" href="'.asset($parent_dir.$fichero).'" >'
                        . '<div class="ui-g-6 ui-md-3 ui-lg-2">'
                        . '<img style="width: 60px; height: 50px;" src="'.asset('_resource/thumbs/'.$fichero).'" />'
                        . '<p>'.$fichero.'</p>'
                        . '</div>'
                        . '</a>';
                else :
                    $files_tree.= '<a class="file" href="'.asset($parent_dir.$fichero).'" >'
                        . '<div class="ui-g-6 ui-md-3 ui-lg-2">'
                        . '<img style="width: 60px; height: 50px;" src="'.asset('_resource/thumbs/no-thumb.png').'" />'
                        . '<p>'.$fichero.'</p>'
                        . '</div>'
                        . '</a>';
                endif;                 
            endif;
            //clearstatcache();
            //folder-50 
        endforeach;
        $files_tree .= '</p-lightbox>';
        
        $files_tree = $dir_tree.$files_tree;
        return $files_tree;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
