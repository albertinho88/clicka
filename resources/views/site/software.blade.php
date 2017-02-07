@extends('layouts.app')

@section('content')
    
    <div class="ui-breadcrumb ui-module ui-widget ui-widget-header ui-helper-clearfix ui-corner-all" role="menu">
        <ul>
            <li role="menuitem"><a tabindex="-1" class="ui-menuitem-link ui-corner-all ui-icon ui-icon-home" href="#"><span class="ui-menuitem-text">Inicio</span></a></li>
            <li class="ui-breadcrumb-chevron ui-icon ui-icon-triangle-1-e"></li>
            <li role="menuitem"><a tabindex="-1" class="ui-menuitem-link ui-corner-all" href="#"><span class="ui-menuitem-text">Servicios</span></a></li>
            <li class="ui-breadcrumb-chevron ui-icon ui-icon-triangle-1-e"></li>
            <li role="menuitem"><a tabindex="-1" class="ui-menuitem-link ui-corner-all" href="#"><span class="ui-menuitem-text">Software a la Medida</span></a></li>                      
        </ul>
    </div>

    <div class="ui-fluid">                
        <div class="ui-g dashboard">            
            <div class="ui-g-12"> 
                <div class="card card-w-title seccionSite text-center">                                        
                    
                    <p><i class="fa fa-industry" style="font-size: 40px; font-weight: bold;"></i></p>
                    <h1 class="coolvetica-rg" style="font-size: 28px;" >Software a la Medida.</h1>                    
                    <p>"Un software personalizado puede convertirse en el activo más importante de tu empresa."</p>

                    <br />

                    <div class="ui-grid ui-grid-responsive">
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
                                    <li> Sistemas para atención a clientes CRM's. </li>
                                </ul>
                            </div>
                            <div class="ui-grid-col-1"></div>
                        </div>
                        <br />
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-12">
                                <p>Tecnología usada por nuestra fábrica de software (entre otras): </p>
                                <img src="{{ asset('_resource/images/tools/java64.png') }}" alt="Java" style="margin: 5px;">
                                <img src="{{ asset('_resource/images/tools/php64.png') }}" alt="PHP" style="margin: 5px;">
                                <img src="{{ asset('_resource/images/tools/jquery64.png') }}" alt="JQuery" style="margin: 5px;">
                                <img src="{{ asset('_resource/images/tools/postgres64.png') }}" alt="PostgreSQL" style="margin: 5px;">
                                <img src="{{ asset('_resource/images/tools/mysql64.png') }}" alt="MySQL" style="margin: 5px;">
                                <img src="{{ asset('_resource/images/tools/apache64.png') }}" alt="Apache" style="margin: 5px;">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('partial.main_services')

@endsection 