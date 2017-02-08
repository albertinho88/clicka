@extends('layouts.app')

@section('content')

<p-breadcrumb>
    <p-menuitem value=""></p-menuitem> 
    <p-menuitem value="Conócenos"></p-menuitem>    
</p-breadcrumb>

<div class="ui-fluid">
    <div class="ui-g">
        <div class="ui-g-12">            
            <div class="card card-w-title seccionSite text-center">
                <p><i class="fa fa-lightbulb-o" style="font-size: 40px; color: #43a047; font-weight: bold;"></i></p>
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
                </div>
            </div> 
        </div>
        
    </div>
</div>

@include('partial.main_services')

@endsection
