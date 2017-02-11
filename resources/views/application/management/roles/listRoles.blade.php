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
                                    <a href="{{ route('list_roles') }}" data-icon="fa-users">Roles</a>
                                </li>
                                <li>
                                    <a href="{{ route('create_role') }}" data-icon="fa-plus">Nuevo Rol</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <div class="text-center titulo">
                                <p>
                                    <i class="fa fa-users" ></i>
                                    <h1 class="coolvetica-rg" >Roles.</h1>
                                </p>                
                            </div>
                        </div>
                    </div>
                    
                    <div class="EmptyBox10"></div>
                    
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <div id="tblRoles"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<script type="text/javascript">
    $(function() {                          
        
        $('#tblRoles').puidatatable({
            caption: 'Listado',            
            columns: [
                {field: 'role_id', headerText: 'Id'},
                {field: 'name', headerText: 'Nombre'},
                {field: 'state', headerText: 'Estado'}
            ],
            emptyMessage: 'No hay información.',
            selectionMode: 'single',
            rowSelect: function(event, data) {
                if (data.role_id) {
                    alert(data.role_id);
                }
            },
            datasource: function(callback) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('get_roles_json')  }}",
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