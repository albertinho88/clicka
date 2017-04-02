@extends('layouts.app')

@section('content')

<div id="formAjax" class="ui-fluid">
    <div class="ui-g">
        <div class="ui-g-12"> 
            <div class="card card-w-title">                                                                                                 
                <div id="divEditPage" class="ui-grid ui-grid-responsive">

                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            @include('application.cms.pages.partial.menu_page')
                        </div>
                    </div>

                    <div class="EmptyBox10" ></div>

                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <div class="text-center titulo">
                                <p><i class="fa fa-plus" ></i></p>
                                <p><h1 class="coolvetica-rg" >Editar Página.</h1></p>                
                            </div>
                        </div>
                    </div>

                    <form id="editPageForm" name="editPageForm" method="POST" action="{{ route('update_page') }}" class="ajaxJsonForm form-horizontal">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            
                                   
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="page_id" class="col-md-4 control-label">Identificador:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    {{ $page->page_id }}
                                    <input type="hidden" name="page_id" value="{{ $page->page_id }}" />
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
                                        <option value="A" <?php echo $page->state=='A'?'selected':''; ?> >Activo</option>
                                        <option value="I" <?php echo $page->state=='I'?'selected':''; ?>>Inactivo</option> 
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
                                    <label for="page_parent_id" class="col-md-4 control-label">Página Padre:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    <select id="page_parent_id" name="page_parent_id" class="selectOneMenu" >
                                        <option value="0">> Raíz</option>
                                        <?php echo $pages_list ?>
                                    </select>                                
                                </div>                                                                                                                
                            </div>
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2"></div>
                                <div class="ui-grid-col-10">
                                    <span id="page_parent_id_help_block" class="help-block">
                                        @if ($errors->has('page_parent_id'))                                                    
                                            <strong>{{ $errors->first('page_parent_id') }}</strong>                                                    
                                        @endif
                                    </span>
                                </div>
                            </div>
                            
                            <div class="EmptyBox10"></div>

                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="is_menu_item" class="col-md-4 control-label">Es menú item?</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    <input type="checkbox" id="is_menu_item" name="is_menu_item" <?php echo $page->is_menu_item?'checked':''; ?> />                                
                                </div>                                                                                                                
                            </div>
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2"></div>
                                <div class="ui-grid-col-10">
                                    <span id="is_menu_item_help_block" class="help-block">
                                        @if ($errors->has('is_menu_item'))                                                    
                                            <strong>{{ $errors->first('is_menu_item') }}</strong>                                                    
                                        @endif
                                    </span>
                                </div>
                            </div>
                            
                            <div class="EmptyBox10"></div>
                            
                            <fieldset id="fldsMenu">
                                <legend>Propiedades Menú</legend>
                                
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-2">                                            
                                        <label for="name" class="col-md-4 control-label">Nombre:</label>
                                    </div>
                                    <div class="ui-grid-col-10">                                        
                                        <input id="name" name="name" type="text" autocomplete="off" class="form-control" value="{{ $page->name }}" />
                                    </div>                                                                                                                
                                </div>
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-2"></div>
                                    <div class="ui-grid-col-10">
                                        <span id="name_item_help_block" class="help-block">
                                            @if ($errors->has('name'))                                                    
                                                <strong>{{ $errors->first('name') }}</strong>                                                    
                                            @endif
                                        </span>
                                    </div>
                                </div>                                                                                                                           

                                <div class="EmptyBox10"></div>

                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-2">                                            
                                        <label for="icon" class="col-md-4 control-label">Icono:</label>
                                    </div>
                                    <div class="ui-grid-col-10">
                                        <input id="icon" name="icon" type="text" autocomplete="off" class="form-control" value="{{ $page->icon }}" />
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
                                        <label for="menu_class" class="col-md-4 control-label">Clases html:</label>
                                    </div>
                                    <div class="ui-grid-col-10">
                                        <input id="html_class" name="menu_class" type="text" autocomplete="off" value="{{ $page->menu_class }}" class="form-control" />
                                    </div>                                                                                                                
                                </div>
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-2"></div>
                                    <div class="ui-grid-col-10">
                                        <span id="menu_class_help_block" class="help-block">
                                            @if ($errors->has('menu_class'))                                                    
                                                <strong>{{ $errors->first('menu_class') }}</strong>                                                    
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
                                        <input id="order" name="order" type="text" autocomplete="off" value="{{ $page->order }}" class="form-control" />
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
                            
                            </fieldset>                            

                            <div class="EmptyBox10"></div>
                            
                            <fieldset>
                                <legend>Contenido</legend>
                                
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-2">                                            
                                        <label for="container_class" class="col-md-4 control-label">Clase Contenedor:</label>
                                    </div>
                                    <div class="ui-grid-col-10">
                                        <input id="container_class" name="container_class" type="text" autocomplete="off"  class="form-control" value="{{ $page->container_class }}" />
                                    </div>                                                                                                                
                                </div>
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-2"></div>
                                    <div class="ui-grid-col-10">
                                        <span id="container_class_help_block" class="help-block">
                                            @if ($errors->has('container_class'))                                                    
                                                <strong>{{ $errors->first('container_class') }}</strong>                                                    
                                            @endif
                                        </span>
                                    </div>
                                </div>                                                                
                                        
                                <div class="EmptyBox10"></div>
                                
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-2">                                            
                                        <label for="title" class="col-md-4 control-label">Título:</label>
                                    </div>
                                    <div class="ui-grid-col-10">
                                        <input id="title" name="title" type="text" autocomplete="off"  class="form-control" value="{{ $page->title }}" />
                                    </div>                                                                                                                
                                </div>
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-2"></div>
                                    <div class="ui-grid-col-10">
                                        <span id="title_help_block" class="help-block">
                                            @if ($errors->has('title'))                                                    
                                                <strong>{{ $errors->first('title') }}</strong>                                                    
                                            @endif
                                        </span>
                                    </div>
                                </div>                                                                
                                        
                                <div class="EmptyBox10"></div>
                                
                                <div id="divPageContent" class="{{ $page->container_class }}">
                                    <ul id="ulPageContent" >
                                        @foreach($page_content as $pcontent)                                        
                                            <li class="ui-state-default" id="li_sec_{{ $pcontent->page_content_id }}">  
                                                
                                                <div class="ui-grid-row">
                                                    <div class="ui-grid-col-12" style="text-align: right;">
                                                        <button class="delete_htmlcontent" role="button" aria-disabled="false" is="p-button" icon="fa-trash-o" style="height: 30px; width: 30px;" parent_li="li_sec_{{ $pcontent->page_content_id }}" ></button>
                                                        <button class="edit_htmlcontent" role="button" aria-disabled="false" is="p-button" icon="fa-pencil" style="height: 30px; width: 30px;" parent_li="li_sec_{{ $pcontent->page_content_id }}" ></button>
                                                    </div>
                                                </div>
                                                    
                                                <div class="ui-grid-row">
                                                    <div class="ui-grid-col-12">                                                        
                                                        <input type="hidden" name="page_content[{{ $pcontent->page_content_id }}][page_content_id]" value="{{ $pcontent->page_content_id }}" />
                                                        <input type="hidden" name="page_content[{{ $pcontent->page_content_id }}][order]" value="{{ $pcontent->order }}" class="page_content_order" />
                                                        @if ($pcontent->content->cat_det_id_type == 'HTMLSEC')                                                    
                                                            <input type="hidden" name="page_content[{{ $pcontent->page_content_id }}][content_type]" value="HTMLSEC" />
                                                            <input type="hidden" id="li_sec_{{ $pcontent->page_content_id }}_htmlcontent" 
                                                                    name="page_content[{{ $pcontent->page_content_id }}][html_content]" 
                                                                    value="<?php echo htmlentities($pcontent->content->htmlsection->html_content); ?>" />                                                            
                                                            <div id="li_sec_{{ $pcontent->page_content_id }}_htmlcontent_div" >
                                                                <?php echo $pcontent->content->htmlsection->html_content; ?>
                                                            </div>
                                                        @elseif ($pcontent->content->cat_det_id_type == 'SLIDER')
                                                            <input type="hidden" name="page_content[{{ $pcontent->page_content_id }}][content_type]" value="SLIDER" />
                                                            Slider
                                                        @elseif ($pcontent->content->cat_det_id_type == 'FORM')
                                                            <input type="hidden" name="page_content[{{ $pcontent->page_content_id }}][content_type]" value="FORM" />
                                                            Formulario
                                                        @endif 
                                                    </div>
                                                </div>
                                            </li>                                        
                                        @endforeach
                                    </ul>
                                </div>
                                                                
                                <div class="EmptyBox10"></div>
                                
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-12">
                                        <ul class="menubar">                                                                        
                                            <li>
                                                <a id="addHtmlSection" data-icon="fa-code" >Agregar Sección Html</a>                                                                                          
                                            </li>
                                            <li>
                                                <a id="addSlider" data-icon="fa-picture-o" class="">Agregar Slider</a>
                                            </li>
                                            <li>
                                                <a id="addForm" data-icon="fa-file-text" class="">Agregar Formulario</a>
                                            </li>                                        
                                        </ul>
                                    </div>
                                </div>
                                
                            </fieldset>                                                                                  

                            <div class="EmptyBox20"></div>


                            <div class="ui-grid-row text-center">
                                <div class="ui-grid-col-12" >                                
                                    <button type="submit" role="button" aria-disabled="false" is="p-button" icon="fa-floppy-o" class="width_auto" >
                                        Guardar
                                    </button>
                                </div>
                            </div> 

                        </form>                                           
                </div>
                
                <div id="divEditHtmlSection" class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <div class="text-center titulo">
                                <p><i class="fa fa-code" ></i></p>
                                <p><h1 class="coolvetica-rg" >Sección Html.</h1></p>                
                            </div>
                        </div>
                    </div>
                    
                    <div class="EmptyBox10"></div>
                    
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <textarea id="newHtmlSection" ></textarea>
                            <input id="iptHtmlContentId" type="hidden"/>
                            <script type="text/javascript">
                                tinymce.init({ 
                                        cleanup_on_startup: false,
                                        trim_span_elements: false,
                                        verify_html: false,
                                        cleanup: false,
                                        convert_urls: false,
                                        selector:'#newHtmlSection',
                                        height: 200,
                                        plugins: [
                                                "advlist autolink lists link image charmap print preview anchor",
                                                "searchreplace visualblocks code fullscreen",
                                                "insertdatetime media table contextmenu paste imagetools"
                                        ],
                                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                                        setup: function (editor) {
                                                editor.on('change', function () {
                                                        editor.save();
                                                });
                                        },
                                        init_instance_callback : function(editor) {
                                                console.log("Editor: " + editor.id + " is now initialized.");
                                                editor.save();
                                          }
                                });                                                        
                            </script>
                        </div>
                    </div>
                    
                    <div class="EmptyBox10"></div>
                    
                    <div class="ui-grid-row text-center">
                        <div class="ui-grid-col-12" >                                
                            <button id="add-new-section" role="button" aria-disabled="false" is="p-button" icon="fa-plus" class="width_auto" >
                                Agregar
                            </button>
                            <button id="edit-section" role="button" aria-disabled="false" is="p-button" icon="fa-pencil" class="width_auto" >
                                Editar
                            </button>
                            <button id="cancel-new-section" role="button" aria-disabled="false" is="p-button" icon="fa-ban" class="width_auto" >
                                Cancelar
                            </button>
                        </div>
                    </div> 
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function(){
        
        var newHtmlSectionCount = 1;
        $("#divEditHtmlSection").hide();
        
        $( "#ulPageContent" ).sortable({
            update: function( event, ui ) {                
                var cont = 0;
                $("input.page_content_order").each(function(index){
                    $(this).val(cont);
                    cont++;
                });                                        
            }
        });
        $( "#ulPageContent" ).disableSelection();                
        
        if ($("#is_menu_item")[0].checked) {
            $("#fldsMenu").show();
        } else {                
            $("#fldsMenu :text").val("");
            $("#fldsMenu").hide();
        }                
        
        $("#is_menu_item").change(function(){
            if ($(this)[0].checked) {
                $("#fldsMenu").show("fade", 500);
            } else {                
                $("#fldsMenu :text").val("");
                $("#fldsMenu").hide("fade", 300);
            }
        });
        
        $("#cancel-new-section").click(function(){            
            $("#divEditHtmlSection").hide("fade", 300);            
            tinyMCE.get('newHtmlSection').setContent("");
            $("#divEditPage").show("fade", 400);            
            
            $('html, body').animate({
                scrollTop: $("#addHtmlSection").offset().top
            }, 800);
        });
        
        $("#addHtmlSection").click(function(){
            $("#edit-section").hide();
            $("#add-new-section").show();            
            $("#divEditPage").hide("fade", 300);            
            $("#divEditHtmlSection").show("fade", 400);            
        });
        
        $("#add-new-section").click(function(){                                                            
            var li_count = $("#ulPageContent li").length;
            var new_li = '';                        
            
            new_li = '<li class="ui-state-default" id="li_nsec_' + newHtmlSectionCount + '">'
                    + '<div class="ui-grid-row"><div class="ui-grid-col-12" style="text-align: right;">'
                    + '<button id="delete_nhtmlcontent_' + newHtmlSectionCount + '" class="delete_htmlcontent" role="button" aria-disabled="false" is="p-button" icon="fa-trash-o" style="height: 30px; width: 30px;" parent_li="li_nsec_' + newHtmlSectionCount + '" ></button>'
                    + '<button id="edit_nhtmlcontent_' + newHtmlSectionCount + '" class="edit_htmlcontent" role="button" aria-disabled="false" is="p-button" icon="fa-pencil" style="height: 30px; width: 30px;" parent_li="li_nsec_' + newHtmlSectionCount + '" ></button>'
                    + '</div></div>'
                    + '<div class="ui-grid-row"><div class="ui-grid-col-12">'
                    + '<input type="hidden" name="page_content[new_htmlsection_'+ newHtmlSectionCount +'][page_content_id]" value="" />'
                    + '<input type="hidden" name="page_content[new_htmlsection_'+ newHtmlSectionCount +'][order]" value="' + li_count + '" class="page_content_order" />'
                    + '<input type="hidden" name="page_content[new_htmlsection_'+ newHtmlSectionCount +'][content_type]" value="HTMLSEC" />'
                    + '<input type="hidden" id="li_nsec_' + newHtmlSectionCount + '_htmlcontent" name="page_content[new_htmlsection_'+ newHtmlSectionCount +'][html_content]" value=\''  + tinyMCE.get('newHtmlSection').getContent({format : 'raw'}) + '\' />'
                    + '<div id="li_nsec_' + newHtmlSectionCount + '_htmlcontent_div">' + tinyMCE.get('newHtmlSection').getContent({format : 'raw'}) + '</div>'
                    + '</div></div></li>';
            
            $("#divPageContent ul").append(new_li);                                                                                
            
            $("#divEditHtmlSection").hide("fade", 300);            
            tinyMCE.get('newHtmlSection').setContent("");
            $("#divEditPage").show("fade", 400);                        
            
            $("#edit_nhtmlcontent_" + newHtmlSectionCount).click(function(e){                        
                tinyMCE.get('newHtmlSection').setContent($("#" + $(this).attr('parent_li') + '_htmlcontent').val(),{format:'text'});            
                $("#iptHtmlContentId").val($(this).attr('parent_li') + '_htmlcontent');
                
                $("#edit-section").show();
                $("#add-new-section").hide();
                $("#divEditPage").hide("fade", 300);            
                $("#divEditHtmlSection").show("fade", 400);
                e.preventDefault();
            });
            
            $("#delete_nhtmlcontent_" + newHtmlSectionCount).click(function(e){                                                
                $("#" + $(this).attr('parent_li')).fadeOut("normal", function() {
                    $(this).remove();
                });
                e.preventDefault();
            });
            
            $('html, body').animate({
                scrollTop: $("#li_nsec_" + newHtmlSectionCount).offset().top
            }, 800);
            
            newHtmlSectionCount++;
        });
        
        $("#edit-section").click(function(){            
            $("#" + $("#iptHtmlContentId").val()).val(tinyMCE.get('newHtmlSection').getContent({format : 'raw'}));
            $("#" + $("#iptHtmlContentId").val() + "_div").html(tinyMCE.get('newHtmlSection').getContent({format : 'raw'}));
            $("#divEditHtmlSection").hide("fade", 300);            
            tinyMCE.get('newHtmlSection').setContent("");
            $("#divEditPage").show("fade", 400); 
            
            $('html, body').animate({
                scrollTop: $("#" + $("#iptHtmlContentId").val() + "_div").offset().top
            }, 800);
        });
        
        initHtmlSectionButtons();
        
    });
    
    initHtmlSectionButtons = function(){
        $(".delete_htmlcontent").click(function(e){                                                
            $("#" + $(this).attr('parent_li')).fadeOut("normal", function() {
                $(this).remove();
            });
            e.preventDefault();
        });
        
        $(".edit_htmlcontent").click(function(e){                        
            tinyMCE.get('newHtmlSection').setContent($("#" + $(this).attr('parent_li') + '_htmlcontent').val(),{format:'text'});
            $("#iptHtmlContentId").val($(this).attr('parent_li') + '_htmlcontent');
            
            $("#edit-section").show();
            $("#add-new-section").hide();
            $("#divEditPage").hide("fade", 300);            
            $("#divEditHtmlSection").show("fade", 400);
            e.preventDefault();
        });
    };
    
</script>

@endsection