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
    
}
