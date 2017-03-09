<?php

use Illuminate\Database\Seeder;

class CatalogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addMediaTypesCatalog();
    }
    
    public function addMediaTypesCatalog() {
        $catalog = new \App\Catalog();
        $catalog->catalog_id = 'TIPARCMUL';
        $catalog->name = 'Catálogo de tipos de archivos multimedia.';
        $catalog->state = 'A';
        $catalog->save();
    }
}
