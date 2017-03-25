<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HtmlSection extends Model
{
    protected $table = 'htmlsections';
    protected $primaryKey = 'htmlsection_id';    
    public $timestamps = false;  
}
