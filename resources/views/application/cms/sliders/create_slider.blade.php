@extends('layouts.app')

@section('content')

<div id="formAjax" class="ui-fluid">
    <div class="ui-g">
        <div class="ui-g-12"> 
            <div class="card card-w-title">                                                                                                 
                <div id="divCreateSlider" class="ui-grid ui-grid-responsive">

                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            @include('application.cms.sliders.partial.menu_slider')
                        </div>
                    </div>

                    <div class="EmptyBox10" ></div>

                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <div class="text-center titulo">
                                <p><i class="fa fa-plus" ></i></p>
                                <p><h1 class="coolvetica-rg" >Nuevo Slider.</h1></p>                
                            </div>
                        </div>
                    </div>

                    <form id="createSliderForm" name="createSliderForm" method="POST" action="{{ route('store_slider') }}" class="ajaxJsonForm form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="name" class="col-md-4 control-label">Nombre:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input id="name" name="name" type="text" autocomplete="off"  class="form-control" />
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="name_help_block" class="help-block">
                                    @if ($errors->has('name'))                                                    
                                        <strong>{{ $errors->first('name') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>                                                
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="animate_automatically" class="col-md-4 control-label">Animado Automáticamente:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input type="checkbox" id="animate_automatically" name="animate_automatically" />                                
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="animate_automatically_help_block" class="help-block">
                                    @if ($errors->has('animate_automatically'))                                                    
                                        <strong>{{ $errors->first('animate_automatically') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="transition_speed" class="col-md-4 control-label">Velocidad de Transición <small>(milisegundos)</small>:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input id="transition_speed" name="transition_speed" type="text" autocomplete="off"  class="form-control" />
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="transition_speed_help_block" class="help-block">
                                    @if ($errors->has('transition_speed'))                                                    
                                        <strong>{{ $errors->first('transition_speed') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="time_between_transition" class="col-md-4 control-label">Tiempo entre transición <small>(milisegundos)</small>:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input id="time_between_transition" name="time_between_transition" type="text" autocomplete="off"  class="form-control" />
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="time_between_transition_help_block" class="help-block">
                                    @if ($errors->has('time_between_transition'))                                                    
                                        <strong>{{ $errors->first('time_between_transition') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="show_pager" class="col-md-4 control-label">Mostrar Paginador:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input type="checkbox" id="show_pager" name="show_pager" />                                
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="show_pager_help_block" class="help-block">
                                    @if ($errors->has('show_pager'))                                                    
                                        <strong>{{ $errors->first('show_pager') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="show_navigation" class="col-md-4 control-label">Mostrar Navegación:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input type="checkbox" id="show_navigation" name="show_navigation" />                                
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="show_navigation_help_block" class="help-block">
                                    @if ($errors->has('show_navigation'))                                                    
                                        <strong>{{ $errors->first('show_navigation') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="random_slides_order" class="col-md-4 control-label">Orden de Slides Aleatorio:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input type="checkbox" id="random_slides_order" name="random_slides_order" />                                
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="random_slides_order_help_block" class="help-block">
                                    @if ($errors->has('random_slides_order'))                                                    
                                        <strong>{{ $errors->first('random_slides_order') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="pause_on_hover" class="col-md-4 control-label">Pausa sobre Slider:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input type="checkbox" id="pause_on_hover" name="pause_on_hover" />                                
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="pause_on_hover_help_block" class="help-block">
                                    @if ($errors->has('pause_on_hover'))                                                    
                                        <strong>{{ $errors->first('pause_on_hover') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="pause_hover_controls" class="col-md-4 control-label">Pausa sobre Controles:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input type="checkbox" id="pause_hover_controls" name="pause_hover_controls" />                                
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="pause_hover_controls_help_block" class="help-block">
                                    @if ($errors->has('pause_hover_controls'))                                                    
                                        <strong>{{ $errors->first('pause_hover_controls') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="prev_text" class="col-md-4 control-label">Texto Anterior:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input id="prev_text" name="prev_text" type="text" autocomplete="off"  class="form-control" />
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="prev_text_help_block" class="help-block">
                                    @if ($errors->has('prev_text'))                                                    
                                        <strong>{{ $errors->first('prev_text') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="next_text" class="col-md-4 control-label">Texto Siguiente:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input id="next_text" name="next_text" type="text" autocomplete="off"  class="form-control" />
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="next_text_help_block" class="help-block">
                                    @if ($errors->has('next_text'))                                                    
                                        <strong>{{ $errors->first('next_text') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="max_width" class="col-md-4 control-label">Ancho Máximo:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input id="max_width" name="max_width" type="text" autocomplete="off"  class="form-control" />
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="max_width_help_block" class="help-block">
                                    @if ($errors->has('max_width'))                                                    
                                        <strong>{{ $errors->first('max_width') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="state" class="col-md-4 control-label">Estado:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <select id="state" name="state" class="selectOneMenu">
                                    <option value="">Seleccionar</option>
                                    <option value="A">Activo</option>
                                    <option value="I">Inactivo</option> 
                                </select>                                
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="state_help_block" class="help-block">
                                    @if ($errors->has('state'))                                                    
                                        <strong>{{ $errors->first('state') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <fieldset>
                            <legend>Contenido</legend>
                            
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-12">
                                    <ul class="menubar">                                                                
                                        <li>
                                            <a data-icon="fa-upload" onclick="document.getElementById('dlg-add-media').show()"  >Subir Archivo</a>
                                            <p-dialog id="dlg-add-media" title="Subir Archivo" modal showeffect="fade" hideeffect="fade" renderdelay="10">
                                                <form id="frmAddMedia" >
                                                    <div class="ui-grid ui-grid-responsive">
                                                        <div class="ui-grid-row">
                                                            <div class="ui-grid-col-12">                                                                                                    
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="file" id="ipt-new-file" name="ipt_new_file" class="form-control" style="width: 100%;" />
                                                                <p><small>Tamaño máximo permitido: <span class="bolded">2Mb</span></small></p>                                                    
                                                            </div>
                                                        </div>                                            
                                                        <div class="EmptyBox10" ></div>
                                                        <div class="ui-grid-row">
                                                            <div class="ui-grid-col-12 text-center" id="prev-image"></div>                                                    
                                                        </div>                                             
                                                    </div>
                                                </form>
                                                <script type="x-facet-buttons">
                                                    <button type="button" is="p-button" icon="fa-check" onclick="addMedia()">Subir</button>                                        
                                                </script>                                    
                                            </p-dialog>
                                        </li>
                                        <li>
                                            <a id="selectFile" data-icon="fa-hand-pointer-o" >Seleccionar Archivo</a>                                            
                                        </li> 
                                    </ul>
                                </div>
                            </div>

                            <div class="EmptyBox10" ></div>
                            
                        </fieldset>
                        
                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row text-center">
                            <div class="ui-grid-col-12" >                                
                                <button type="submit" role="button" aria-disabled="false" is="p-button" icon="fa-floppy-o" class="width_auto" >
                                    Guardar
                                </button>
                            </div>
                        </div> 
                        
                    </form>
                </div>
                
                <div id="divSelectFile" class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <div class="text-center titulo">
                                <p><i class="fa fa-hand-pointer-o" ></i></p>
                                <p><h1 class="coolvetica-rg" >Seleccionar Archivo.</h1></p>                
                            </div>
                        </div>
                    </div>
                    
                    <div class="EmptyBox10"></div>
                    
                    <div id="div_files_tree" class="text-center"></div>
                    <form id="frmListMedia" >
                        <div class="ui-grid ui-grid-responsive">
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-12">                                                
                                    <input type="hidden" id="parent_dir" name="parent_dir" value="{{ $root_dir }}" style="width: 100%;"/>                                                
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(function() {
    
    $("#divSelectFile").hide();
    
    $("#selectFile").click(function(){        
        $("#divCreateSlider").hide("fade", 300);            
        $("#divSelectFile").show("fade", 400);            
        listMediaFiles();
    });
    
    //listMediaFiles();
    
    $("#ipt-new-file").on("change",function(e){        
        clearMessage();
        $("#prev-image").hide();        
        $("#prev-image").html("");        
        
        var files = e.target.files; // FileList object        
        //Obtenemos la imagen del campo "file". 
        for (var i = 0, f; f = files[i]; i++) {         
             //Solo admitimos imágenes.             
             if (!f.type.match('image.*')) {                 
                  addMessage([{severity: 'error', summary: '', detail: 'El archivo seleccionado no es una imagen.'}]);
                  $(this).val("");
                  continue;
             }

             var reader = new FileReader();

             reader.onload = (function(theFile) {
                 return function(e) {
                 // Creamos la imagen.
                 
                    var image  = new Image();
                    image.src = window.URL.createObjectURL(theFile);
                    
                    image.onload = function() {                        
                        $("#prev-image").append('<p><span class="bolded">Dimensiones:</span> ' + this.width + ' x '+ this.height + '</p>');
                    };
                    
                    var prevHtmlImage = '';                    
                    prevHtmlImage += ['<img class="thumb" style="width:128px; height:128px;" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                    prevHtmlImage += '<p><span class="bolded">Tamaño:</span> ' + (theFile.size/1024).toFixed(2) + ' Kb </p>'                    
                    
                    document.getElementById("prev-image").innerHTML = document.getElementById("prev-image").innerHTML + prevHtmlImage;   
                    $("#prev-image").show("fade", 500);
                    window.URL.revokeObjectURL(image.src);
                 };
             })(f);             
             reader.readAsDataURL(f);
         }
         
    });
        
});

listMediaFiles = function() {
    $.ajax({
        type: "GET",
        url: "{{ route('list_media_slider_json') }}",
        data: $("#frmListMedia").serialize(),
        dataType: "html",
        context: this,
        beforeSend: function() {
           addLoadingMessage();           
        },       
        success: function(response) {
            setHtmlContent("div_files_tree", response,500);            
            initUiComponents();            
            clearMessage();
            initCustomComponents();
        }
    }).fail(function(e){
        addMessage([{severity: 'error', summary: '', detail: 'Ha ocurrido un error. Por favor intente más tarde.'}]);
    });
};

initCustomComponents = function() {
    $(".directory").click(function(){
        $("#parent_dir").val($("#parent_dir").val() + $(this).attr("id") + "/");
        listMediaFiles();
    });
    
    $("#div_files_tree a").contextmenu(function(e) {
        //alert( "Handler for .contextmenu() called." );
        e.preventDefault();
      });
};

addMedia = function(){       
    if (document.getElementById("ipt-new-file").files.length>0) {  
        var form = $('form')[0]; // You need to use standart javascript object here
        var formData = new FormData(form);
        formData.append("parent_dir",$("#parent_dir").val());        
        
        $.ajax({
            url: "{{ route('add_media_file') }}",
            type: "POST",                                                  
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function() {
               addLoadingMessage();           
            },       
            success: function(response) {                
                
                if (response.codigoRespuesta === '1') {                    
                    document.getElementById('dlg-add-media').hide();
                    $("#ipt-new-file").val("");
                    $("#prev-image").hide();        
                    $("#prev-image").html("");  
                    listMediaFiles();
                    addMessage([{ severity: 'info', summary: '', detail: response.mensajeRespuesta }]);
                } else if (response.codigoRespuesta === '0') {
                    addMessage([{ severity: 'error', summary: '', detail: response.mensajeRespuesta }]);
                }
          
            }
        }).fail(function(e){
            addMessage([{severity: 'error', summary: '', detail: 'Ha ocurrido un error. Por favor intente más tarde.'}]);
        });
        
    } else {
        addMessage([{severity: 'error', summary: '', detail: 'Seleccione una imagen.'}]);
    }
    
};

selectFile = function(imagePath) {
    //agregar imagen
    setHtmlContent("div_files_tree", "");
    $("#divSelectFile").hide("fade", 300);            
    $("#divCreateSlider").show("fade", 400);
};

</script>

@endsection