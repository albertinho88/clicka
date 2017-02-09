@extends('layouts.app')

@section('content')

<div class="ui-g">
        <div class="ui-g-12"> 
            <div class="card card-w-title">                                                                                                 
                <div class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <ul class="menubar">                                
                                <li>
                                    <a href="{{ route('list_users') }}" data-icon="fa-users">Usuarios</a>
                                </li>
                                <li>
                                    <a href="{{ route('create_user') }}" data-icon="fa-plus">Nuevo Usuario</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <div class="text-center">
                                <p>
                                    <i class="fa fa-users" style="font-size: 30px; font-weight: bold;"></i>
                                    <h1 class="coolvetica-rg" style="font-size: 18px;" >Usuarios.</h1>
                                </p>                
                            </div>
                        </div>
                    </div>
                    
                    <div class="EmptyBox10"></div>
                    
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <div id="tblUsers"></div>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<input id="edit_url" type="hidden" value="{{ route('show_user',['user_id' => '']) }}" />

<script type="text/javascript">
    $(function() {                          
        
        $('#tblUsers').puidatatable({
            caption: 'Listado',            
            columns: [
                {
                    field: '', 
                    content: function(rowData) {
                        return '<a href="' +$('#edit_url').val() + '/' + rowData.user_id + '"><i class="fa fa-laptop" /></a>';
                    } ,
                    headerText: 'Ver'
                },
                {field: 'user_id', headerText: 'Id'},
                {field: 'name', headerText: 'Nombre'},
                {field: 'state', headerText: 'Estado'}
            ],
            emptyMessage: 'No hay información.',
            selectionMode: 'single',
            rowSelect: function(event, data) {
                if (data.user_id) {
                    //alert(data.user_id);                    
                }
            },
            datasource: function(callback) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('get_users_json')  }}",
                    dataType: "json",
                    context: this,
                    success: function(response) {
                        callback.call(this, response);
                        clearMessage();
                    },                
                    beforeSend: function( xhr ) {
                        addMessage([{severity: 'warn', summary: '', detail: '<i class="fa fa-spinner fa-spin MarRight10"></i> Cargando...'}]);                        
                    }
                });
            }
        });                  
    });
    
</script>

@endsection