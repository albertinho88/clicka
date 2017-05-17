<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        
        <title>Clicka - Servicios TI</title>
                
        <link href="{{ asset('_resource/primeui-4.1.15/primeui.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('_resource/theme.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('_resource/fa/font-awesome.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('_resource/components.css') }}" type="text/css" rel="stylesheet">        
        
        <script src="{{ asset('_resource/jquery/jquery.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/core.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/components.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/jquery/jquery-plugins.js') }}" type="text/javascript"></script>        
        
        <link href="{{ asset('_resource/keyboard/keyboard.css') }}" type="text/css" rel="stylesheet">
        <script src="{{ asset('_resource/keyboard/keyboard.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/touch/touchswipe.js') }}" type="text/javascript"></script>                        
        
        <link href="{{ asset('_resource/css/nanoscroller.css') }}" type="text/css" rel="stylesheet">        
        <link href="{{ asset('_resource/css/animate.css') }}" type="text/css" rel="stylesheet">        
        <link href="{{ asset('_resource/css/layout-green.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('_resource/responsive_slide/responsiveslides.css') }}" type="text/css" rel="stylesheet">
        
        
        <link href="{{ asset('_resource/css/custom_styles.css') }}" type="text/css" rel="stylesheet">            
            
        <script src="{{ asset('_resource/js/nanoscroller.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/js/layout.js') }}" type="text/javascript"></script>    
        <script src="{{ asset('_resource/js/swipe.js') }}" type="text/javascript"></script>    
        <script src="{{ asset('_resource/responsive_slide/responsiveslides.min.js') }}" type="text/javascript"></script>
        
        <script src="{{ asset('_resource/primeui-4.1.15/x-tag-core.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/primeui-4.1.15/primeui.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/primeui-4.1.15/primeelements.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/js/custom.js') }}" type="text/javascript"></script>
    </head>
    <body class="main-body">
        <div id="div_files_tree" class="text-center"></div>

        <form id="frmListMedia" >                                                
            <input type="hidden" id="parent_dir" name="parent_dir" value="{{ $root_dir }}" />                                    
            <input type="hidden" name="_token" value="{{ csrf_token() }}">                                    
        </form>

        <script type="text/javascript">

        $(function() {

            listMediaFiles();

        });

        listMediaFiles = function() {
            $.ajax({
                type: "GET",
                url: "{{ route('list_media_page_json') }}",
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
        
        selectFile = function(imagePath, relativePath, infoFichero) {
            //alert('image path: ' + imagePath + ', relative path: ' + relativePath + ', info fichero: ' + infoFichero);
            var dialogArguments = top.tinymce.activeEditor.windowManager.getParams();
            console.log(dialogArguments);
            //dialogArguments.meta.src = imagePath;
            top.tinymce.activeEditor.windowManager.getParams().onselect(imagePath);
            top.tinymce.activeEditor.windowManager.close();
        };

        </script>
    </body>
</html>