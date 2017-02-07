@extends('layouts.app')

@section('content')

    <div class="ui-breadcrumb ui-module ui-widget ui-widget-header ui-helper-clearfix ui-corner-all" role="menu">
        <ul>
            <li role="menuitem"><a tabindex="-1" class="ui-menuitem-link ui-corner-all ui-icon ui-icon-home" href="#"><span class="ui-menuitem-text">Inicio</span></a></li>
            <li class="ui-breadcrumb-chevron ui-icon ui-icon-triangle-1-e"></li>
            <li role="menuitem"><a tabindex="-1" class="ui-menuitem-link ui-corner-all" href="#"><span class="ui-menuitem-text">Servicios</span></a></li>
            <li class="ui-breadcrumb-chevron ui-icon ui-icon-triangle-1-e"></li>
            <li role="menuitem"><a tabindex="-1" class="ui-menuitem-link ui-corner-all" href="#"><span class="ui-menuitem-text">E-Marketing</span></a></li>                        
        </ul>
    </div>

    <div class="ui-fluid">
        <div class="ui-g dashboard">
            <div class="ui-g-12"> 
                <div class="card card-w-title seccionSite text-center">
                    <p><i class="fa fa-cloud" style="font-size: 40px; font-weight: bold;"></i></p>
                    <p><h1 class="coolvetica-rg" style="font-size: 28px;" >E-Marketing.</h1></p>
                    <p>"Si tu negocio no está en internet, tu negocio no existe."</p>

                    <br />
                    
                    <div class="ui-grid ui-grid-responsive">
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-4 MarTop5" >
                                <fieldset >
                                    <legend>                        
                                        Basic Website                                                                        
                                    </legend>                    
                                    <p>
                                        <i class="fa fa-css3  Blue FloatNoneOnMobile MarRight10" style="font-size: 30px;"></i>
                                        <i class="fa fa-html5  Orange FloatNoneOnMobile MarRight10" style="font-size: 30px;"></i>
                                    </p>
                                    <div style="text-align: left; margin-left: 5%;" class="Fs12 Blue">
                                        <p>
                                            <input type="checkbox" name="chk" id="chk1" value="website_static" />
                                            <label for="chk1" >Sitio Web Estático</label>
                                        </p>
                                        <ul class="softmedida_ul">
                                            <li>Tecnologías: Html5 + CSS3 + JQuery.</li>
                                            <li>Contenido no administrable.</li>
                                            <li>Alojamiento Web 5GB (1 año gratis).</li>
                                            <li>Registro de Dominio (.com, .ec, .net)</li>
                                            <li>Cuentas de correo: 5</li>
                                        </ul>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="ui-grid-col-4 MarTop5" >
                                <fieldset >
                                    <legend>                        
                                        Dynamic Website                                                                        
                                    </legend>                    
                                    <p>
                                        <i class="fa fa-wordpress  SoftBlue FloatNoneOnMobile MarRight10" style="font-size: 30px;"></i>
                                        <i class="fa fa-joomla  Green FloatNoneOnMobile MarRight10" style="font-size: 30px;"></i>
                                    </p>
                                    <div style="text-align: left; margin-left: 5%;" class="Fs12 Blue">
                                        <p>
                                            <input type="checkbox" name="chk" id="chk2" value="website_dynamic" />
                                            <label for="chk2" >Sitio Web Dinámico.</label>
                                        </p>
                                        <ul class="softmedida_ul">
                                            <li>Tecnologías: Joomla / Wordpress + MySQL.</li>                            
                                            <li>Contenido Administrable.</li>
                                            <li>Alojamiento Web 8GB (1 año gratis).</li>
                                            <li>Registro de Dominio (.com, .ec, .net)</li>
                                            <li>Cuentas de correo: 10</li>
                                        </ul>
                                    </div>
                                </fieldset>                
                            </div>            
                            <div class="ui-grid-col-4 MarTop5" >
                                <fieldset >
                                    <legend>                        
                                        Sistema Web                                                                        
                                    </legend>                    
                                    <p>
                                        <i class="fa fa-drupal  Red FloatNoneOnMobile MarRight10" style="font-size: 30px;"></i>
                                    </p>
                                    <div style="text-align: left; margin-left: 5%;" class="Fs12 Blue">
                                        <p>
                                            <input type="checkbox" name="chk" id="chk3" value="portal_web"  />
                                            <label for="chk3" >Sistema Web.</label>
                                        </p>
                                        <ul class="softmedida_ul">
                                            <li>Tecnologías: Html5 + CSS3 + PHP + MySQL / PostgreSQL.</li>                            
                                            <li>Módulo de Gestión.</li>
                                            <li>Alojamiento Web 12GB (1 año gratis).</li>
                                            <li>Registro de Dominio (.com, .ec, .net)</li>
                                            <li>Cuentas de correo: 20</li>
                                        </ul>
                                    </div>
                                </fieldset>
                            </div>
                        </div>                

                        <div class="EmptyBox10"></div>

                        <div class="ui-grid-row">
                            <div class="ui-grid-col-4 MarTop5" >
                                <fieldset >
                                    <legend>                        
                                        Social Media                                                                       
                                    </legend>                    
                                    <p>
                                        <i class="fa fa-facebook-official  Blue FloatNoneOnMobile MarRight10" style="font-size: 30px;"></i>
                                    </p>
                                    <div style="text-align: left; margin-left: 5%;" class="Fs12 Blue">
                                        <p>
                                            <input type="checkbox" name="chk" id="chk4" value="gestion_facebook" />
                                            <label for="chk4" >Gestión FanPage Facebook.</label>
                                        </p>
                                        <ul class="softmedida_ul">
                                            <li>Monitoreo actividad.</li>                            
                                            <li>Respuesta a los fans.</li>
                                            <li>Publicaciones (Difusión y Branding).</li>
                                            <li>Análisis.</li>
                                        </ul>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="ui-grid-col-4 MarTop5" >
                                <fieldset >
                                    <legend>                        
                                        Cloud Services                                                                       
                                    </legend>                    
                                    <p>
                                        <i class="fa fa-cloud-upload  Turquoise FloatNoneOnMobile MarRight10" style="font-size: 30px;"></i>
                                        <i class="fa fa-database  LeadenGreen FloatNoneOnMobile MarRight10" style="font-size: 30px;"></i>
                                    </p>
                                    <div style="text-align: left; margin-left: 5%;" class="Fs12 Blue">
                                        <p>
                                            <input type="checkbox" name="chk" id="chk5" value="webhosting" />
                                            <label for="chk5" >Alojamiento Web.</label>
                                        </p>
                                        <ul class="softmedida_ul">
                                            <li>Registro Dominio (.com, .ec, .net)</li>                            
                                        </ul>
                                        <p>
                                            <input type="checkbox" name="chk" id="chk6" value="webdatabase" />
                                            <label for="chk6" >Base de Datos Web.</label>
                                        </p>
                                        <p>
                                            <input type="checkbox" name="chk" id="chk7" value="webmail" />
                                            <label for="chk7" >Cuentas de correo.</label>
                                        </p>                        
                                    </div>
                                </fieldset>
                            </div>            
                            <div class="ui-grid-col-4 MarTop5" >
                                <fieldset >
                                    <legend>                        
                                        Imagen Corporativa                                                                      
                                    </legend>                    
                                    <p>
                                        <i class="fa fa-paint-brush  Pink FloatNoneOnMobile MarRight10" style="font-size: 30px;"></i>
                                    </p>
                                    <div style="text-align: left; margin-left: 5%;" class="Fs12 Blue">
                                        <p>
                                            <input type="checkbox" name="chk" id="chk8" value="webhosting" class="chk"/>
                                            <label for="chk8" >Creación/Rediseño de Logotipo.</label>
                                        </p>
                                        <p>
                                            <input type="checkbox" name="chk" id="chk9" value="webdatabase" class="chk"/>
                                            <label for="chk9" >Pieza Corporativa.</label>
                                        </p>
                                        <p>
                                            <input type="checkbox" name="chk" id="chk10" value="webmail" class="chk"/>
                                            <label for="chk10" >Banner Publicitario.</label>
                                        </p>                       
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        
                    </div>
                        
                </div>
            </div>
        </div>
    </div>

    @include('partial.main_services')

@endsection