@extends('layouts.app')

@section('content')

<div id="formAjax" class="ui-fluid">
    <div class="ui-g" >
        <div class="ui-g-12"> 
            <div class="card card-w-title">                                                                                                 
                <div class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            @include('application.management.menu_options.partial.menu_menu_options')
                        </div>
                    </div>
                    
                    <div class="EmptyBox10" ></div>
                    
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <div class="text-center titulo">
                                <p><i class="fa fa-pencil" ></i></p>
                                <p><h1 class="coolvetica-rg" >Editar Menú Opción.</h1></p>                
                            </div>
                        </div>
                    </div>
                
                    <form id="editMenuOptionForm" name="editMenuOptionForm" method="POST" action="{{ route('update_menu_option') }}" class="ajaxJsonForm form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">                        
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="menu_id" class="col-md-4 control-label">Código:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                {{ $menu_option->menu_id }}
                                <input type="hidden" id="menu_id" name="menu_id" value="{{ $menu_option->menu_id }}">
                            </div>                                                                                                                
                        </div>
                        
                        <div class="EmptyBox20"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="label" class="col-md-4 control-label">Etiqueta:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input id="label" name="label" type="text" autocomplete="off" style="width: 95%;" class="form-control" value="{{ $menu_option->label }}"/>
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="label_help_block" class="help-block">
                                    @if ($errors->has('label'))                                                    
                                        <strong>{{ $errors->first('label') }}</strong>                                                    
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
                                <input id="icon" name="icon" type="text" autocomplete="off" style="width: 95%;" class="form-control" value="{{ $menu_option->icon }}" />
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
                                <label for="url" class="col-md-4 control-label">Url:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input id="url" name="url" type="text" autocomplete="off" style="width: 95%;" class="form-control" value="{{ $menu_option->url }}" />
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="url_help_block" class="help-block">
                                    @if ($errors->has('label'))                                                    
                                        <strong>{{ $errors->first('label') }}</strong>                                                    
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
                                <input id="order" name="order" type="text" autocomplete="off" style="width: 95%;" class="form-control" value="{{ $menu_option->order }}" />
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
                                <label for="type" class="col-md-4 control-label">Tipo:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <select id="type" name="type" class="selectOneMenu">
                                    <option value="">Seleccionar</option>
                                    <option value="INT" <?php echo $menu_option->type=='INT'?'selected':''; ?> >Interna</option>                                    
                                    <option value="EXT" <?php echo $menu_option->type=='EXT'?'selected':''; ?> >Externa</option> 
                                </select>                                
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="type_help_block" class="help-block">
                                    @if ($errors->has('type'))                                                    
                                        <strong>{{ $errors->first('type') }}</strong>                                                    
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
                                    <option value="A" <?php echo $menu_option->state=='A'?'selected':''; ?> >Activo</option>
                                    <option value="I" <?php echo $menu_option->state=='I'?'selected':''; ?>>Inactivo</option> 
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
                                <label for="menu_parent_id" class="col-md-4 control-label">Menú Padre:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <select id="menu_parent_id" name="menu_parent_id" class="selectList" >
                                    <option value="0">> Raíz</option>
                                    <?php echo $menu_options_list ?>
                                </select>                                
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="menu_parent_id_help_block" class="help-block">
                                    @if ($errors->has('menu_parent_id'))                                                    
                                        <strong>{{ $errors->first('menu_parent_id') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>
                        
                        <div class="EmptyBox10"></div>

                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="created_at" class="col-md-4 control-label">Fecha creación:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                {{ $menu_option->created_at }}
                            </div>                                                                                                                
                        </div>

                        <div class="EmptyBox10"></div>

                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="updated_at" class="col-md-4 control-label">Fecha actualización:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                {{ $menu_option->updated_at }}
                            </div>                                                                                                                
                        </div>
                        <div class="EmptyBox20"></div>
                                
                        <div class="ui-grid-row form-group">
                            <div class="ui-grid-col-12 text-left">                                                                                
                                @if ($errors->has('general_message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('general_message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        
                        <div class="EmptyBox10"></div>

                        <div class="ui-grid-row text-center">
                            <div class="ui-grid-col-12" >                                                                                         
                                <button type="submit" role="button" aria-disabled="false" is="p-button" icon="fa-floppy-o" class="width_auto" >
                                    Guardar
                                </button>
                                <button type="button" role="button" aria-disabled="false" is="p-button" icon="fa-ban" class="width_auto" onclick="window.history.go(-1);">
                                    Cancelar
                                </button>
                            </div>
                        </div> 
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
