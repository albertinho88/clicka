@extends('layouts.app')

@section('content')

<div class="ui-g">
    <div class="ui-g-12"> 
        <div class="card card-w-title">                                                                                                 
            <div class="ui-grid ui-grid-responsive">                                               
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <div class="text-center titulo">
                            <p>
                                <i class="fa fa-th-list" ></i>
                                <h1 class="coolvetica-rg" >Archivos Multimedia.</h1>
                            </p>                
                        </div>
                    </div>
                </div>

                <div class="EmptyBox10" ></div>    
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <ul class="menubar">                                                                
                            <li>
                                <a data-icon="fa-plus" onclick="document.getElementById('dlg-add-media').show()"  >Subir Archivo</a>
                                <p-dialog id="dlg-add-media" title="Subir Archivo" modal showeffect="fade" hideeffect="fade" renderdelay="10">
                                    <form id="frmAddMedia" >
                                        <div class="ui-grid ui-grid-responsive">
                                            <div class="ui-grid-row">
                                                <div class="ui-grid-col-12">                                                                                                    
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="file" id="ipt-new-file" name="ipt_new_file" class="form-control" style="width: 100%;" />                                                    
                                                </div>
                                            </div>
                                            <div class="EmptyBox10" ></div>
                                            <div class="ui-grid-row">
                                                <div class="ui-grid-col-12 text-center" id="prev-image"></div>                                                    
                                            </div> 
                                            <div class="EmptyBox10" ></div>
                                            <div class="ui-grid-row">
                                                <div class="ui-grid-col-12 text-center">
                                                    <input type="submit" value="subir" />
                                                </div>                                                    
                                            </div> 
                                        </div>
                                    </form>
                                    <script type="x-facet-buttons">
                                        <button type="button" is="p-button" icon="fa-check" onclick="addMedia()">Subir</button>                                        
                                    </script>                                    
                                </p-dialog>
                            </li>
                            <li>
                                <a data-icon="fa-plus" onclick="document.getElementById('dlgelement').show()">Crear Carpeta</a>
                                <p-dialog id="dlgelement" title="Crear carpeta" modal showeffect="fade" hideeffect="fade" renderdelay="10">
                                    <form id="frmListMedia" >
                                        <div class="ui-grid ui-grid-responsive">
                                            <div class="ui-grid-row">
                                                <div class="ui-grid-col-12">                                                
                                                    <input type="hidden" id="parent_dir" name="parent_dir" value="{{ $root_dir }}" style="width: 100%;"/>                                                
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input id="iptNewDirectory" name="new_dir" type="text" style="width: 95%;" autocomplete="off"/>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <script type="x-facet-buttons">
                                        <button type="button" is="p-button" icon="fa-check" onclick="createDirectory()">Crear</button>                                        
                                    </script>                                    
                                </p-dialog>
                            </li> 
                        </ul>
                    </div>
                </div>
                
                <div class="EmptyBox10" ></div>
                
                
                <div id="div_files_tree" class="text-center"></div>
            </div>            
        </div>
    </div>
</div>

<script type="text/javascript">
$(function() {
    listMediaFiles();
    
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
        url: "{{ route('list_media_files_json') }}",
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

createDirectory = function() {
    var nameNewDirectory = $("#iptNewDirectory").val();
    if (nameNewDirectory.trim().length>0) {
        $.ajax({
            type: "POST",
            url: "{{ route('create_directory') }}",
            data: $("#frmListMedia").serialize(),
            dataType: "json",
            context: this,
            beforeSend: function() {
               addLoadingMessage();           
            },       
            success: function(response) {                
                if (response.codigoRespuesta == '1') {
                    addMessage([{ severity: 'info', summary: '', detail: response.mensajeRespuesta }]);
                    document.getElementById('dlgelement').hide();
                    $("#iptNewDirectory").val("");                        
                    $("#div_files_tree").append('<a class="directory" id="'+nameNewDirectory+'" >'
                                    + '<div class="ui-g-6 ui-md-4 ui-lg-2" >'
                                    + '<img style="width: 100px; height: 100px;" src="<?php echo asset('_resource/thumbs/folder-128.png') ?>" />'
                                    + '<p><span class="text-center bolded">'+nameNewDirectory+'</span></p>'
                                    + '</div>'
                                    + '</a>')
                    initUiComponents();                            
                    initCustomComponents();

                } else if (response.codigoRespuesta == '0') {
                    addMessage([{ severity: 'error', summary: '', detail: response.mensajeRespuesta }]);
                }
            }
        }).fail(function(e){
            addMessage([{severity: 'error', summary: '', detail: 'Ha ocurrido un error. Por favor intente más tarde.'}]);
        });
    } else {
        addMessage([{severity: 'error', summary: '', detail: 'Ingrese un nombre para la nueva carpeta.'}]);
        $('#iptNewDirectory').addClass('ui-state-error');
    }
};

addMedia = function(){   
    //console.log(document.getElementById("ipt-new-file").files);
    if (document.getElementById("ipt-new-file").files.length>0) {  
        var form = $('form')[0]; // You need to use standart javascript object here
        var formData = new FormData(form);
        
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
                console.log(response);
                /*setHtmlContent("div_files_tree", response,500);            
                initUiComponents();            
                clearMessage();
                initCustomComponents();*/            
            }
        }).fail(function(e){
            addMessage([{severity: 'error', summary: '', detail: 'Ha ocurrido un error. Por favor intente más tarde.'}]);
        });
        
    } else {
        addMessage([{severity: 'error', summary: '', detail: 'Seleccione una imagen.'}]);
    }
    
};

</script>

@endsection