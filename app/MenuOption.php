<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuOption extends Model
{
    protected $table = 'menu_options';
    protected $primaryKey = 'menu_id';
    public $selected = ''; //a default value
}
