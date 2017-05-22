@extends('layouts.app')

@section('content')

<div id="formAjax" class="ui-fluid">
    <div class="ui-g" >
        <div class="ui-g-12"> 
            <div class="card card-w-title">                                                                                                 
                <div class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            @include('application.management.services.partial.menu_service')
                        </div>
                    </div>
                    
                    <div class="EmptyBox10" ></div>
                    
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <div class="text-center titulo">
                                <p><i class="fa fa-pencil" ></i></p>
                                <p><h1 class="coolvetica-rg" >Editar Servicio.</h1></p>                
                            </div>
                        </div>
                    </div>
                
                    <form id="editServiceForm" name="editServiceForm" method="POST" action="{{ route('update_service') }}" class="ajaxJsonForm form-horizontal">
                        
                        <input type="hidden" id="service_id" name="service_id" value="{{ $service->service_id }}">
                        
                        @include('application.management.services.partial.service_form')
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection