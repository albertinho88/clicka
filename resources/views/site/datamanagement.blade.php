@extends('layouts.app')

@section('content')

<p-breadcrumb>
    <p-menuitem value=""></p-menuitem> 
    <p-menuitem href="{{ route('services') }}" value="Servicios"></p-menuitem>    
    <p-menuitem value="Data Management"></p-menuitem>    
</p-breadcrumb>

<div class="ui-fluid">
    <div class="ui-g dashboard">
        <div class="ui-g-12"> 
            <div class="card card-w-title seccionSite text-center">
                <div class="titulo">
                    <p><i class="fa fa-database" ></i></p>
                    <p><h1 class="coolvetica-rg" >Data Management.</h1></p>
                </div>
                <p>"Información, el elemento más valorado de tu empresa."</p>
                
                <br />
                
                
            </div>
        </div>
    </div>
</div>

@include('partial.main_services')

@endsection