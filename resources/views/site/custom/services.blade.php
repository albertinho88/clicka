@extends('layouts.app')

@section('content')

@if($page->page_id != "home")
<p-breadcrumb>
    <p-menuitem value=""></p-menuitem> 
    <p-menuitem value="{{ $page->name }}"></p-menuitem>    
</p-breadcrumb>
@endif   

<div class="ui-fluid">
    <div class="ui-g dashboard">
        <div class="ui-g-12"> 
            <div class="card card-w-title seccionSite text-center">
                <div class="titulo">
                    <p><i class="fa fa-laptop" ></i></p>
                    <p><h1 class="coolvetica-rg" >Nuestros Servicios.</h1></p>
                </div>
                <p>"Nuestros servicios están directamente relacionados, para brindar una solución 360º a nuestros clientes."</p>
                
                
                @foreach ($active_services as $actser) 
                <div class="ui-g-12 ui-md-12 ui-lg-6">
                    <a href="<?php echo url('service',['service_id' => $actser->service_id]); ?>"  >
                    <div class="ui-g card overview-box overview-box-1 " style="background-color: #{{ $actser->website_bg_color }};">                        
                        <div class="ui-g-12 text-center">
                            <i class="fa {{ $actser->icon }}"></i>
                            <h2 style="color: #ffffff; margin-bottom: 0;margin-top:8px;">{{ $actser->name }}</h2>
                            <small style="color: #ffffff;">"{{ $actser->slogan }}"</small>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach                                                                                
                
                <div class="ui-g-12">
                    <div style="height: 20px"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
