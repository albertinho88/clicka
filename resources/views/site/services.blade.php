@extends('layouts.app')

@section('content')

<p-breadcrumb>
    <p-menuitem value=""></p-menuitem> 
    <p-menuitem value="Servicios"></p-menuitem>    
</p-breadcrumb>

<div class="ui-fluid">
    <div class="ui-g dashboard">
        <div class="ui-g-12"> 
            <div class="card card-w-title seccionSite text-center">
                <p><i class="fa fa-laptop" style="font-size: 40px; font-weight: bold;"></i></p>
                <p><h1 class="coolvetica-rg" style="font-size: 28px;" >Nuestros Servicios.</h1></p>
                <p>"Nuestros servicios están directamente relacionados, para brindar una solución 360º a nuestros clientes."</p>
                
                                
                <div class="ui-g-12 ui-md-6 ui-lg-4">
                    <a href="<?php echo url('service',['service_id' => 'software']); ?>" class="changePageWithLink" >
                        <div class="ui-g card overview-box overview-box-1 " style="background-color: #0288d1;">                        
                            <div class="ui-g-12 text-center">
                                <i class="fa fa-industry"></i>
                                <h2 style="color: #ffffff; margin-bottom: 0;margin-top:8px;">Software a la Medida</h2>
                                <small style="color: #ffffff;">"El activo más importante de tu empresa."</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="ui-g-12 ui-md-6 ui-lg-4">
                    <a href="<?php echo url('service',['service_id' => 'emarketing']); ?>" class="changePageWithLink" >
                    <div class="ui-g card overview-box overview-box-1 " style="background-color: #fb8c00;">                        
                        <div class="ui-g-12 text-center">
                            <i class="fa fa-cloud"></i>
                            <h2 style="color: #ffffff; margin-bottom: 0;margin-top:8px;">E-Marketing</h2>
                            <small style="color: #ffffff;">"Si tu negocio no está en internet, tu negocio no existe."</small>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="ui-g-12 ui-md-6 ui-lg-4">
                    <a href="<?php echo url('service',['service_id' => 'ecommerce']); ?>" class="changePageWithLink" >
                    <div class="ui-g card overview-box overview-box-1 " style="background-color: #43a047;">                        
                        <div class="ui-g-12 text-center">
                            <i class="fa fa-shopping-cart"></i>
                            <h2 style="color: #ffffff; margin-bottom: 0;margin-top:8px;">E-Commerce</h2>
                            <small style="color: #ffffff;">"Vende por internet, optimizando tus recursos."</small>
                        </div>
                    </div>
                    </a>
                </div>                
                
                <div class="ui-g-12 ui-md-6 ui-lg-4">
                    <a href="<?php echo url('service',['service_id' => 'datamanagement']); ?>" class="changePageWithLink" >
                    <div class="ui-g card overview-box overview-box-1 " style="background-color: #26a69a;">                        
                        <div class="ui-g-12 text-center">
                            <i class="fa fa-database"></i>
                            <h2 style="color: #ffffff; margin-bottom: 0;margin-top:8px;">Data Management</h2>
                            <small style="color: #ffffff;">"El activo más importante de tu empresa."</small>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="ui-g-12 ui-md-6 ui-lg-4">
                    <a href="<?php echo url('service',['service_id' => 'bi']); ?>" class="changePageWithLink" >
                    <div class="ui-g card overview-box overview-box-1 " style="background-color: #f7d100; color: rgba(0, 0, 0, 0.4);">                        
                        <div class="ui-g-12 text-center">
                            <i class="fa fa-line-chart" style="color: rgba(0, 0, 0, 0.4);"></i>
                            <h2 style="margin-bottom: 0;margin-top:8px;">Inteligencia de Negocios</h2>
                            <small>"El activo más importante de tu empresa."</small>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="ui-g-12 ui-md-6 ui-lg-4">
                    <a href="<?php echo url('service',['service_id' => 'bpm']); ?>" class="changePageWithLink" >
                    <div class="ui-g card overview-box overview-box-1 " style="background-color: #e1f5fe;">                        
                        <div class="ui-g-12 text-center" style="color: #0288d1 !important;" >
                            <i class="fa fa-share-alt" style="color: #0288d1 !important;"></i>
                            <h2 style="margin-bottom: 0;margin-top:8px;">Business Process Management</h2>
                            <small >"El activo más importante de tu empresa."</small>
                        </div>
                    </div>
                    </a>
                </div>                                
                
                <div class="ui-g-12">
                    <div style="height: 20px"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
