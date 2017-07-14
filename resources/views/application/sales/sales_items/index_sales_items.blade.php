@extends('layouts.app')

@section('content')

<div class="ui-g">
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
                            <p>
                                <i class="fa fa-th-list" ></i>
                                <h1 class="coolvetica-rg" >Items de Venta.</h1>
                            </p>                
                        </div>
                    </div>
                </div>

                <div class="EmptyBox10" ></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <div id="tblSalesItems"></div> 
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

<input id="show_url" type="hidden" value="{{ route('show_sales_item',['sales_item_id' => '']) }}" />
<input id="edit_url" type="hidden" value="{{ route('edit_sales_item',['sales_item_id' => '']) }}" />

<script type="text/javascript">
    $(function() {                          
        
        $('#tblSalesItems').puidatatable({            
            paginator: {
                rows: 10
            },
            columns: [                
                {field: 'sales_item_id', headerText: 'Id'},
                {field: 'name', headerText: 'Nombre'},
                {field: 'state', headerText: 'Estado'},
                {                     
                    content: function(rowData) {
                        return '<a href="' +$('#show_url').val() + '/' + rowData.sales_item_id + '" class=""><i class="fa fa-search" /></a>';
                    },                                        
                    headerStyle: 'width:34px'
                },
                {                     
                    content: function(rowData) {
                        return '<a href="' +$('#edit_url').val() + '/' + rowData.sales_item_id + '" class=""><i class="fa fa-pencil" /></a>';
                    },                                        
                    headerStyle: 'width:34px'
                }
            ],
            emptyMessage: 'No hay información.',
            datasource: function(callback) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('list_sales_items_json')  }}",
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