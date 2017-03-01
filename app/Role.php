<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'role_id';
    public $selected = ''; //a default value
    
    /**
     * Get all of the user_role for the user.
     */
    public function role_menu_options()
    {        
        return $this->hasMany('\App\RoleMenuOption', 'role_id');
    }
    
    /**
     * Get all of the user_role for the user.
     */
    public function active_role_menu_options()
    {
        return $this->hasMany('\App\RoleMenuOption')->where('state','A');
    }    
    
}
