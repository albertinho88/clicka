@extends('layouts.app')

@section('content')

<div  >
    <div class="exception-top">
    <img id="j_idt7" src="/poseidon/javax.faces.resource/images/icon-error.png.xhtml?ln=poseidon-layout" alt="">
    </div>
</div>

<div class="ui-fluid">
<div class="ui-g dashboard">
    <div class="ui-g-12" style="padding: 0;">
        <div class="card card-w-title seccionSite text-center" style="background-color: #ce5051; color: #ffffff;">
            <div class="titulo">
                <p><i class="fa fa-exclamation-circle" ></i></p>
                <p><h1 class="coolvetica-rg" >Acceso Prohibido.</h1></p>
            </div>
        </div>        
    </div>
    <div class="ui-g-12" style="padding: 0;">
        <div class="card card-w-title seccionSite text-center" style="background-color: #ffffff;">
            <p>Su usuario no tiene permisos para la acción solicitada.</p>
            <p>Para mayor información, comuniquese con el <span class="bolded">Administrador</span> del sistema.</p>
        </div>
    </div>    
</div>
</div>

@endsection