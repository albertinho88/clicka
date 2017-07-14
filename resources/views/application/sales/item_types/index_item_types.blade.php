@extends('layouts.app')

@section('content')

<div class="ui-g">
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
                            <p>
                                <i class="fa fa-th-list" ></i>
                                <h1 class="coolvetica-rg" >Categorías de Items de Venta.</h1>
                            </p>                
                        </div>
                    </div>
                </div>

                <div class="EmptyBox10" ></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <div id="tblItemTypes"></div> 
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

<input id="show_url" type="hidden" value="{{ route('show_item_type',['item_type_id' => '']) }}" />
<input id="edit_url" type="hidden" value="{{ route('edit_item_type',['item_type_id' => '']) }}" />

<script type="text/javascript">
    $(function() {                          
        
        $('#tblItemTypes').puidatatable({            
            paginator: {
                rows: 10
            },
            columns: [                
                {field: 'item_type_id', headerText: 'Id', headerStyle: 'width:15%'},
                {field: 'name', headerText: 'Nombre'},
                {
                    content: function(rowData) {
                        if (rowData.state == 'A') {
                            return 'Activo';
                        } else if (rowData.state == 'I') {
                            return 'Inactivo';
                        } else {
                            return '';
                        }
                    },
                    headerText: 'Estado', 
                    headerStyle: 'width:25%'},
                {                     
                    content: function(rowData) {
                        return '<a href="' +$('#show_url').val() + '/' + rowData.item_type_id + '" class=""><i class="fa fa-search" /></a>';
                    },                                        
                    headerStyle: 'width:34px'
                },
                {                     
                    content: function(rowData) {
                        return '<a href="' +$('#edit_url').val() + '/' + rowData.item_type_id + '" class=""><i class="fa fa-pencil" /></a>';
                    },                                        
                    headerStyle: 'width:34px'
                }
            ],
            emptyMessage: 'No hay información.',
            datasource: function(callback) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('list_item_types_json')  }}",
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