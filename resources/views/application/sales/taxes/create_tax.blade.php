@extends('layouts.app')

@section('content')

<div id="formAjax" class="ui-fluid">
    <div class="ui-g" >
        <div class="ui-g-12"> 
            <div class="card card-w-title">                                                                                                 
                <div class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            @include('application.sales.taxes.partial.menu_tax')
                        </div>
                    </div>
                    
                    <div class="EmptyBox10" ></div>
                    
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <div class="text-center titulo">
                                <p><i class="fa fa-plus" ></i></p>
                                <p><h1 class="coolvetica-rg" >Nuevo Impuesto.</h1></p>                
                            </div>
                        </div>
                    </div>
                
                    <form id="createTaxForm" name="createTaxForm" method="POST" action="{{ route('store_tax') }}" class="ajaxJsonForm form-horizontal">                                                
                        
                        @include('application.sales.taxes.partial.tax_form')
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection