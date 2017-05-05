<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $primaryKey = 'slider_id';
    
     /**
    * Get the user that owns the user_role.
    */
    public function slider_images()
    {
       return $this->hasMany('\App\SliderImage', 'slider_id');       
    }
    
    public function ordered_slider_images()
    {
        return $this->hasMany('\App\SliderImage', 'slider_id')->orderBy('order');
    }
    
}
