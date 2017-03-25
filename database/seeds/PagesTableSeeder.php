<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addHomePage();
        $this->addAboutUsPage();
        $this->addServicesPage();
        $this->addContactUsPage();
    }
    
    public function addHomePage() {
        $npage = new \App\Page();
        $npage->page_id = "home";
        $npage->is_menu_item = true;
        $npage->name = "Inicio";
        $npage->icon = "home";
        $npage->order = 1;
        $npage->state = "A";
        $npage->save();
    }
    
    public function addAboutUsPage() {
        $npage = new \App\Page();
        $npage->page_id = "about_us";
        $npage->is_menu_item = true;
        $npage->name = "Conócenos";
        $npage->icon = "comment-o";
        $npage->order = 2;
        
        $npage->container_class = "card card-w-title seccionSite text-center";
        
        $npage->state = "A";
        $npage->save();
    }
    
    public function addServicesPage() {
        $npage = new \App\Page();
        $npage->page_id = "services";
        $npage->is_menu_item = true;
        $npage->name = "Servicios";
        $npage->icon = "laptop";
        $npage->order = 3;
        
        $npage->container_class = "card card-w-title seccionSite text-center";
        $npage->title = "Servicios";
        
        $npage->state = "A";
        $npage->save();
    }
    
    public function addContactUsPage() {
        $npage = new \App\Page();
        $npage->page_id = "contact_us";
        $npage->is_menu_item = true;
        $npage->name = "Contáctanos";
        $npage->icon = "envelope-o";
        $npage->menu_class = "animated swing infinite";
        $npage->order = 4;
        
        $npage->container_class = "card card-w-title seccionSite text-center";
        $npage->title = "Contáctanos";
        
        $npage->state = "A";
        $npage->save();
    }
    
}