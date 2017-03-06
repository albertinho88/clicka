@extends('layouts.app')

@section('content')

<div id="formAjax" class="ui-fluid">
    <div class="ui-g" >
        <div class="ui-g-12"> 
            <div class="card card-w-title">                                                                                                 
                <div class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            @include('application.management.services.partial.menu_service')
                        </div>
                    </div>
                    
                    <div class="EmptyBox10" ></div>
                    
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <div class="text-center titulo">
                                <p><i class="fa fa-pencil" ></i></p>
                                <p><h1 class="coolvetica-rg" >Editar Servicio.</h1></p>                
                            </div>
                        </div>
                    </div>
                
                    <form id="editServiceForm" name="editServiceForm" method="POST" action="{{ route('update_service') }}" class="ajaxJsonForm form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="service_id" name="service_id" value="{{ $service->service_id }}">
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
                                    <textarea id="website_html_content" name="website_html_content" class="form-control html_editor" >
                                        {{ $service->website_html_content }}
                                    </textarea>
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
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection