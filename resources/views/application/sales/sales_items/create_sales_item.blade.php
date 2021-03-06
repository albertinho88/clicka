@extends('layouts.app')

@section('content')

<div id="formAjax" class="ui-fluid">
    <div class="ui-g" >
        <div class="ui-g-12"> 
            <div class="card card-w-title">                                                                                                 
                <div class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            @include('application.sales.sales_items.partial.menu_sales_item')
                        </div>
                    </div>
                    
                    <div class="EmptyBox10" ></div>
                    
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <div class="text-center titulo">
                                <p><i class="fa fa-plus" ></i></p>
                                <p><h1 class="coolvetica-rg" >Nuevo Item de Venta.</h1></p>                
                            </div>
                        </div>
                    </div>
                    
                    <form id="createSalesItemForm" name="createSalesItemForm" method="POST" action="{{ route('store_sales_item') }}" class="ajaxJsonForm form-horizontal">                                                
                        
                        @include('application.sales.sales_items.partial.sales_item_form')
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection