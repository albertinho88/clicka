<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="ui-grid-row">
    <div class="ui-grid-col-8"> 

        <fieldset>
            <legend>Propiedades</legend>

            <div class="EmptyBox10"></div>

            <div class="ui-grid-row">
                <div class="ui-grid-col-2">                                            
                    <label for="name" class="col-md-4 control-label">Nombre:</label>
                </div>
                <div class="ui-grid-col-10">
                    <input id="name" name="name" type="text" autocomplete="off"  class="form-control" value="{{ $slider->name }}" />
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
                    <input type="checkbox" id="animate_automatically" name="animate_automatically" <?php echo $slider->animate_automatically?'checked':''; ?> />                                
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
                    <input id="transition_speed" name="transition_speed" type="text" autocomplete="off"  class="form-control" value="{{ $slider->transition_speed }}" />
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
                    <input id="time_between_transition" name="time_between_transition" type="text" autocomplete="off"  class="form-control" value="{{ $slider->time_between_transition }}" />
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
                    <input type="checkbox" id="show_pager" name="show_pager" <?php echo $slider->show_pager?'checked':''; ?> />                                
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
                    <input type="checkbox" id="show_navigation" name="show_navigation" <?php echo $slider->show_navigation?'checked':''; ?> />                                
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
                    <input type="checkbox" id="random_slides_order" name="random_slides_order" <?php echo $slider->random_slides_order?'checked':''; ?> />                                
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
                    <input type="checkbox" id="pause_on_hover" name="pause_on_hover" <?php echo $slider->pause_on_hover?'checked':''; ?> />                                
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
                    <input type="checkbox" id="pause_hover_controls" name="pause_hover_controls" <?php echo $slider->pause_hover_controls?'checked':''; ?> />                                
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
                    <input id="prev_text" name="prev_text" type="text" autocomplete="off"  class="form-control" value="{{ $slider->prev_text }}" />
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
                    <input id="next_text" name="next_text" type="text" autocomplete="off"  class="form-control" value="{{ $slider->next_text }}" />
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
                    <input id="max_width" name="max_width" type="text" autocomplete="off"  class="form-control" value="{{ $slider->max_width }}" />
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
                        <option value="A" <?php echo $slider->state=='A'?'selected':''; ?>>Activo</option>
                        <option value="I" <?php echo $slider->state=='I'?'selected':''; ?>>Inactivo</option> 
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
        </fieldset>
    </div>

    <div class="ui-grid-col-4">

        <fieldset>
            <legend>Imágenes</legend>

            <div class="ui-grid-row">
                <div class="ui-grid-col-12">
                    <ul class="menubar">                                                                                                        
                        <li>
                            <a id="selectFile" data-icon="fa-hand-pointer-o" >Seleccionar</a>                                            
                        </li> 
                    </ul>
                </div>
            </div>

            <div class="EmptyBox10" ></div>

            <div id="divSliderContent" class="">
                <ul id="ulSliderContent" >
                    @foreach($slider->ordered_slider_images as $slide)
                        <li class="ui-state-default" id="li_sli_<?php echo $slide->slider_image_id; ?>">
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-12" >
                                        <button id="delete_slide_<?php echo $slide->slider_image_id; ?>" 
                                                        class="delete_slide" type="button" role="button" 
                                                        aria-disabled="false" is="p-button" icon="fa-trash-o" 
                                                        style="height: 30px; width: 30px; float: right;" 
                                                        parent_li="li_sli_<?php echo $slide->slider_image_id; ?>" >
                                        </button>                
                                </div>
                            </div>
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-4" >
                                    <input type="hidden" name="slider_images[<?php echo $slide->slider_image_id; ?>][slider_image_id]" value="{{ $slide->slider_image_id }}"  />
                                    <input type="hidden" name="slider_images[<?php echo $slide->slider_image_id; ?>][path]" value=""  />
                                    <input type="hidden" name="slider_images[<?php echo $slide->slider_image_id; ?>][order]" value="{{ $slide->order }}" class="slide_order" />
                                    <img src="{{ asset($slide->image_path) }}" style="width: 120px; height: 120px;" />
                                </div>
                                <div class="ui-grid-col-8" >
                                    <p>
                                        {{ $slide->getFileName() }}<br />
                                        <small>{{ $slide->getFileSize() }}</small><br />
                                        <small>{{ $slide->getImageSize() }}</small>
                                    </p>
                                    <p>
                                        <label>Caption: </label>
                                        <textarea id="txtarea_<?php echo $slide->slider_image_id; ?>" name="slider_images[<?php echo $slide->slider_image_id ?>][caption]" >{{ $slide->caption }}</textarea>
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </fieldset>
    </div>    

