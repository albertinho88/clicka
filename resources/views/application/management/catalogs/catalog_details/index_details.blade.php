@extends('layouts.app')

@section('content')

<form id="frmCatalogDetails" action="{{ route('store_catalog_details') }}" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="catalog_id" name="catalog_id" value="{{ $catalog->catalog_id }}" />
    <div class="ui-fluid">
        <div class="ui-g" >
            <div class="ui-g-12"> 
                <div class="card card-w-title">                                                                                                 
                    <div class="ui-grid ui-grid-responsive">
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-12">
                                @include('application.management.catalogs.partial.menu_catalog')
                            </div>
                        </div>

                        <div class="EmptyBox10" ></div>

                        <div class="ui-grid-row">
                            <div class="ui-grid-col-12">
                                <div class="text-center titulo">
                                    <p><i class="fa fa-tasks" ></i></p>
                                    <p><h1 class="coolvetica-rg" >Gestionar Detalles Catálogo.</h1></p>                
                                </div>
                            </div>
                        </div>

                        <div class="EmptyBox10" ></div>

                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="catalog_id" class="col-md-4 control-label">Código:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                {{ $catalog->catalog_id }}
                            </div>                                                                                                                
                        </div>

                        <div class="EmptyBox10" ></div>

                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="name" class="col-md-4 control-label">Nombre:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                {{ $catalog->name }}
                            </div>                                                                                                                
                        </div>

                        <div class="EmptyBox10" ></div>

                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="detail" class="col-md-4 control-label">Detalles:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <div class="ui-grid ui-grid-responsive" >
                                        <fieldset>
                                            <legend>Nuevo Detalle</legend>
                                            <div class="EmptyBox10" ></div>
                                            <div class="ui-grid-row">
                                                <div class="ui-grid-col-1 text-center">
                                                    <label for="iptDetailId" class="col-md-4 control-label">Código: </label>
                                                </div>
                                                <div class="ui-grid-col-3">
                                                    <input type="text" id="iptDetailId"  />
                                                </div>                                            
                                                <div class="ui-grid-col-1 text-center" style="padding-left: 5px;">
                                                    <label for="iptDetailValue" class="col-md-4 control-label">Valor: </label>
                                                </div>
                                                <div class="ui-grid-col-5">
                                                    <input type="text" id="iptDetailValue" />
                                                </div>
                                                <div class="ui-grid-col-2 text-center">                                                    
                                                    <button type="button" id="btnAddDetail" role="button" aria-disabled="false" is="p-button" icon="fa-plus" class="width_auto" >
                                                        Agregar
                                                    </button>
                                                </div>
                                            </div>
                                        </fieldset>
                                        
                                        <div class="EmptyBox10" ></div>
                                    
                                        <div id="div_details">
                                            @foreach ($catalog->catalog_details_active as $actdet)                                    
                                                <div class="ui-grid-row">
                                                    <div class="ui-grid-col-2">
                                                        <input type="text" name="catalog_details[{{ $actdet->catalog_detail_id }}][catalog_detail_id]" value="{{ $actdet->catalog_detail_id }}" readonly="readonly" />                                                        
                                                    </div>
                                                    <div class="ui-grid-col-10">
                                                        <input type="text" name="catalog_details[{{ $actdet->catalog_detail_id }}][value]" value="{{ $actdet->value }}" >
                                                    </div>
                                                </div>                                    
                                            @endforeach
                                        </div>
                                        
                                        <div class="EmptyBox10"></div>

                                        <div class="ui-grid-row text-center">
                                            <div class="ui-grid-col-12" >                                
                                                <button type="submit" role="button" aria-disabled="false" is="p-button" icon="fa-floppy-o" class="width_auto" >
                                                    Guardar
                                                </button>
                                            </div>
                                        </div>                                         

                                </div>
                            </div>                                                                                                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form> 

<script type="text/javascript">
    $(function() {
        
        $('#btnAddDetail').click(function(){
            
            var newDetailHtml = '';
            
            newDetailHtml += '<div class="ui-grid-row">';
            newDetailHtml += '  <div class="ui-grid-col-2">';
            newDetailHtml += '      <input type="text" name="catalog_details['+ $('#iptDetailId').val() +'][catalog_detail_id]" value="'+$('#iptDetailId').val()+'" readonly="readonly" />';            
            newDetailHtml += '  </div>';
            newDetailHtml += '  <div class="ui-grid-col-10">';
            newDetailHtml += '      <input type="text" name="catalog_details['+ $('#iptDetailId').val() +'][value]" value="'+$('#iptDetailValue').val()+'" />';
            newDetailHtml += '  </div>';
            newDetailHtml += '</div>';            
            newDetailHtml += '<div class="EmptyBox10" ></div>';
            
            $('#div_details').append(newDetailHtml);
            initComponents();
        });
        
        $('#frmCatalogDetails').submit(function(e){ 
            alert($(this).serialize());
            
            $.ajax({
                url: $(this).attr('action'),
                method: "POST",
                data: $(this).serialize(),
                dataType: "html",            
                beforeSend: function( xhr ) {
                    addLoadingMessage();
                }
              })
              .fail(function (errorResponse){              
                    var errors = JSON.parse(errorResponse.responseText);                                                                        
                    if (errors) {                    
                        $.each(errors, function(index, value) {                            
                            $('#'+index).addClass('ui-state-error');
                            $('#'+index+'_help_block').html('<strong>' + value + '</strong>').animate( { height: 'show' });
                        });

                        addMessage([{ severity: 'error', summary: '', detail: "Revise la información ingresada y vuelva a intentarlo." }]);
                    } else {
                        addMessage([{severity: 'error', summary: '', detail: 'Ha ocurrido un error. Por favor intente más tarde.'}]);
                    }
              })
              .done(function(htmlResponse){         
                  //setHtmlContent('formAjax',htmlResponse);
                  alert(htmlResponse);
                  addMessage([{ severity: 'info', summary: '', detail: 'Información enviada y almacenada exitosamente.' }]);                                  
                  initComponents();
              })            
              .always(function() {
                  // always executed..                 
              });
            
            e.preventDefault();
        });
    });
</script>

@endsection