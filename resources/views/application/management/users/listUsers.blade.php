@extends('layouts.app')

@section('content')

<div class="ui-g dashboard">
        <div class="ui-g-12"> 
            <div class="card card-w-title">
                <div class="text-center">
                    <p><i class="fa fa-users" style="font-size: 40px; font-weight: bold;"></i></p>
                    <p><h1 class="coolvetica-rg" style="font-size: 28px;" >Usuarios.</h1></p>                
                </div>
                
                <br />                                   
                
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
<div id="growlel"></div> 
<script type="text/javascript">
    $(function() {
        
        $('#growlel').puigrowl({sticky: true});          
        
        $('#tblUsers').puidatatable({
            caption: 'Listado',
            columns: [
                {field: 'user_id', headerText: 'Id'},
                {field: 'name', headerText: 'Nombre'},
                {field: 'state', headerText: 'Estado'}
            ],
            datasource: function(callback) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('get_users_json')  }}",
                    dataType: "json",
                    context: this,
                    success: function(response) {
                        callback.call(this, response);
                        $('#growlel').puigrowl('clear');
                    },                
                    beforeSend: function( xhr ) {
                        addMessage([{severity: 'warn', summary: '', detail: '<i class="fa fa-spinner fa-spin MarRight10"></i> Cargando...'}]);                        
                    }
                });
            }
        });                  
    });
    
    addMessage = function(msg) {
        $('#growlel').puigrowl('show', msg);
    };
</script>

@endsection