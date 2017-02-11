<div class="ui-grid-row">
    <div class="ui-grid-col-12">
        <ul class="menubar">                                
            <li>
                <a href="{{ route('list_users') }}" data-icon="fa-users" class="ajaxLink">Usuarios</a>
            </li>
            <li>
                <a href="{{ route('create_user') }}" data-icon="fa-plus" class="ajaxLink">Nuevo Usuario</a>
            </li>
        </ul>
    </div>
</div> 


<div id="tblUsers"></div>                           

<input id="show_url" type="hidden" value="{{ route('show_user',['user_id' => '']) }}" />
<input id="edit_url" type="hidden" value="{{ route('edit_user',['user_id' => '']) }}" />

<script type="text/javascript">
    $(function() {                          
        
        $('#tblUsers').puidatatable({            
            paginator: {
                rows: 10
            },
            columns: [                
                {field: 'user_id', headerText: 'Id'},
                {field: 'name', headerText: 'Nombre'},
                {field: 'state', headerText: 'Estado'},
                {                     
                    content: function(rowData) {
                        return '<a href="' +$('#show_url').val() + '/' + rowData.user_id + '" class="ajaxLink"><i class="fa fa-search" /></a>';
                    },                    
                    bodyStyle: 'width:18px',
                    headerStyle: 'width:18px'
                },
                {                     
                    content: function(rowData) {
                        return '<a href="' +$('#edit_url').val() + '/' + rowData.user_id + '" class="ajaxLink"><i class="fa fa-pencil" /></a>';
                    },                    
                    bodyStyle: 'width:18px',
                    headerStyle: 'width:18px'
                }
            ],
            emptyMessage: 'No hay información.',
            datasource: function(callback) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('list_users_json')  }}",
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
