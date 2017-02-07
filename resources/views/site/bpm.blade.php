@extends('layouts.app')

@section('content')

<div class="ui-breadcrumb ui-module ui-widget ui-widget-header ui-helper-clearfix ui-corner-all" role="menu">
    <ul>
        <li role="menuitem"><a tabindex="-1" class="ui-menuitem-link ui-corner-all ui-icon ui-icon-home" href="#"><span class="ui-menuitem-text">Inicio</span></a></li>
        <li class="ui-breadcrumb-chevron ui-icon ui-icon-triangle-1-e"></li>
        <li role="menuitem"><a tabindex="-1" class="ui-menuitem-link ui-corner-all" href="#"><span class="ui-menuitem-text">Servicios</span></a></li>
        <li class="ui-breadcrumb-chevron ui-icon ui-icon-triangle-1-e"></li>
        <li role="menuitem"><a tabindex="-1" class="ui-menuitem-link ui-corner-all" href="#"><span class="ui-menuitem-text">Business Process Management</span></a></li>                   
    </ul>
</div>

<div class="ui-fluid">
    <div class="ui-g dashboard">
        <div class="ui-g-12"> 
            <div class="card card-w-title seccionSite text-center">
                <p><i class="fa fa-share-alt" style="font-size: 40px; font-weight: bold;"></i></p>
                <p><h1 class="coolvetica-rg" style="font-size: 28px;" >Business Process Management.</h1></p>
                <p>"Optimizar los recursos mediante la automatización de los procesos de negocio."</p>
                
                <br />
                
                <div class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-1" ></div>
                        <div class="ui-grid-col-10" >
                            <div class="card">
                                <p style="text-align: justify;">
                                El modulo de Gestión de Procesos (BPM) permite automatizar procesos de negocio, interaccionando con los usuarios.                     
                                </p>
                                <p style="text-align: justify;">
                                    Se trata de conseguir, coordinar los procesos estableciendo un flujo automatizado de trabajo en 
                                    base a reglas propias del negocio y un esquema operativo de la empresa.
                                </p>
                                <p style="text-align: justify;">
                                    Beneficios:
                                </p>
                                <div class="EmptyBox20"></div>
                                <div class="ui-grid ui-grid-responsive">
                                    <div class="ui-grid-row">
                                        <div class="ui-grid-col-1" >
                                            <i class="fa fa-star Pink Fs50 FloatNoneOnMobile MarRight10"></i>
                                        </div>
                                        <div class="ui-grid-col-5" >
                                            <p>Mejoramiento de la calidad/eficiencia/productividad.</p>
                                        </div>
                                        <div class="ui-grid-col-1" >
                                            <i class="fa fa-sitemap Blue Fs50 FloatNoneOnMobile MarRight10"></i>
                                        </div>
                                        <div class="ui-grid-col-5" >
                                            <p>Desarrollo organizativo.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="Separator"></div>
                                <div class="ui-grid ui-grid-responsive">
                                    <div class="ui-grid-row">
                                        <div class="ui-grid-col-1" >
                                            <i class="fa fa-whatsapp Orange Fs50 FloatNoneOnMobile MarRight10"></i>
                                        </div>
                                        <div class="ui-grid-col-5" >
                                            <p>Comunicación interna mejorada.</p>
                                        </div>
                                        <div class="ui-grid-col-1" >
                                            <i class="fa fa-trophy icon-award-stroke Purple Fs50 FloatNoneOnMobile MarRight10"></i>
                                        </div>
                                        <div class="ui-grid-col-5" >
                                            <p>Imagen y prestigio.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="Separator"></div>
                                <div class="ui-grid ui-grid-responsive">
                                    <div class="ui-grid-row">
                                        <div class="ui-grid-col-1" >
                                            <i class="fa fa-flag-checkered Green Fs50 FloatNoneOnMobile MarRight10"></i>
                                        </div>
                                        <div class="ui-grid-col-5" >
                                            <p>Competitividad.</p>
                                        </div>
                                        <div class="ui-grid-col-1" >
                                            <i class="fa  fa-line-chart SoftBlue Fs50 FloatNoneOnMobile MarRight10"></i>
                                        </div>
                                        <div class="ui-grid-col-5" >
                                            <p>Mejora continua.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="Separator"></div>
                                <div class="EmptyBox10"></div> 
                                <p style="text-align: justify;">
                                    Algunos de los posibles procesos que pueden automatizarse son los siguientes:
                                </p>
                                <ul class="softmedida_ul">
                                    <li>
                                        Procedimientos de calidad, con frecuencia estos procesos se gestionan manualmente (hojas excel que recogen datos importantes).
                                    </li>
                                    <li>
                                        Procesos como la reclamación de clientes o inconformidades de proveedores, suelen ser procesos en los que intervienen 
                                                varios departamentos con múltiples funciones.
                                    </li>
                                    <li>
                                        Entre otros, etc.
                                    </li>
                                </ul>                    
                            </div>
                        </div>
                        <div class="ui-grid-col-1" ></div>
                    </div>
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12" >
                            <div class="EmptyBox10"></div>
                            <p>Tecnología usada para la automatización de procesos de negocio (entre otras): </p>
                            <img src="{{ asset('_resource/images/tools/jbossjbpm64.png') }}" alt="Java" style="margin: 5px;" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partial.main_services')

@endsection