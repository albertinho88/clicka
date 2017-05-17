<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'content';
    protected $primaryKey = 'content_id';

    /**
    * Get the user that owns the user_role.
    */
    public function htmlsection()
    {
       return $this->belongsTo('\App\HtmlSection', 'htmlsection_id');       
    }
    
    public function slider()
    {
        return $this->belongsTo('\App\Slider', 'slider_id');
    }
}
