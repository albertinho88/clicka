<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $primaryKey = 'page_id';
    public $incrementing = false;
    
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
    
    /**
     * Get all of the user_role for the user.
     */
    public function page_content()
    {
        return $this->hasMany('\App\PageContent', 'page_id');
    }
    
    /**
     * Get all of the user_role for the user.
     */
    public function page_content_ordered()
    {
        return $this->hasMany('\App\PageContent', 'page_id')->orderBy('order','asc');
    }
    
    
    
}
