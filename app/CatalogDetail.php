<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogDetail extends Model
{
    use Traits\HasCompositePrimaryKey;
    
    protected $table = 'catalog_details';
    protected $primaryKey = ['catalog_detail_id', 'catalog_id'];
    public $incrementing = false;
    
    /**
    * Get the user that owns the user_role.
    */
    public function catalog()
    {
       return $this->belongsTo('\App\Catalog', 'catalog_id');       
    }
}
