<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuOption extends Model
{
    protected $table = 'menu_options';
    protected $primaryKey = 'menu_id';
    public $selected = ''; //a default value
    
    /**
    * Get the user that owns the user_role.
    */
    public function parent_menu_option()
    {
       return $this->belongsTo('\App\MenuOption', 'menu_parent_id');       
    }
    
}
