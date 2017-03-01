<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleMenuOption extends Model
{
    protected $table = 'roles_menu_options';
    protected $primaryKey = 'role_menu_id';
    
    /**
    * Get the user that owns the user_role.
    */
    public function menu_option()
    {
       return $this->belongsTo('\App\MenuOption', 'menu_id');       
    }
    
    /**
    * Get the role that owns the user_role.
    */
    public function role()
    {
       return $this->belongsTo('\App\Role', 'role_id');       
    }        
}
