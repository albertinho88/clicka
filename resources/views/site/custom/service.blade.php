@extends('layouts.app')

@section('content')

<p-breadcrumb>
    <p-menuitem value=""></p-menuitem> 
    <p-menuitem href="<?php echo url('page',['page_id' => 'services']); ?>" value="Servicios"></p-menuitem>    
    <p-menuitem value="{{ $service->name }}"></p-menuitem>    
</p-breadcrumb>

<div class="ui-fluid">                
    <div class="ui-g dashboard">            
        <div class="ui-g-12"> 
            <div class="card card-w-title seccionSite text-center">                                        
                <div class="titulo">
                    <p><i class="fa {{ $service->icon }}" ></i></p>
                    <h1 class="coolvetica-rg" >{{ $service->name }}</h1>                    
                </div>
                <p>"{{ $service->slogan }}"</p>

                <br />

                <?php echo $service->website_html_content; ?>

            </div>
        </div>
    </div>
</div>

@include('partial.main_services')

@endsection 