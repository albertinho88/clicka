@extends('layouts.app')

@section('content')

<p-breadcrumb>
    <p-menuitem value=""></p-menuitem> 
    <p-menuitem href="{{ route('services') }}" value="Servicios"></p-menuitem>    
    <p-menuitem value="E-Commerce"></p-menuitem>    
</p-breadcrumb>

<div class="ui-fluid">
    <div class="ui-g">
        <div class="ui-g-12"> 
            <div class="card card-w-title seccionSite text-center">
                <div class="titulo">
                    <p><i class="fa fa-shopping-cart" style="font-size: 40px; font-weight: bold;"></i></p>
                    <p><h1 class="coolvetica-rg" style="font-size: 28px;" >E-Commerce.</h1></p>
                </div>
                
                <p>"Vender por internet, optimizando los recursos."</p>
                
                <br />
                
                <div class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">                        
                        <div class="ui-grid-col-1" ></div>
                        <div class="ui-grid-col-10" >                            
                                <div class="ui-grid ui-grid-responsive">
                                    <div class="ui-grid-row">
                                        <div class="ui-grid-col-12" >
                                            <p style="text-align: justify;">
                                                La gestión de un negocio de comercio electrónico, considera técnicas totalmente diferentes a las de un negocio offline.
                                            </p>
                                            <p style="text-align: justify;">
                                                El éxito de una empresa dedicada al e-commerce radica en varios factores. 
                                                Uno de ellos es satisfacer al cliente al momento de adquirir un producto o servicio. 
                                                Además, se debe contar con un sistema de gestión apto que sea versátil, seguro y 
                                                que permita generar confianza en los clientes, todo esto con el fin de conseguir que la 
                                                experiencia de comprar online sea todo un placer.
                                            </p>
                                            <p style="text-align: justify;">
                                                Clicka ofrece soluciones de ecommerce basadas principalmente en los siguientes principios:
                                            </p>                            

                                            <div class="ui-grid ui-grid-responsive">
                                                <div class="ui-grid-col-6" >
                                                    <div class="card card-with-border SoftGrayBack">                                
                                                        <i class="fa fa-globe Fs40 FloatNoneOnMobile Orange MarRight10"></i>
                                                        <p>Globalización</p>
                                                        <small>Ofrecer productos y servicios a personas en cualquier parte del mundo.</small>
                                                     </div>
                                                    <div class="EmptyBox20"></div>
                                                    <div class="card card-with-border SoftGrayBack">
                                                        <i class="fa fa-key FloatNoneOnMobile Green MarRight10 Fs40" ></i>
                                                        <p>Accesibilidad</p>
                                                        <small>Tu negocio "abierto" 365 días del año, 24 horas al día.</small>
                                                    </div>
                                                    <div class="EmptyBox20"></div>                                    
                                                </div>
                                                <div class="ui-grid-col-6" >
                                                    <div class="card card-with-border SoftGrayBack">
                                                        <i class="fa fa-credit-card Fs40 FloatNoneOnMobile SoftBlue MarRight10"></i>
                                                        <p>Reducción de gastos</p>
                                                        <small>Ahorrar en personal, en espacio físico y en insumos.</small>
                                                    </div>
                                                    <div class="EmptyBox20"></div>
                                                    <div class="card card-with-border SoftGrayBack">
                                                        <i class="fa fa-comment-o Fs40 FloatNoneOnMobile Blue MarRight10"></i>
                                                        <p>Comunicación</p>
                                                        <small>Feedback a través del comportamiento del comprador on-line.</small>
                                                    </div>
                                                    <div class="EmptyBox20"></div>
                                                </div>
                                            </div>                                                                                                                
                                        </div>
                                    </div>
                                    <div class="ui-grid-row">
                                        <div class="ui-grid-col-12" >
                                            <div class="EmptyBox10"></div>
                                            <p>Tecnología usada para nuestras soluciones de ecommerce (entre otras): </p>
                                            <img src="{{ asset('_resource/images/tools/wordpress64.png') }}" alt="Java" style="margin: 5px;" />
                                            <img src="{{ asset('_resource/images/tools/woocommerce64.png') }}" alt="Java" style="margin: 5px;" />
                                            <img src="{{ asset('_resource/images/tools/prestashop64.png') }}" alt="Java" style="margin: 5px;" />
                                            <img src="{{ asset('_resource/images/tools/joomla64.png') }}" alt="Java" style="margin: 5px;" />
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