<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $primaryKey = 'page_id';
    
    /**
    * Get the user that owns the user_role.
    */
    public function parent_page()
    {
       return $this->belongsTo('\App\Page', 'page_parent_id');       
    }
    
    /**
    * Get the user that owns the user_role.
    */
    public function children_pages()
    {
       return $this->hasMany('\App\Page', 'page_parent_id', 'page_id');       
    }
}
