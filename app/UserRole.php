<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'users_per_roles';
    protected $primaryKey = 'user_role_id';
    
    /**
    * Get the user that owns the user_role.
    */
    public function user()
    {
       return $this->hasOne('\App\User', 'user_id');       
    }
    
    /**
    * Get the role that owns the user_role.
    */
    public function role()
    {
       return $this->hasOne('\App\Role', 'role_id');       
    }
}
