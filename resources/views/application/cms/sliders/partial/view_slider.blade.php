<div class="ui-g">
    <div class="ui-g-12"> 
        <div class="card card-w-title">                                                                                                 
            <div class="ui-grid ui-grid-responsive">
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        @include('application.cms.sliders.partial.menu_slider')
                    </div>
                </div>

                <div class="EmptyBox10" ></div>                

                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <div class="text-center titulo">
                            <p><i class="fa fa-search"></i></p>
                            <p><h1 class="coolvetica-rg" >Ver Slider.</h1></p>                
                        </div>
                    </div>
                </div>
                
                <div class="EmptyBox10" ></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-8"> 

                        <fieldset>
                            <legend>Propiedades</legend>

                            <div class="EmptyBox10"></div>

                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="slider_id" class="col-md-4 control-label">Código:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    {{ $slider->slider_id }}
                                </div>                                                                                                                
                            </div>

                            <div class="EmptyBox10"></div>

                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="name" class="col-md-4 control-label">Nombre:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    {{ $slider->name }}
                                </div>                                                                                                                
                            </div>

                            <div class="EmptyBox10"></div>                                

                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="animate_automatically" class="col-md-4 control-label">Animado Automáticamente:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    <input type="checkbox" <?php echo $slider->animate_automatically?'checked':''; ?> disabled="disabled"/>
                                </div>                                                                                                                
                            </div>                                

                            <div class="EmptyBox10"></div>

                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="transition_speed" class="col-md-4 control-label">Velocidad de Transición:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    {{ $slider->transition_speed }}
                                </div>                                                                                                                
                            </div>

                            <div class="EmptyBox10"></div>

                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="time_between_transition" class="col-md-4 control-label">Tiempo de Transición:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    {{ $slider->time_between_transition }}
                                </div>                                                                                                                
                            </div>

                            <div class="EmptyBox10"></div>

                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="show_pager" class="col-md-4 control-label">Mostrar Paginador:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    <input type="checkbox" <?php echo $slider->show_pager?'checked':''; ?> disabled="disabled"/>
                                </div>                                                                                                                
                            </div>

                            <div class="EmptyBox10"></div>

                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="show_navigation" class="col-md-4 control-label">Mostrar Navegador:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    <input type="checkbox" <?php echo $slider->show_navigation?'checked':''; ?> disabled="disabled"/>
                                </div>                                                                                                                
                            </div>

                            <div class="EmptyBox10"></div>

                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="random_slides_order" class="col-md-4 control-label">Orden de Slides aleatorio:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    <input type="checkbox" <?php echo $slider->random_slides_order?'checked':''; ?> disabled="disabled"/>
                                </div>                                                                                                                
                            </div>

                            <div class="EmptyBox10"></div>

                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="pause_on_hover" class="col-md-4 control-label">Pausa sobre Slider:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    <input type="checkbox" <?php echo $slider->pause_on_hover?'checked':''; ?> disabled="disabled"/>
                                </div>                                                                                                                
                            </div>

                            <div class="EmptyBox10"></div>

                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="pause_hover_controls" class="col-md-4 control-label">Pausa sobre controles:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    <input type="checkbox" <?php echo $slider->pause_hover_controls?'checked':''; ?> disabled="disabled"/>
                                </div>                                                                                                                
                            </div>

                            <div class="EmptyBox10"></div>

                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="prev_text" class="col-md-4 control-label">Texto anterior:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    {{ $slider->prev_text }}
                                </div>                                                                                                                
                            </div>                

                            <div class="EmptyBox10"></div>

                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="next_text" class="col-md-4 control-label">Texto siguiente:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    {{ $slider->next_text }}
                                </div>                                                                                                                
                            </div>                

                            <div class="EmptyBox10"></div>

                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="max_width" class="col-md-4 control-label">Ancho máximo:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    {{ $slider->max_width }}
                                </div>                                                                                                                
                            </div>                

                            <div class="EmptyBox10"></div>

                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="state" class="col-md-4 control-label">Estado:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    {{ $slider->state }}
                                </div>                                                                                                                
                            </div>                

                            <div class="EmptyBox10"></div>

                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="created_at" class="col-md-4 control-label">Fecha creación:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    {{ $slider->created_at }}
                                </div>                                                                                                                
                            </div>

                            <div class="EmptyBox10"></div>

                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="updated_at" class="col-md-4 control-label">Fecha actualización:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    {{ $slider->updated_at }}
                                </div>                                                                                                                
                            </div>
                        </fieldset>
                    </div>
                    
                    <div class="ui-grid-col-4">                        
                        <fieldset>
                            <legend>Imágenes</legend>                        
                            
                            @foreach($slider->slider_images as $slide)
                                <img src="{{ asset($slide->image_path) }}" style="width: 100px; height: 100px;" />
                            @endforeach
                            
                            <?php //echo print_r($slider->slider_images) ?>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>