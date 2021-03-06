
@extends('layouts.app')

@section('content')

<div id="formAjax">
    <form id="frmCatalogDetails" action="{{ route('store_catalog_details') }}" class="ajaxJsonForm form-horizontal" >
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

                            <div class="EmptyBox20" ></div>

                            <div class="ui-grid-row">
                                <div class="ui-grid-col-12">
                                    <fieldset>
                                        <legend>Nuevo Detalle</legend>
                                        <div class="EmptyBox10" ></div>
                                        <div class="ui-grid-row">
                                            <div class="ui-grid-col-1 text-center">
                                                <label for="iptDetailId" class="col-md-4 control-label">Código: </label>
                                            </div>
                                            <div class="ui-grid-col-3">
                                                <input type="text" id="iptDetailId" autocomplete="off" />
                                            </div>                                            
                                            <div class="ui-grid-col-1 text-center" style="padding-left: 5px;">
                                                <label for="iptDetailValue" class="col-md-4 control-label">Valor: </label>
                                            </div>
                                            <div class="ui-grid-col-6">
                                                <input type="text" id="iptDetailValue" autocomplete="off" />
                                            </div>
                                            <div class="ui-grid-col-1 text-center">                                                    
                                                <button type="button" id="btnAddDetail" role="button" aria-disabled="false" is="p-button" icon="fa-plus" class="width_auto ui-button-icon-only" >                                                
                                                </button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="EmptyBox10" ></div>

                            <fieldset>
                                <legend>Catálogo Detalles</legend>
                                <div class="EmptyBox10" ></div>
                                <div class="ui-grid-row text-center">
                                    <div class="ui-grid-col-1">
                                        <label style="text-decoration: underline;">Código</label>
                                    </div>
                                    <div class="ui-grid-col-10"> 
                                        <label style="text-decoration: underline;">Valor</label>
                                    </div>
                                    <div class="ui-grid-col-1">
                                        <label style="text-decoration: underline;">Activo</label>
                                    </div>
                                </div>
                                <div class="EmptyBox10" ></div>
                                <div id="div_details">
                                    @foreach ($catalog->catalog_details as $actdet)  
                                        <div id="div_{{ $actdet->catalog_detail_id }}">
                                            <div class="ui-grid-row">
                                                <div class="ui-grid-col-1 text-center">
                                                    <label>{{ $actdet->catalog_detail_id }}</label>
                                                </div>
                                                <div class="ui-grid-col-10">                                            
                                                    <input type="hidden" class="catalog_detail_id" name="catalog_details[{{ $actdet->catalog_detail_id }}][catalog_detail_id]" value="{{ $actdet->catalog_detail_id }}" />
                                                    <input type="text" name="catalog_details[{{ $actdet->catalog_detail_id }}][value]" value="{{ $actdet->value }}" autocomplete="off">
                                                </div>
                                                <div class="ui-grid-col-1 text-center">
                                                    <input type="checkbox" name="catalog_details[{{ $actdet->catalog_detail_id }}][state]" <?php echo $actdet->state == 'A'?'checked':''; ?> />                                                    
                                                </div>
                                            </div>
                                            <div class="EmptyBox10" ></div>
                                        </div>
                                    @endforeach
                                </div>
                            </fieldset>                        

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
    </form>
</div>


<script type="text/javascript">
    $(function() {        
        
        $('#btnAddDetail').click(function(){
            
            $(".ui-state-error").removeClass('ui-state-error');
            var iptDetailId = $('#iptDetailId').val();
            var iptDetailValue = $('#iptDetailValue').val();
            
            if (iptDetailId.trim().length == 0) {
                addMessage([{severity: 'error', summary: '', detail: 'El campo Código es obligatorio.'}]);
                $('#iptDetailId').addClass('ui-state-error');
            } else if(iptDetailValue.trim().length == 0) {
                addMessage([{severity: 'error', summary: '', detail: 'El campo Valor es obligatorio.'}]);
                $('#iptDetailValue').addClass('ui-state-error');
            } else {
                
                var codeAlreadyExists = false;
                
                $("#frmCatalogDetails .catalog_detail_id").each(function() {
                    if( iptDetailId == this.value ) {
                        codeAlreadyExists = true;
                    }
                });
                
                if (codeAlreadyExists) {
                    addMessage([{severity: 'error', summary: '', detail: 'El Código ingresado ya existe.'}]);
                    $('#iptDetailId').addClass('ui-state-error');
                } else {
                    var newDetailHtml = '';

                    newDetailHtml += '<div id="div_'+ iptDetailId +'">';
                    newDetailHtml += '  <div class="ui-grid-row">';
                    newDetailHtml += '      <div class="ui-grid-col-1 text-center">';
                    newDetailHtml += '          <label>'+ iptDetailId +'</label>';            
                    newDetailHtml += '      </div>';
                    newDetailHtml += '      <div class="ui-grid-col-10">';
                    newDetailHtml += '          <input type="hidden" class="catalog_detail_id" name="catalog_details['+ iptDetailId +'][catalog_detail_id]" value="'+iptDetailId+'" />';
                    newDetailHtml += '          <input type="text" name="catalog_details['+ iptDetailId +'][value]" value="'+iptDetailValue+'" />';
                    newDetailHtml += '      </div>';
                    newDetailHtml += '      <div class="ui-grid-col-1 text-center">';
                    newDetailHtml += '          <input type="checkbox" name="catalog_details['+ iptDetailId +'][state]" checked /> ';
                    newDetailHtml += '      </div>';
                    newDetailHtml += '  </div>';            
                    newDetailHtml += '  <div class="EmptyBox10" ></div>';
                    newDetailHtml += '</div>'; 

                    $('#div_details').append(newDetailHtml);
                    initUiComponents();
                    
                    $('#iptDetailId').val("");
                    $('#iptDetailValue').val("");
                    $('#iptDetailId').focus();
                    
                }                                
            }            
            
        });                
    });
    
</script>

@endsection