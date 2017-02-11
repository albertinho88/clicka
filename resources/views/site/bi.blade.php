@extends('layouts.app')

@section('content')

<p-breadcrumb>
    <p-menuitem value=""></p-menuitem> 
    <p-menuitem href="{{ route('services') }}" value="Servicios"></p-menuitem>    
    <p-menuitem value="Inteligencia de Negocios"></p-menuitem>    
</p-breadcrumb>

<div class="ui-fluid">
    <div class="ui-g">
        <div class="ui-g-12"> 
            <div class="card card-w-title seccionSite text-center">
                <div class="titulo">
                    <p><i class="fa fa-line-chart" ></i></p>
                    <p><h1 class="coolvetica-rg" >Inteligencia de Negocios.</h1></p>
                </div>
                
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