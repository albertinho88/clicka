<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderImage extends Model
{
    protected $table = 'slider_images';
    protected $primaryKey = 'slider_image_id';
    
     /**
    * Get the user that owns the user_role.
    */
    public function slider()
    {
       return $this->belongsTo('\App\Slider', 'silder_id');       
    }
    
    public function getFileName() {        
        return basename($this->image_path);
    }
    
    public function getFileSize() {
        return "(".number_format(filesize($this->image_path)/1024,2)." Kb)";
    }
    
    public function getImageSize() {
        $check = getimagesize($this->image_path);                
        $dimensionesFichero = "";
        if ($check != false) {
            $dimensionesFichero .= "".$check[0]." x ".$check[1]." px.";
        }
        return $dimensionesFichero;
    }
    
}
