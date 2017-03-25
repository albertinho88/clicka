<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $table = 'page_content';
    protected $primaryKey = 'page_content_id';
    
    
    /**
    * Get the user that owns the user_role.
    */
    public function page()
    {
       return $this->belongsTo('\App\Page', 'page_id');       
    }
    
    /**
    * Get the role that owns the user_role.
    */
    public function content()
    {
       return $this->belongsTo('\App\Content', 'content_id');       
    }
}
