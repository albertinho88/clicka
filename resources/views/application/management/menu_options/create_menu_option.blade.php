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
                                <p><i class="fa fa-plus" ></i></p>
                                <p><h1 class="coolvetica-rg" >Nueva Opción Menú.</h1></p>                
                            </div>
                        </div>
                    </div>
                
                    <form id="createMenuOptionForm" name="createMenuOptionForm" method="POST" action="{{ route('store_menu_option') }}" class="ajaxJsonForm form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="label" class="col-md-4 control-label">Etiqueta:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input id="label" name="label" type="text" autocomplete="off" class="form-control" />
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
                                <input id="icon" name="icon" type="text" autocomplete="off" class="form-control" />
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
                                <input id="url" name="url" type="text" autocomplete="off" class="form-control" />
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
                                <input id="order" name="order" type="text" autocomplete="off" class="form-control" />
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
                                    <option value="INT">Interna</option>
                                    <option value="EXT">Externa</option> 
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
                                <label for="menu_parent_id" class="col-md-4 control-label">Menu Padre:</label>
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

@endsection