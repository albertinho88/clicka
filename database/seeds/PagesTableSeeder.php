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
        $npage->cat_id_type = "TIPPAGWEB";
        $npage->cat_det_id_type = "DYNPAG";
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
        $npage->cat_id_type = "TIPPAGWEB";
        $npage->cat_det_id_type = "DYNPAG";
        $npage->is_menu_item = true;
        $npage->name = "Conócenos";
        $npage->icon = "comment-o";
        $npage->order = 2;
        
        $npage->container_class = "card card-w-title seccionSite text-center";
        
        $npage->state = "A";
        $npage->save();
        
        $htmlsec = new \App\HtmlSection();
        $htmlsec->html_content = '<p><i class="fa fa-lightbulb-o" style="font-size: 40px; color: #43a047; font-weight: bold;"></i></p>
                <p><span class="coolvetica-rg" style="font-size: 28px;">Soluciones creativas e innovadoras para tu empresa.</span></p>                                
                
                <div class="ui-g">
                    <div class="ui-g-12 ui-md-1 ui-lg-1"></div>
                    <div class="ui-g-12 ui-md-5 ui-lg-5">
                        <p><i class="fa fa-comment-o" style="font-size: 40px; color: #0288d1; font-weight: bold;"></i></p>
                        <p><span class="coolvetica-rg" style="font-size: 24px;">Qué hacemos?</span></p>
                        <p style="padding: 0 10%;">
                            <b><span class="backtoblackfont" style="font-size: 20px;">Clicka</span>,</b>
                            brinda consultoría y provee soluciones informáticas a través                      
                            de herramientas tecnológicas de código abierto (Open Source) en las siguientes áreas:                      
                            Software Factory, E-Marketing, E-Commerce, Data Management, Inteligencia de Negocios                      
                            y Gestión de Procesos de Negocio (BPM). 
                        </p>
                    </div>
                    <div class="ui-g-12 ui-md-5 ui-lg-5">
                        <p><i class="fa fa-users" style="font-size: 40px; color: #efa64c; font-weight: bold;"></i></p>
                        <p><span class="coolvetica-rg" style="font-size: 24px;">Quiénes somos?</span></p>
                        <p style="padding: 0 10%;">
                            Somos un grupo de jóvenes profesionales en diferentes ámbitos, que con el expertise individual y nuevas ideas,                      
                            estamos motivados a trabajar por las necesidades de nuestros clientes.                 
                        </p>
                    </div>
                    <div class="ui-g-12 ui-md-1 ui-lg-1"></div>
                </div>';
        $htmlsec->save();
        
        $content = new \App\Content();
        $content->cat_id_type = "TIPCONWEB";
        $content->cat_det_id_type = "HTMLSEC";
        $content->htmlsection_id = $htmlsec->htmlsection_id;        
        $content->save();
        
        $pagecontent = new \App\PageContent();
        $pagecontent->content_id = $content->content_id;
        $pagecontent->order = 1;
        $pagecontent->columns_on_g = "12";
        $pagecontent->columns_on_md = "12";
        $pagecontent->columns_on_lg = "12";        
        $npage->page_content()->save($pagecontent);
        
    }
    
    public function addServicesPage() {
        $npage = new \App\Page();
        $npage->page_id = "services";
        $npage->cat_id_type = "TIPPAGWEB";
        $npage->cat_det_id_type = "CUSPAG";
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
        $npage->cat_id_type = "TIPPAGWEB";
        $npage->cat_det_id_type = "CUSPAG";
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