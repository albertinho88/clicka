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
                                <p><i class="fa fa-pencil" ></i></p>
                                <p><h1 class="coolvetica-rg" >Editar Impuesto.</h1></p>                
                            </div>
                        </div>
                    </div>
                
                    <form id="editTaxForm" name="editTaxForm" method="POST" action="{{ route('update_tax') }}" class="ajaxJsonForm form-horizontal">                                                
                        
                        <input type="hidden" id="tax_id" name="tax_id" value="{{ $tax->tax_id }}" />
                        
                        @include('application.sales.taxes.partial.tax_form')
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection