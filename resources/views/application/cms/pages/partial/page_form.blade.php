<input type="hidden" name="_token" value="{{ csrf_token() }}">                                                              

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
                    @include('application.cms.pages.partial.page_content',['pcontent' => $pcontent]) 
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