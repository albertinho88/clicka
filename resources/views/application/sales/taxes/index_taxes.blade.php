@extends('layouts.app')

@section('content')

<div class="ui-g">
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
                            <p>
                                <i class="fa fa-th-list" ></i>
                                <h1 class="coolvetica-rg" >Impuestos.</h1>
                            </p>                
                        </div>
                    </div>
                </div>

                <div class="EmptyBox10" ></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <div id="tblTaxes"></div> 
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

<input id="show_url" type="hidden" value="{{ route('show_tax',['service_id' => '']) }}" />
<input id="edit_url" type="hidden" value="{{ route('edit_tax',['service_id' => '']) }}" />

<script type="text/javascript">
    $(function() {                          
        
        $('#tblTaxes').puidatatable({            
            paginator: {
                rows: 10
            },
            columns: [                                
                {field: 'name', headerText: 'Nombre'},
                {
                    field: 'init_date', 
                    headerText: 'Inicio Vigencia',
                    headerStyle: 'width:25%'
                },
                {
                    headerText: 'Fin Vigencia',
                    content: function(rowData) {
                        if (rowData.expiration_date == null) {
                            return "";
                        } else {
                            return rowData.expiration_date;
                        }                        
                    },
                    headerStyle: 'width:25%'
                },
                {                     
                    content: function(rowData) {
                        return '<a href="' +$('#show_url').val() + '/' + rowData.tax_id + '" class=""><i class="fa fa-search" /></a>';
                    },                                        
                    headerStyle: 'width:34px'
                },
                {                     
                    content: function(rowData) {
                        return '<a href="' +$('#edit_url').val() + '/' + rowData.tax_id + '" class=""><i class="fa fa-pencil" /></a>';
                    },                                        
                    headerStyle: 'width:34px'
                }
            ],
            emptyMessage: 'No hay información.',
            datasource: function(callback) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('list_taxes_json')  }}",
                    dataType: "json",
                    context: this,
                    success: function(response) {
                        callback.call(this, response);
                        initUiComponents();            
                        clearMessage();
                    }
                });
            }
        });                  
    });    
</script>

@endsection