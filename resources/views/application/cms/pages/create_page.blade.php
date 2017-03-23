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
                                <p><h1 class="coolvetica-rg" >Nueva Página.</h1></p>                
                            </div>
                        </div>
                    </div>

                    <form id="createPageForm" name="createPageForm" method="POST" action="{{ route('store_page') }}" class="ajaxJsonForm form-horizontal">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="page_id" class="col-md-4 control-label">Identificador:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    <input id="page_id" name="page_id" type="text" autocomplete="off"  class="form-control" />
                                </div>                                                                                                                
                            </div>
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2"></div>
                                <div class="ui-grid-col-10">
                                    <span id="page_id_help_block" class="help-block">
                                        @if ($errors->has('page_id'))                                                    
                                            <strong>{{ $errors->first('page_id') }}</strong>                                                    
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
                                    <input type="checkbox" id="is_menu_item" name="is_menu_item" />                                
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
                            
                            <fieldset id="fldsMenu">
                                <legend>Propiedades Menú</legend>
                                
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
                                        <label for="icon" class="col-md-4 control-label">Icono:</label>
                                    </div>
                                    <div class="ui-grid-col-10">
                                        <input id="icon" name="icon" type="text" autocomplete="off"  class="form-control" />
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
                                        <input id="menu_class" name="menu_class" type="text" autocomplete="off"  class="form-control" />
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
                                        <input id="order" name="order" type="text" autocomplete="off"  class="form-control" />
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
                                        <input id="title" name="title" type="text" autocomplete="off"  class="form-control" />
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
                                
                            </fieldset>
                            
                            <div class="EmptyBox20"></div>
                            
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
        
        $("#fldsMenu").hide();
        
        $("#is_menu_item").change(function(){
            if ($(this)[0].checked) {
                $("#fldsMenu").show("fade", 500);
            } else {
                
                $("#fldsMenu :text").val("");
                $("#fldsMenu").hide("fade", 300);
            }
        });
    });
    
</script>

@endsection