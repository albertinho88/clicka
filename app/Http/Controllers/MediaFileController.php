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
                    . '<div class="ui-g-6 ui-md-4 ui-lg-2" >'
                    . '<img style="width: 100px; height: 100px;" src="'.asset('_resource/thumbs/folder-128.png').'" />'
                    . '<p><span class="text-center bolded">'.$fichero.'</span></p>'
                    . '</div>'                    
                    . '</a>';
            elseif(is_file($t)):                
                //if (file_exists(public_path().'/_resource/thumbs/'.$fichero)) :
                $check = getimagesize($t);                
                $dimensionesFichero = "";
            
                if ($check != false) {
                    $dimensionesFichero .= "Dimensiones: ".$check[0]." x ".$check[1]."";
                }                
                
                $detallesFichero = "<p>".$fichero;
                $detallesFichero .= "<br /> (".  number_format(filesize($t)/1024,2)." Kb) </p>";
                //if($check != false):
                    $files_tree.= '<a class="file" href="'.asset($parent_dir.$fichero).'" >'
                        . '<div class="ui-g-6 ui-md-4 ui-lg-2">'
                        . '<img style="width: 100px; height: 100px;" src="'.asset($parent_dir.$fichero).'" title="'.$dimensionesFichero.'" />'
                        . $detallesFichero
                        . '</div>'
                        . '</a>';
                /*else:
                    $files_tree.= '<a class="file" href="'.asset($parent_dir.$fichero).'" >'
                        . '<div class="ui-g-6 ui-md-3 ui-lg-2">'
                        . '<img style="width: 60px; height: 50px;" src="'.asset('_resource/thumbs/no-thumb.png').'" />'
                        . '<p>'.$fichero.'</p>'
                        . '</div>'
                        . '</a>';
                endif; */                                 
            endif;
            clearstatcache();            
        endforeach;
        $files_tree .= '</p-lightbox>';
        
        $files_tree = $dir_tree.$files_tree;
        return $files_tree;
    }
    
    public function createDirectory(Request $request) {
        $newDirectory = public_path().'/'.$request->parent_dir.$request->new_dir;  
        
        if (is_dir($newDirectory)) :
            return response()->json(["codigoRespuesta"=>"0","mensajeRespuesta"=>'El directorio: "'.$request->new_dir.'", ya existe.']);
        else:
            if (mkdir($newDirectory)) :                                
                return response()->json(["codigoRespuesta"=>"1","mensajeRespuesta"=>"Directorio creado satisfactoriamente."]);
            else:
                return response()->json(["codigoRespuesta"=>"0","mensajeRespuesta"=>"Error al crear el directorio ".$request->new_dir."."]);
            endif;
        endif;
        
    }
    
    public function addMediaFile(Request $request) {
        $target_dir = public_path().'/' .$request->parent_dir;        
        $target_file = $target_dir . basename($_FILES["ipt_new_file"]["name"]);        
        $sourcePath = $_FILES['ipt_new_file']['tmp_name'];       // Storing source path of the file in a variable        
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); //svg exception
        $check = getimagesize($sourcePath);
        
        if($check == false && $imageFileType != "svg") :            
            return response()->json(["codigoRespuesta"=>"0","mensajeRespuesta"=>"El archivo no es una imagen."]);
        // Check if file already exists
        elseif (file_exists($target_file)) :            
            return response()->json(["codigoRespuesta"=>"0","mensajeRespuesta"=>"El archivo ya existe."]);                    
        // Check file size
        elseif ($_FILES["ipt_new_file"]["size"] > 2097152) : //2Mb
            return response()->json(["codigoRespuesta"=>"0","mensajeRespuesta"=>"Lo sentimos, el tamaño máximo permitido es de 2Mb."]);
        // Allow certain file formats
        elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "svg" ) :
            return response()->json(["codigoRespuesta"=>"0","mensajeRespuesta"=>"Lo sentimos, solo archivos con extensión JPG, JPEG, PNG, SVG & GIF son permitidos."]);            
        elseif (move_uploaded_file($sourcePath,$target_file)) :            
            return response()->json(["codigoRespuesta"=>"1","mensajeRespuesta"=>'Archivo subido satisfactoriamente.']);
        else:
            return response()->json(["codigoRespuesta"=>"0","mensajeRespuesta"=>"Error al subir el archivo."]);
        endif;        
    }
        
}
