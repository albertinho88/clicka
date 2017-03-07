<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->addSoftwareService();
        $this->addWebsiteService();
    }
    
    public function addSoftwareService() {
        $ss = new \App\Service();
        $ss->name = 'Software a la Medida';
        $ss->slogan = 'El activo más importante de tu empresa.';
        $ss->icon = 'industry';
        $ss->website_bg_color = '0288d1';
        $ss->website_html_content = '<div class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-1"></div>
                        <div class="ui-grid-col-5">
                            <p style="text-align: justify;"> 
                                En el desenvolvimiento de una empresa durante el día a día, contar con un software personalizado o a la medida puede convertirse en un activo 
                                importante para que la empresa funcione de manera más efectiva y realice sus operaciones internas en un menor tiempo. 
                            </p>
                            <p style="text-align: justify;"> 
                                El software hecho a la medida es una solución innovadora que atiende las necesidades de cada empresa y canaliza los requerimientos de esta hacia una plataforma productiva y confiable. 
                            </p>
                            <p style="text-align: justify;" class="FontBold"> Cómo saber si necesito un software personalizado para mi empresa? </p>
                            <ul class="softmedida_ul">
                                <li> Si no obtiene una solución eficaz o una mejora de la logística con el uso de un software genérico. </li>
                                <li> Si los procesos de su empresa u organización tienen particularidades que no desea cambiar, con el objetivo de conservar y mejorar la operatividad y eficiencia iniciales. </li>
                            </ul>
                        </div>
                        <div class="ui-grid-col-1"></div>
                        <div class="ui-grid-col-4">
                            <p class="FontBold" style="text-align: justify;">Potenciales sistemas a la medida:</p>
                            <ul class="softmedida_ul">
                                <li> Sistemas con control de código de barras. </li>
                                <li> Sistema de inventarios y manejo de productos. </li>
                                <li> Servicios Web (Sistemas construidos con el propósito de poder comunicar otros sistemas y permitirles interoperabilidad) </li>
                                <li> Sistemas de gestión empresarial. </li>
                                <li> Manejo de cualquier base de datos. </li>
                                <li> Sistemas para atención a clientes CRMs. </li>
                            </ul>
                        </div>
                        <div class="ui-grid-col-1"></div>
                    </div>
                    <br />
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <p>Tecnología usada por nuestra fábrica de software (entre otras): </p>                            
                        </div>
                    </div>
                </div>';
        $ss->featured = true;
        $ss->state = 'A';
        $ss->save();
    }
    
    public function addWebsiteService() {
        $ss = new \App\Service();
        $ss->name = 'Sitios Web';
        $ss->slogan = 'Si tu negocio no está en internet, tu negocio no existe.';
        $ss->icon = 'cloud';
        $ss->website_bg_color = 'fb8c00';
        $ss->website_html_content = '';
        $ss->featured = true;
        $ss->state = 'A';
        $ss->save();
    }
    
}
