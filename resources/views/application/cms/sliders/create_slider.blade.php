@extends('layouts.app')

@section('content')

<div id="formAjax" class="ui-fluid">
    <div class="ui-g">
        <div class="ui-g-12"> 
            <div class="card card-w-title">                                                                                                 
                <div id="divCreateSlider" class="ui-grid ui-grid-responsive">

                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            @include('application.cms.sliders.partial.menu_slider')
                        </div>
                    </div>

                    <div class="EmptyBox10" ></div>

                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <div class="text-center titulo">
                                <p><i class="fa fa-plus" ></i></p>
                                <p><h1 class="coolvetica-rg" >Nuevo Slider.</h1></p>                
                            </div>
                        </div>
                    </div>

                    <form id="createSliderForm" name="createSliderForm" method="POST" action="{{ route('store_slider') }}" class="ajaxJsonForm form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
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
                                <label for="animate_automatically" class="col-md-4 control-label">Animado Automáticamente:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input type="checkbox" id="animate_automatically" name="animate_automatically" />                                
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="animate_automatically_help_block" class="help-block">
                                    @if ($errors->has('animate_automatically'))                                                    
                                        <strong>{{ $errors->first('animate_automatically') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="transition_speed" class="col-md-4 control-label">Velocidad de Transición <small>(milisegundos)</small>:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input id="transition_speed" name="transition_speed" type="text" autocomplete="off"  class="form-control" />
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="transition_speed_help_block" class="help-block">
                                    @if ($errors->has('transition_speed'))                                                    
                                        <strong>{{ $errors->first('transition_speed') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="time_between_transition" class="col-md-4 control-label">Tiempo entre transición <small>(milisegundos)</small>:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input id="time_between_transition" name="time_between_transition" type="text" autocomplete="off"  class="form-control" />
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="time_between_transition_help_block" class="help-block">
                                    @if ($errors->has('time_between_transition'))                                                    
                                        <strong>{{ $errors->first('time_between_transition') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="show_pager" class="col-md-4 control-label">Mostrar Paginador:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input type="checkbox" id="show_pager" name="show_pager" />                                
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="show_pager_help_block" class="help-block">
                                    @if ($errors->has('show_pager'))                                                    
                                        <strong>{{ $errors->first('show_pager') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="show_navigation" class="col-md-4 control-label">Mostrar Navegación:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input type="checkbox" id="show_navigation" name="show_navigation" />                                
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="show_navigation_help_block" class="help-block">
                                    @if ($errors->has('show_navigation'))                                                    
                                        <strong>{{ $errors->first('show_navigation') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="random_slides_order" class="col-md-4 control-label">Orden de Slides Aleatorio:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input type="checkbox" id="random_slides_order" name="random_slides_order" />                                
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="random_slides_order_help_block" class="help-block">
                                    @if ($errors->has('random_slides_order'))                                                    
                                        <strong>{{ $errors->first('random_slides_order') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="pause_on_hover" class="col-md-4 control-label">Pausa sobre Slider:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input type="checkbox" id="pause_on_hover" name="pause_on_hover" />                                
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="pause_on_hover_help_block" class="help-block">
                                    @if ($errors->has('pause_on_hover'))                                                    
                                        <strong>{{ $errors->first('pause_on_hover') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="pause_hover_controls" class="col-md-4 control-label">Pausa sobre Controles:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input type="checkbox" id="pause_hover_controls" name="pause_hover_controls" />                                
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="pause_hover_controls_help_block" class="help-block">
                                    @if ($errors->has('pause_hover_controls'))                                                    
                                        <strong>{{ $errors->first('pause_hover_controls') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="prev_text" class="col-md-4 control-label">Texto Anterior:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input id="prev_text" name="prev_text" type="text" autocomplete="off"  class="form-control" />
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="prev_text_help_block" class="help-block">
                                    @if ($errors->has('prev_text'))                                                    
                                        <strong>{{ $errors->first('prev_text') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="next_text" class="col-md-4 control-label">Texto Siguiente:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input id="next_text" name="next_text" type="text" autocomplete="off"  class="form-control" />
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="next_text_help_block" class="help-block">
                                    @if ($errors->has('next_text'))                                                    
                                        <strong>{{ $errors->first('next_text') }}</strong>                                                    
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="max_width" class="col-md-4 control-label">Ancho Máximo:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input id="max_width" name="max_width" type="text" autocomplete="off"  class="form-control" />
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="max_width_help_block" class="help-block">
                                    @if ($errors->has('max_width'))                                                    
                                        <strong>{{ $errors->first('max_width') }}</strong>                                                    
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