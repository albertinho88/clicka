@extends('layouts.app')

@section('content')

<div class="ui-breadcrumb ui-module ui-widget ui-widget-header ui-helper-clearfix ui-corner-all" role="menu">
    <ul>
        <li role="menuitem"><a tabindex="-1" class="ui-menuitem-link ui-corner-all ui-icon ui-icon-home" href="#"><span class="ui-menuitem-text">Inicio</span></a></li>
        <li class="ui-breadcrumb-chevron ui-icon ui-icon-triangle-1-e"></li>
        <li role="menuitem"><a tabindex="-1" class="ui-menuitem-link ui-corner-all" href="#"><span class="ui-menuitem-text">Servicios</span></a></li>
        <li class="ui-breadcrumb-chevron ui-icon ui-icon-triangle-1-e"></li>
        <li role="menuitem"><a tabindex="-1" class="ui-menuitem-link ui-corner-all" href="#"><span class="ui-menuitem-text">Data Management</span></a></li>                    
    </ul>
</div>

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