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
        $this->addHtmlContentTypesCatalog();
    }
    
    public function addMediaTypesCatalog() {
        $catalog = new \App\Catalog();
        $catalog->catalog_id = 'TIPARCMUL';
        $catalog->name = 'Catálogo de tipos de archivos multimedia.';
        $catalog->state = 'A';
        $catalog->save();
    }
    
    public function addHtmlContentTypesCatalog() {
        $catalog = new \App\Catalog();
        $catalog->catalog_id = 'TIPCONWEB';
        $catalog->name = 'Catálogo de tipos de contenido por página del sitio web.';
        $catalog->state = 'A';
        $catalog->save();
                
        $newDetail = new \App\CatalogDetail();                
        $newDetail->catalog_detail_id = "HTMLSEC";
        $newDetail->value = "Sección Html";
        $newDetail->state = "A";
        $catalog->catalog_details()->save($newDetail); 
        
        $newDetail = new \App\CatalogDetail();                
        $newDetail->catalog_detail_id = "SLIDER";
        $newDetail->value = "Slider";
        $newDetail->state = "A";
        $catalog->catalog_details()->save($newDetail); 
        
        $newDetail = new \App\CatalogDetail();                
        $newDetail->catalog_detail_id = "FORM";
        $newDetail->value = "Formulario";
        $newDetail->state = "A";
        $catalog->catalog_details()->save($newDetail); 
        
         
    }
}
