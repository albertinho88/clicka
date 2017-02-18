<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'users_per_roles';
    protected $primaryKey = 'user_role_id';
}
