@extends('layouts.app')

@section('content')

<div id="formAjax" class="ui-fluid">
    <div class="ui-g" >
        <div class="ui-g-12"> 
            <div class="card card-w-title">                                                                                                 
                <div class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            @include('application.sales.item_types.partial.menu_item_types')
                        </div>
                    </div>
                    
                    <div class="EmptyBox10" ></div>
                    
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <div class="text-center titulo">
                                <p><i class="fa fa-plus" ></i></p>
                                <p><h1 class="coolvetica-rg" >Nueva Categoría de Items.</h1></p>                
                            </div>
                        </div>
                    </div>
                
                    <form id="createItemTypeForm" name="createItemTypeForm" method="POST" action="{{ route('store_item_type') }}" class="ajaxJsonForm form-horizontal">                                                
                        
                        @include('application.sales.item_types.partial.item_types_form')
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection