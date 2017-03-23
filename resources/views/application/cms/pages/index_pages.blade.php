@extends('layouts.app')

@section('content')

<div class="ui-g">
    <div class="ui-g-12"> 
        <div class="card card-w-title">                                                                                                 
            <div class="ui-grid ui-grid-responsive">
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        @include('application.cms.pages.partial.menu_page')
                    </div>
                </div>
                
                <div class="EmptyBox10" ></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <div class="text-center titulo">
                            <p>
                                <i class="fa fa-th-list" ></i>
                                <h1 class="coolvetica-rg" >Páginas.</h1>
                            </p>                
                        </div>
                    </div>
                </div>

                <div class="EmptyBox10" ></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <div id="tblPages"></div> 
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

<input id="show_url" type="hidden" value="{{ route('show_page',['menu_id' => '']) }}" />
<input id="edit_url" type="hidden" value="{{ route('edit_page',['menu_id' => '']) }}" />

<script type="text/javascript">
    $(function() {                          
        
        $('#tblPages').puidatatable({                        
            columns: [
                {
                  content: function(rowData) {
                      var iconState = "";
                      if (rowData.state === "A") {
                          iconState = "<i class='fa fa-toggle-on' />";
                      } else if (rowData.state === "I") {
                          iconState = "<i class='fa fa-toggle-off' />";
                      }
                      
                      return iconState;
                  },
                    headerStyle: 'width:34px'
                },
                {
                  content: function(rowData) {                      
                      return rowData.name;
                  },
                  headerText: 'Página'
                },                
                {                     
                    content: function(rowData) {
                        return '<a href="' +$('#show_url').val() + '/' + rowData.page_id + '" class=""><i class="fa fa-search" /></a>';
                    },                                        
                    headerStyle: 'width:34px'
                },
                {                     
                    content: function(rowData) {
                        return '<a href="' +$('#edit_url').val() + '/' + rowData.page_id + '" class=""><i class="fa fa-pencil" /></a>';
                    },                                        
                    headerStyle: 'width:34px'
                }
            ],
            emptyMessage: 'No hay información.',
            datasource: function(callback) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('list_pages_json')  }}",
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