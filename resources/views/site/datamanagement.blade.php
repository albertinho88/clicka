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
                <p><i class="fa fa-database" style="font-size: 40px; font-weight: bold;"></i></p>
                <p><h1 class="coolvetica-rg" style="font-size: 28px;" >Data Management.</h1></p>
                <p>"Información, el elemento más valorado de tu empresa."</p>
                
                <br />
                
                
            </div>
        </div>
    </div>
</div>

@include('partial.main_services')

@endsection