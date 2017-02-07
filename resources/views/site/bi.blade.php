@extends('layouts.app')

@section('content')

<div class="ui-breadcrumb ui-module ui-widget ui-widget-header ui-helper-clearfix ui-corner-all" role="menu">
    <ul>
        <li role="menuitem"><a tabindex="-1" class="ui-menuitem-link ui-corner-all ui-icon ui-icon-home" href="#"><span class="ui-menuitem-text">Inicio</span></a></li>
        <li class="ui-breadcrumb-chevron ui-icon ui-icon-triangle-1-e"></li>
        <li role="menuitem"><a tabindex="-1" class="ui-menuitem-link ui-corner-all" href="#"><span class="ui-menuitem-text">Servicios</span></a></li>
        <li class="ui-breadcrumb-chevron ui-icon ui-icon-triangle-1-e"></li>
        <li role="menuitem"><a tabindex="-1" class="ui-menuitem-link ui-corner-all" href="#"><span class="ui-menuitem-text">Inteligencia de Negocios</span></a></li>              
    </ul>
</div>

<div class="ui-fluid">
    <div class="ui-g">
        <div class="ui-g-12"> 
            <div class="card card-w-title seccionSite text-center">
                <p><i class="fa fa-line-chart" style="font-size: 40px; font-weight: bold;"></i></p>
                <p><h1 class="coolvetica-rg" style="font-size: 28px;" >Inteligencia de Negocios.</h1></p>
                <p>"Algo peor que no tener información disponible, es tener mucha información y no saber que hacer con ella."</p>
                
                <br />
                
                <div class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">                        
                        <div class="ui-grid-col-1" ></div>
                        <div class="ui-grid-col-10" >
                            <div class="card">
                                <div class="ui-grid ui-grid-responsive">
                                    <div class="ui-grid-col-6" >
                                        <p style="text-align: justify;">
                                            Nuestro servicio de inteligencia de negocios es proporcionarle a su empresa una mayor visibilidad 
                                            de las variables de rendimiento y la capacidad de gestionar mejor las decisiones y acciones 
                                            que afectan al desempeño empresarial.
                                        </p>
                                        <p style="text-align: justify;">
                                             Clicka tiene una amplia experiencia y capacidades con la evaluación, desarrollo e implementación 
                                             de soluciones de inteligencia de negocio:
                                        </p>                            

                                        <div class="card card-with-border SoftGrayBack ui-g ui-g-12">
                                            <div class="ui-g-4">
                                                <i class="fa fa-dashboard Fs40 Orange"></i>
                                            </div>
                                            <div class="ui-g-8">
                                                <p>
                                                    Desarrollo de cuadros de mando / cuadros de mandos con indicadores de Desempeño / clave
                                                </p>
                                            </div>                                                                                                                                    
                                         </div>
                                        <div class="EmptyBox20"></div>
                                        <div class="card card-with-border SoftGrayBack ui-g ui-g-12">
                                            <div class="ui-g-4">
                                                <i class="fa fa-pie-chart Fs40 Green"></i>
                                            </div>
                                            <div class="ui-g-8">
                                                <p>
                                                    Informes y análisis de rentabilidad
                                                </p>
                                            </div> 
                                         </div>
                                        <div class="EmptyBox20"></div>
                                        <div class="card card-with-border SoftGrayBack ui-g ui-g-12">
                                            <div class="ui-g-4">
                                                <i class="fa fa-clock-o Fs40  Blue"></i>
                                            </div>
                                            <div class="ui-g-8">
                                                <p>
                                                    Soluciones operativas de inteligencia, tales como "flash" de información, indicadores de 
                                                    rendimiento diario en tiempo real y alertas.
                                                </p>
                                            </div>                                                                                                                                    
                                         </div>
                                    </div>                        
                                    <div class="ui-grid-col-6" >
                                        <div class="EmptyBox10"></div>
                                        <img src="{{ asset('_resource/images/tools/bi.jpg') }}" style="width: 90%; height: auto;" />
                                        <div class="EmptyBox10"></div>
                                        <p>Suite de herramientas destinada para nuestros proyectos de BI:</p>
                                        <img src="{{ asset('_resource/images/tools/pentaho.svg') }}" style="width: 70%; height: auto;" />
                                    </div>
                                </div>                    
                            </div>                                
                        </div>
                        <div class="ui-grid-col-1" ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partial.main_services')

@endsection