@extends('layouts.app')

@section('content')

<div id="formAjax" class="ui-fluid">
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
                                <p><i class="fa fa-plus" ></i></p>
                                <p><h1 class="coolvetica-rg" >Editar Página.</h1></p>                
                            </div>
                        </div>
                    </div>

                    <form id="editPageForm" name="editPageForm" method="POST" action="{{ route('update_page') }}" class="ajaxJsonForm form-horizontal">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            
                                   
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="page_id" class="col-md-4 control-label">Código:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    {{ $page->page_id }}
                                    <input type="hidden" name="page_id" value="{{ $page->page_id }}" />
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
                                
                                <div id="divPageContent"></div>
                                
                                <div class="EmptyBox20"></div>
                                
                                <div class="ui-grid-row">
                                    <ul class="menubar">                                                                        
                                        <li>
                                            <a id="addHtmlSection" data-icon="fa-code" class="">Agregar Sección Html</a>
                                        </li>
                                        <li>
                                            <a id="addSlider" data-icon="fa-picture-o" class="">Agregar Slider</a>
                                        </li>
                                        <li>
                                            <a id="addForm" data-icon="fa-file-text" class="">Agregar Formulario</a>
                                        </li>
                                    </ul>
                                </div>
                                
                            </fieldset>
                            
                            <div class="EmptyBox20"></div>

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
                                    <select id="page_parent_id" name="page_parent_id" class="selectList" >
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
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function(){
        
        if ($("#is_menu_item")[0].checked) {
            $("#fldsMenu").show();
        } else {                
            $("#fldsMenu :text").val("");
            $("#fldsMenu").hide();
        }
        
        //$("#fldsMenu").hide();
        
        $("#is_menu_item").change(function(){
            if ($(this)[0].checked) {
                $("#fldsMenu").show("fade", 500);
            } else {                
                $("#fldsMenu :text").val("");
                $("#fldsMenu").hide("fade", 300);
            }
        });
        
        $("#addHtmlSection").click(function(){
            $("#divPageContent").append('<div class="EmptyBox10"></div>');
            $("#divPageContent").append('<div class="ui-grid-row"><div class="ui-grid-col-12"><textarea id="content[]" class="html_editor"></textarea></div></div>');
            initUiComponents();
        });
    });
    
</script>

@endsection