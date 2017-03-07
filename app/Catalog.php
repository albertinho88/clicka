<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $table = 'catalogs';
    protected $primaryKey = 'catalog_id';
    public $incrementing = false;
    
    /**
     * Get all of the user_role for the user.
     */
    public function catalog_details()
    {
        return $this->hasMany('\App\CatalogDetail', 'catalog_id');
    }
    
    /**
     * Get all of the user_role for the user.
     */
    public function catalog_details_active()
    {
        return $this->hasMany('\App\CatalogDetail', 'catalog_id')->where('state','A');
    }
}