</div>

<div class="EmptyBox10"></div>

<div class="ui-grid-row text-center">
    <div class="ui-grid-col-12" >                                
        <button type="submit" role="button" aria-disabled="false" is="p-button" icon="fa-floppy-o" class="width_auto" >
            Guardar
        </button>
    </div>
</div>

<script type="text/javascript">
$(function() {
    
    var newSliderCount = 1;
    
    $("#divSelectFile").hide();
    
    $("#selectFile").click(function(){        
        $("#divCreateEditSlider").hide("fade", 300);            
        $("#divSelectFile").show("fade", 400);            
        listMediaFiles();
    });
    
    $( "#ulSliderContent" ).sortable({
        update: function( event, ui ) {                
            var cont = 0;
            $("input.slide_order").each(function(index){
                $(this).val(cont);
                cont++;
            });                                        
        }
    });
    $( "#ulSliderContent" ).disableSelection();
    
    $(".delete_slide").click(function(e){                                                                                
        deleteSlide($(this).attr('parent_li'), e);
    });
    
    selectFile = function(imagePath, relativePath, infoFichero) {
        //agregar imagen
        
        var li_count = $("#ulSliderContent li").length;
        var new_li = '';

        new_li = '<li class="ui-state-default" id="li_nsli_' + newSliderCount + '">'
                + '<div class="ui-grid-row">'
                + '<div class="ui-grid-col-12" >'
                + '<button id="delete_slide_' + newSliderCount + '" class="delete_slide" type="button" role="button" aria-disabled="false" is="p-button" icon="fa-trash-o" style="height: 30px; width: 30px; float: right;" parent_li="li_nsli_' + newSliderCount + '" ></button>'                
                + '</div></div>'
                + '<div class="ui-grid-row">'
                + '<div class="ui-grid-col-4" >'
                + '<input type="hidden" name="slider_images[new_slide_'+ newSliderCount +'][slider_image_id]" value=""  />'
                + '<input type="hidden" name="slider_images[new_slide_'+ newSliderCount +'][path]" value="' + relativePath + '"  />'
                + '<input type="hidden" name="slider_images[new_slide_'+ newSliderCount +'][order]" value="' + li_count + '" class="slide_order" />'
                + '<img src="'+ imagePath +'" style="width: 120px; height: 120px;" />' 
                + '</div>'
                + '<div class="ui-grid-col-8" >'
                + infoFichero
                + '<p><label>Caption: </label><textarea id="txtarea_'+ newSliderCount +'" name="slider_images[new_slide_'+ newSliderCount +'][caption]" ></textarea></p>'
                + '</div>'
                + '</div>'                
                +'</li>'; 

        $("#divSliderContent ul").append(new_li);  
        setHtmlContent("div_files_tree", "");
        $("#txtarea_" + newSliderCount).puiinputtextarea();
        $("#txtarea_" + newSliderCount).addClass("ui-inputfield ui-inputtextarea");
        $("#divSelectFile").hide("fade", 300);            
        $("#divCreateEditSlider").show("fade", 400);
        
        $("#delete_slide_" + newSliderCount).click(function(e){                                                                                
            deleteSlide($(this).attr('parent_li'), e);
        });
        
        newSliderCount++;
    };
        
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
    
    $(".back_directory").click(function(){
        $("#parent_dir").val($(this).attr("id") + "/");        
        listMediaFiles();                
    });
    
    $("#div_files_tree a").contextmenu(function(e) {        
        e.preventDefault();
    });
};

deleteSlide = function(slide_id, e) {
    $("#" + slide_id).fadeOut("normal", function() {
        $(this).remove();
    });
    e.preventDefault();
};



</script>