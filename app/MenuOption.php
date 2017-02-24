<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuOption extends Model
{
    protected $table = 'menu_options';
    protected $primaryKey = 'menu_id';
    public $selected = ''; //a default value
    public $level = 0;
    
    /**
    * Get the user that owns the user_role.
    */
    public function parent_menu_option()
    {
       return $this->belongsTo('\App\MenuOption', 'menu_parent_id');       
    }
    
    /**
    * Get the user that owns the user_role.
    */
    public function children_menu_option()
    {
       return $this->hasMany('\App\MenuOption', 'menu_parent_id', 'menu_id');       
    }
    
}
