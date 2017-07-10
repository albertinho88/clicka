<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if (!isset($service->service_id))

<div class="ui-grid-row">
    <div class="ui-grid-col-2">                                            
        <label for="service_id" class="col-md-4 control-label">Identificador:</label>
    </div>
    <div class="ui-grid-col-10">
        <input id="service_id" name="service_id" type="text" autocomplete="off"  class="form-control" />
    </div>                                                                                                                
</div>
<div class="ui-grid-row">
    <div class="ui-grid-col-2"></div>
    <div class="ui-grid-col-10">
        <span id="service_id_help_block" class="help-block">
            @if ($errors->has('page_id'))                                                    
                <strong>{{ $errors->first('service_id') }}</strong>                                                    
            @endif
        </span>
    </div>
</div>

@else

<div class="ui-grid-row">
    <div class="ui-grid-col-2">                                            
        <label for="service_id" class="col-md-4 control-label">Identificador:</label>
    </div>
    <div class="ui-grid-col-10">
        {{ $service->service_id }}
    </div>                                                                                                                
</div>

@endif

<div class="EmptyBox10"></div>

<div class="ui-grid-row">
    <div class="ui-grid-col-2">                                            
        <label for="name" class="col-md-4 control-label">Nombre:</label>
    </div>
    <div class="ui-grid-col-10">
        <input id="name" name="name" type="text" autocomplete="off" class="form-control" value="{{ $service->name }}" />
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
        <label for="slogan" class="col-md-4 control-label">Slogan:</label>
    </div>
    <div class="ui-grid-col-10">
        <input id="slogan" name="slogan" type="text" autocomplete="off" class="form-control" value="{{ $service->slogan }}" />
    </div>                                                                                                                
</div>
<div class="ui-grid-row">
    <div class="ui-grid-col-2"></div>
    <div class="ui-grid-col-10">
        <span id="slogan_help_block" class="help-block">
            @if ($errors->has('slogan'))                                                    
                <strong>{{ $errors->first('slogan') }}</strong>                                                    
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
            <option value="A" <?php echo $service->state=='A'?'selected':''; ?> >Activo</option>
            <option value="I" <?php echo $service->state=='I'?'selected':''; ?>>Inactivo</option> 
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
                        
<div class="ui-grid-row">
    <div class="ui-grid-col-2">                                            
        <label for="order" class="col-md-4 control-label">Orden:</label>
    </div>
    <div class="ui-grid-col-10">
        <input id="order" name="order" type="text" autocomplete="off" class="form-control" value="{{ $service->order }}" />
    </div>                                                                                                                
</div>
<div class="ui-grid-row">
    <div class="ui-grid-col-2"></div>
    <div class="ui-grid-col-10">
        <span id="order_help_block" class="help-block">
            @if ($errors->has('order'))                                                    
                <strong>{{ $errors->first('order') }}</strong>                                                    
            @endif
        </span>
    </div>
</div>

<div class="EmptyBox10"></div>

<div class="ui-grid-row">
    <div class="ui-grid-col-2">                                            
        <label for="featured" class="col-md-4 control-label">Destacado:</label>
    </div>
    <div class="ui-grid-col-10">
        <input type="checkbox" id="featured" name="featured" <?php echo $service->featured?'checked':''; ?> />                                
    </div>                                                                                                                
</div>
<div class="ui-grid-row">
    <div class="ui-grid-col-2"></div>
    <div class="ui-grid-col-10">
        <span id="featured_help_block" class="help-block">
            @if ($errors->has('featured'))                                                    
                <strong>{{ $errors->first('featured') }}</strong>                                                    
            @endif
        </span>
    </div>
</div>

<div class="EmptyBox20"></div>                                                

<fieldset>
    <legend>Sitio Web</legend>

    <div class="ui-grid-row">
        <div class="ui-grid-col-2">                                            
            <label for="icon" class="col-md-4 control-label">Icono:</label>
        </div>
        <div class="ui-grid-col-10">
            <input id="icon" name="icon" type="text" autocomplete="off" class="form-control" value="{{ $service->icon }}" />
        </div>                                                                                                                
    </div>
    <div class="ui-grid-row">
        <div class="ui-grid-col-2"></div>
        <div class="ui-grid-col-10">
            <span id="icon_help_block" class="help-block">
                @if ($errors->has('icon'))                                                    
                    <strong>{{ $errors->first('icon') }}</strong>                                                    
                @endif
            </span>
        </div>
    </div> 

    <div class="EmptyBox10"></div>

    <div class="ui-grid-row">
        <div class="ui-grid-col-2">                                            
            <label for="website_bg_color" class="col-md-4 control-label">Color Fondo:</label>
        </div>
        <div class="ui-grid-col-10">   
            <input id="website_bg_color" name="website_bg_color" type="text" autocomplete="off" class="form-control" value="{{ $service->website_bg_color }}"/>                                
        </div>                                                                                                                
    </div>
    <div class="ui-grid-row">
        <div class="ui-grid-col-2"></div>
        <div class="ui-grid-col-10">
            <span id="website_bg_color_help_block" class="help-block">
                @if ($errors->has('website_bg_color'))                                                    
                    <strong>{{ $errors->first('website_bg_color') }}</strong>                                                    
                @endif
            </span>
        </div>
    </div> 

    <div class="EmptyBox10"></div>

    <div class="ui-grid-row">
        <div class="ui-grid-col-2">                                            
            <label for="website_html_content" class="col-md-4 control-label">Contenido:</label>
        </div>
        <div class="ui-grid-col-10">                                                                                                
            <textarea id="website_html_content" name="website_html_content" class="form-control" >
                {{ $service->website_html_content }}
            </textarea>
            <script type="text/javascript">
                tinymce.init({
                        selector:'#website_html_content',
                        cleanup_on_startup: false,
                        trim_span_elements: false,
                        verify_html: false,
                        cleanup: false,
                        convert_urls: false,                        
                        height: 200,
                        plugins: [
                                "advlist autolink lists link image charmap preview anchor",
                                "searchreplace visualblocks code fullscreen",
                                "insertdatetime table contextmenu paste image imagetools emoticons"
                        ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image emoticons",
                        setup: function (editor) {
                                editor.on('change', function () {
                                        editor.save();
                                });
                        },
                        init_instance_callback : function(editor) {                                
                            editor.save();
                        },
                        file_picker_types: 'image',
                        file_picker_callback: function(callback, value, meta) {
                            //alert("CB: " + cb + ", VALUE: " + value + ",META: " + meta); // debug/testing
                            // Opens a HTML page inside a TinyMCE dialog
                            tinymce.activeEditor.windowManager.open({
                              title: 'Imágenes',
                              url: "{{ route('view_image_selector')  }}",
                              width: 700,
                              height: 600
                            }, {                                                                
                                onselect: function(url)
                                {
                                    //win.document.getElementById(field_name).value = url;
                                    callback(url);
                                }
                            });                            

                        }
                });                                                        
            </script>
        </div>                                                                                                                
    </div>
    <div class="ui-grid-row">
        <div class="ui-grid-col-2"></div>
        <div class="ui-grid-col-10">
            <span id="website_html_content_help_block" class="help-block">
                @if ($errors->has('website_html_content'))                                                    
                    <strong>{{ $errors->first('website_html_content') }}</strong>                                                    
                @endif
            </span>
        </div>
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