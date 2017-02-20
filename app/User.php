<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * Get all of the user_role for the user.
     */
    public function users_roles()
    {
        return $this->hasMany('\App\UserRole', 'user_id');
    }
    
    /**
     * Get all of the user_role for the user.
     */
    public function active_users_roles()
    {
        return $this->hasMany('\App\UserRole')->where('state','A');
    }
}
