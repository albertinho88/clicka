@extends('layouts.app')

@section('content')

<div class="ui-g">
    <div class="ui-g-12"> 
        <div class="card card-w-title">                                                                                                 
            <div class="ui-grid ui-grid-responsive">
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        @include('application.management.menu_options.partial.menu_menu_options')
                    </div>
                </div>
                
                <div class="EmptyBox10" ></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <div class="text-center titulo">
                            <p>
                                <i class="fa fa-th-list" ></i>
                                <h1 class="coolvetica-rg" >Opciones de Menú.</h1>
                            </p>                
                        </div>
                    </div>
                </div>

                <div class="EmptyBox10" ></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <div id="tblMenuOptions"></div> 
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

<input id="show_url" type="hidden" value="{{ route('show_menu_option',['menu_id' => '']) }}" />
<input id="edit_url" type="hidden" value="{{ route('edit_menu_option',['menu_id' => '']) }}" />

<script type="text/javascript">
    $(function() {                          
        
        $('#tblMenuOptions').puidatatable({            
            paginator: {
                rows: 10
            },
            columns: [                
                {field: 'menu_id', headerText: 'Id'},
                {field: 'label', headerText: 'Etiqueta'},
                {field: 'state', headerText: 'Estado'},
                {                     
                    content: function(rowData) {
                        return '<a href="' +$('#show_url').val() + '/' + rowData.menu_id + '" class=""><i class="fa fa-search" /></a>';
                    },                                        
                    headerStyle: 'width:34px'
                },
                {                     
                    content: function(rowData) {
                        return '<a href="' +$('#edit_url').val() + '/' + rowData.menu_id + '" class=""><i class="fa fa-pencil" /></a>';
                    },                                        
                    headerStyle: 'width:34px'
                }
            ],
            emptyMessage: 'No hay información.',
            datasource: function(callback) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('list_menu_options_json')  }}",
                    dataType: "json",
                    context: this,
                    success: function(response) {
                        callback.call(this, response);
                        initComponents();            
                        clearMessage();
                    }
                });
            }
        });                  
    });    
</script>

@endsection