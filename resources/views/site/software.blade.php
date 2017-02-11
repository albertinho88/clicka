@extends('layouts.app')

@section('content')

<p-breadcrumb>
    <p-menuitem value=""></p-menuitem> 
    <p-menuitem href="{{ route('services') }}" value="Servicios"></p-menuitem>    
    <p-menuitem value="Software a la Medida"></p-menuitem>    
</p-breadcrumb>

<div class="ui-fluid">                
    <div class="ui-g dashboard">            
        <div class="ui-g-12"> 
            <div class="card card-w-title seccionSite text-center">                                        
                <div class="titulo">
                    <p><i class="fa fa-industry" ></i></p>
                    <h1 class="coolvetica-rg" >Software a la Medida.</h1>                    
                </div>
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