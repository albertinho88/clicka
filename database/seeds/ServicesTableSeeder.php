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
        $this->addDataManagementService();
        $this->addEcommerceService();
        $this->addBiService();
        $this->addBpmService();
    }
    
    public function addSoftwareService() {
        $ss = new \App\Service();
        $ss->service_id = 'software';
        $ss->name = 'Software a la Medida';
        $ss->slogan = 'El activo más importante de tu empresa.';
        $ss->icon = 'fa-industry';
        $ss->website_bg_color = '0288d1';
        $ss->website_html_content = '<div class="ui-grid ui-grid-responsive">
            <div class="ui-grid-row">
            <div class="ui-grid-col-1"></div>
            <div class="ui-grid-col-5">
            <p style="text-align: justify;">En el desenvolvimiento de una empresa durante el d&iacute;a a d&iacute;a, contar con un software personalizado o a la medida puede convertirse en un activo importante para que la empresa funcione de manera m&aacute;s efectiva y realice sus operaciones internas en un menor tiempo.</p>
            <p style="text-align: justify;">El software hecho a la medida es una soluci&oacute;n innovadora que atiende las necesidades de cada empresa y canaliza los requerimientos de esta hacia una plataforma productiva y confiable.</p>
            <p style="text-align: justify;" class="FontBold">C&oacute;mo saber si necesito un software personalizado para mi empresa?</p>
            <ul class="softmedida_ul">
            <li>Si no obtiene una soluci&oacute;n eficaz o una mejora de la log&iacute;stica con el uso de un software gen&eacute;rico.</li>
            <li>Si los procesos de su empresa u organizaci&oacute;n tienen particularidades que no desea cambiar, con el objetivo de conservar y mejorar la operatividad y eficiencia iniciales.</li>
            </ul>
            </div>
            <div class="ui-grid-col-1"></div>
            <div class="ui-grid-col-4">
            <p class="FontBold" style="text-align: justify;">Potenciales sistemas a la medida:</p>
            <ul class="softmedida_ul">
            <li>Sistemas con control de c&oacute;digo de barras.</li>
            <li>Sistema de inventarios y manejo de productos.</li>
            <li>Servicios Web (Sistemas construidos con el prop&oacute;sito de poder comunicar otros sistemas y permitirles interoperabilidad)</li>
            <li>Sistemas de gesti&oacute;n empresarial.</li>
            <li>Manejo de cualquier base de datos.</li>
            <li>Sistemas para atenci&oacute;n a clientes CRMs.</li>
            </ul>
            </div>
            <div class="ui-grid-col-1"></div>
            </div>
            <br />
            <div class="ui-grid-row">
            <div class="ui-grid-col-12">
            <p>Tecnolog&iacute;a usada por nuestra f&aacute;brica de software (entre otras):</p>
            <img src="http://clicka.ec/_resource/images/tools/java64.png" alt="" width="64" height="65" /> <img src="http://clicka.ec/_resource/images/tools/php64.png" alt="" width="64" height="64" /> <img src="http://clicka.ec/_resource/images/tools/jquery64.png" alt="" width="64" height="65" /> <img src="http://clicka.ec/_resource/images/tools/postgres64.png" alt="" width="58" height="64" /> <img src="http://clicka.ec/_resource/images/tools/mysql64.png" alt="" width="95" height="50" /> <img src="http://clicka.ec/_resource/images/tools/apache64.png" alt="" width="114" height="48" /></div>
            </div>
            </div>';
        $ss->featured = true;
        $ss->state = 'A';
        $ss->order = 1;
        $ss->save();
    }
    
    public function addWebsiteService() {
        $ss = new \App\Service();
        $ss->service_id = 'websites';
        $ss->name = 'Sitios Web';
        $ss->slogan = 'Si tu negocio no está en internet, tu negocio no existe.';
        $ss->icon = 'fa-cloud';
        $ss->website_bg_color = 'fb8c00';
        $ss->website_html_content = '';
        $ss->featured = true;
        $ss->state = 'A';
        $ss->order = 2;
        $ss->save();
    }
    
    public function addEcommerceService() {
        $ss = new \App\Service();
        $ss->service_id = 'ecommerce';
        $ss->name = 'E-Commerce';
        $ss->slogan = 'Vender por internet, optimizando los recursos.';
        $ss->icon = 'fa-shopping-cart';
        $ss->website_bg_color = '43a047';
        $ss->website_html_content = '<div class="ui-grid ui-grid-responsive">
            <div class="ui-grid-row">
            <div class="ui-grid-col-1"></div>
            <div class="ui-grid-col-10">
            <div class="ui-grid ui-grid-responsive">
            <div class="ui-grid-row">
            <div class="ui-grid-col-12">
            <p style="text-align: justify;">La gesti&oacute;n de un negocio de comercio electr&oacute;nico, considera t&eacute;cnicas totalmente diferentes a las de un negocio offline.</p>
            <p style="text-align: justify;">El &eacute;xito de una empresa dedicada al e-commerce radica en varios factores. Uno de ellos es satisfacer al cliente al momento de adquirir un producto o servicio. Adem&aacute;s, se debe contar con un sistema de gesti&oacute;n apto que sea vers&aacute;til, seguro y que permita generar confianza en los clientes, todo esto con el fin de conseguir que la experiencia de comprar online sea todo un placer.</p>
            <p style="text-align: justify;">Clicka ofrece soluciones de ecommerce basadas principalmente en los siguientes principios:</p>
            <div class="ui-grid ui-grid-responsive">
            <div class="ui-grid-col-6">
            <div class="card card-with-border SoftGrayBack"><i class="fa fa-globe Fs40 FloatNoneOnMobile Orange MarRight10"></i>
            <p>Globalizaci&oacute;n</p>
            <small>Ofrecer productos y servicios a personas en cualquier parte del mundo.</small></div>
            <div class="EmptyBox20"></div>
            <div class="card card-with-border SoftGrayBack"><i class="fa fa-key FloatNoneOnMobile Green MarRight10 Fs40"></i>
            <p>Accesibilidad</p>
            <small>Tu negocio "abierto" 365 d&iacute;as del a&ntilde;o, 24 horas al d&iacute;a.</small></div>
            <div class="EmptyBox20"></div>
            </div>
            <div class="ui-grid-col-6">
            <div class="card card-with-border SoftGrayBack"><i class="fa fa-credit-card Fs40 FloatNoneOnMobile SoftBlue MarRight10"></i>
            <p>Reducci&oacute;n de gastos</p>
            <small>Ahorrar en personal, en espacio f&iacute;sico y en insumos.</small></div>
            <div class="EmptyBox20"></div>
            <div class="card card-with-border SoftGrayBack"><i class="fa fa-comment-o Fs40 FloatNoneOnMobile Blue MarRight10"></i>
            <p>Comunicaci&oacute;n</p>
            <small>Feedback a trav&eacute;s del comportamiento del comprador on-line.</small></div>
            <div class="EmptyBox20"></div>
            </div>
            </div>
            </div>
            </div>
            <div class="ui-grid-row">
            <div class="ui-grid-col-12">
            <div class="EmptyBox10"></div>
            <p>Tecnolog&iacute;a usada para nuestras soluciones de ecommerce (entre otras):</p>
            <img src="http://clicka.ec/_resource/images/tools/wordpress64.png" alt="" width="103" height="64" /> <img src="http://clicka.ec/_resource/images/tools/woocommerce64.png" caption="false" width="91" height="64" /> <img src="http://clicka.ec/_resource/images/tools/prestashop64.png" alt="" width="78" height="64" /> <img src="http://clicka.ec/_resource/images/tools/joomla64.png" alt="" width="84" height="64" /></div>
            </div>
            </div>
            </div>
            </div>
            </div>';
        $ss->featured = true;
        $ss->state = 'A';
        $ss->order = 3;
        $ss->save();
    }
    
    public function addDataManagementService() {
        $ss = new \App\Service();
        $ss->service_id = 'datamanagement';
        $ss->name = 'Data Management';
        $ss->slogan = 'Información, el elemento más valorado de tu empresa.';
        $ss->icon = 'fa-database';
        $ss->website_bg_color = '26a69a';
        $ss->website_html_content = '';
        $ss->featured = true;
        $ss->state = 'A';
        $ss->order = 4;
        $ss->save();
    }        
    
    public function addBiService() {
        $ss = new \App\Service();
        $ss->service_id = 'bi';
        $ss->name = 'Inteligencia de Negocios';
        $ss->slogan = 'Analizar la información para tomar decisiones.';
        $ss->icon = 'fa-line-chart';
        $ss->website_bg_color = '6c76af';
        $ss->website_html_content = '<div class="ui-grid ui-grid-responsive">
            <div class="ui-grid-row">
            <div class="ui-grid-col-1"></div>
            <div class="ui-grid-col-10">
            <div class="card">
            <div class="ui-grid ui-grid-responsive">
            <div class="ui-grid-col-6">
            <p style="text-align: justify;">Nuestro servicio de inteligencia de negocios es proporcionarle a su empresa una mayor visibilidad de las variables de rendimiento y la capacidad de gestionar mejor las decisiones y acciones que afectan al desempe&ntilde;o empresarial.</p>
            <p style="text-align: justify;">Clicka tiene una amplia experiencia y capacidades con la evaluaci&oacute;n, desarrollo e implementaci&oacute;n de soluciones de inteligencia de negocio:</p>
            <div class="card card-with-border SoftGrayBack ui-g ui-g-12">
            <div class="ui-g-4"><i class="fa fa-dashboard Fs40 Orange"></i></div>
            <div class="ui-g-8">
            <p>Desarrollo de cuadros de mando / cuadros de mandos con indicadores de Desempe&ntilde;o / clave</p>
            </div>
            </div>
            <div class="EmptyBox20"></div>
            <div class="card card-with-border SoftGrayBack ui-g ui-g-12">
            <div class="ui-g-4"><i class="fa fa-pie-chart Fs40 Green"></i></div>
            <div class="ui-g-8">
            <p>Informes y an&aacute;lisis de rentabilidad</p>
            </div>
            </div>
            <div class="EmptyBox20"></div>
            <div class="card card-with-border SoftGrayBack ui-g ui-g-12">
            <div class="ui-g-4"><i class="fa fa-clock-o Fs40  Blue"></i></div>
            <div class="ui-g-8">
            <p>Soluciones operativas de inteligencia, tales como "flash" de informaci&oacute;n, indicadores de rendimiento diario en tiempo real y alertas.</p>
            </div>
            </div>
            </div>
            <div class="ui-grid-col-6">
            <div class="EmptyBox10"></div>
            <img src="http://clicka.ec/_resource/images/tools/bi.jpg" style="width: 90%; height: auto;" />
            <div class="EmptyBox10"></div>
            <p>Suite de herramientas destinada para nuestros proyectos de BI:</p>
            <img src="http://clicka.ec/_resource/images/tools/pentaho.svg" style="width: 70%; height: auto;" /></div>
            </div>
            </div>
            </div>
            <div class="ui-grid-col-1"></div>
            </div>
            </div>';
        $ss->website_html_content = '';
        $ss->featured = true;
        $ss->state = 'A';
        $ss->order = 5;
        $ss->save();
    }
    
    public function addBpmService() {
        $ss = new \App\Service();
        $ss->service_id = 'bpm';
        $ss->name = 'Business Process Management';
        $ss->slogan = 'Optimizar recursos mediante la automatización de procesos de negocio.';
        $ss->icon = 'fa-share-alt';
        $ss->website_bg_color = 'f77286';
        $ss->website_html_content = '<div class="ui-grid ui-grid-responsive">
            <div class="ui-grid-row">
            <div class="ui-grid-col-1"></div>
            <div class="ui-grid-col-10">
            <div class="card">
            <p style="text-align: justify;">El modulo de Gesti&oacute;n de Procesos (BPM) permite automatizar procesos de negocio, interaccionando con los usuarios.</p>
            <p style="text-align: justify;">Se trata de conseguir, coordinar los procesos estableciendo un flujo automatizado de trabajo en base a reglas propias del negocio y un esquema operativo de la empresa.</p>
            <p style="text-align: justify;">Beneficios:</p>
            <div class="EmptyBox20"></div>
            <div class="ui-grid ui-grid-responsive">
            <div class="ui-grid-row">
            <div class="ui-grid-col-1"><i class="fa fa-star Pink Fs50 FloatNoneOnMobile MarRight10"></i></div>
            <div class="ui-grid-col-5">
            <p>Mejoramiento de la calidad/eficiencia/productividad.</p>
            </div>
            <div class="ui-grid-col-1"><i class="fa fa-sitemap Blue Fs50 FloatNoneOnMobile MarRight10"></i></div>
            <div class="ui-grid-col-5">
            <p>Desarrollo organizativo.</p>
            </div>
            </div>
            </div>
            <div class="Separator"></div>
            <div class="ui-grid ui-grid-responsive">
            <div class="ui-grid-row">
            <div class="ui-grid-col-1"><i class="fa fa-whatsapp Orange Fs50 FloatNoneOnMobile MarRight10"></i></div>
            <div class="ui-grid-col-5">
            <p>Comunicaci&oacute;n interna mejorada.</p>
            </div>
            <div class="ui-grid-col-1"><i class="fa fa-trophy icon-award-stroke Purple Fs50 FloatNoneOnMobile MarRight10"></i></div>
            <div class="ui-grid-col-5">
            <p>Imagen y prestigio.</p>
            </div>
            </div>
            </div>
            <div class="Separator"></div>
            <div class="ui-grid ui-grid-responsive">
            <div class="ui-grid-row">
            <div class="ui-grid-col-1"><i class="fa fa-flag-checkered Green Fs50 FloatNoneOnMobile MarRight10"></i></div>
            <div class="ui-grid-col-5">
            <p>Competitividad.</p>
            </div>
            <div class="ui-grid-col-1"><i class="fa  fa-line-chart SoftBlue Fs50 FloatNoneOnMobile MarRight10"></i></div>
            <div class="ui-grid-col-5">
            <p>Mejora continua.</p>
            </div>
            </div>
            </div>
            <div class="Separator"></div>
            <div class="EmptyBox10"></div>
            <p style="text-align: justify;">Algunos de los posibles procesos que pueden automatizarse son los siguientes:</p>
            <ul class="softmedida_ul">
            <li>Procedimientos de calidad, con frecuencia estos procesos se gestionan manualmente (hojas excel que recogen datos importantes).</li>
            <li>Procesos como la reclamaci&oacute;n de clientes o inconformidades de proveedores, suelen ser procesos en los que intervienen varios departamentos con m&uacute;ltiples funciones.</li>
            <li>Entre otros, etc.</li>
            </ul>
            </div>
            </div>
            <div class="ui-grid-col-1"></div>
            </div>
            <div class="ui-grid-row">
            <div class="ui-grid-col-12">
            <div class="EmptyBox10"></div>
            <p>Tecnolog&iacute;a usada para la automatizaci&oacute;n de procesos de negocio (entre otras):</p>
            <img src="http://clicka.ec/_resource/images/tools/jbossjbpm64.png" alt="" width="158" height="64" /></div>
            </div>
            </div>';
        $ss->website_bg_color = '63c9f1';
        $ss->website_html_content = '';
        $ss->featured = true;
        $ss->state = 'A';
        $ss->order = 6;
        $ss->save();
    }
    
}
