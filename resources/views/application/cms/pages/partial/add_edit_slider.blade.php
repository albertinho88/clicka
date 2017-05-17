<form id="add_edit_slider">
    <div id="divEditSlider" class="ui-grid ui-grid-responsive">
        <div class="ui-grid-row">
            <div class="ui-grid-col-12">
                <div class="text-center titulo">
                    <p><i class="fa fa-picture-o" ></i></p>
                    <p><h1 class="coolvetica-rg" >Slider.</h1></p>                
                </div>
            </div>
        </div>

        <div class="EmptyBox10"></div>    

        <ul id="sliders_carrousel">
            @foreach ($active_sliders as $asl)
                <li style="border: none;">
                    <div class="ui-grid ui-grid-responsive" style="margin: 5px; font-size: 8pt;">                            
                        <div class="ui-grid-row" > 
                            <div class="ui-grid-col-2" ></div>
                            <div class="ui-grid-col-8" > 
                                <div class="ui-grid ui-grid-responsive">
                                    <div class="ui-grid-row" >
                                        <div class="ui-grid-col-12 text-center" >
                                            <input type="radio" id="sld_rd_{{ $asl->slider_id }}" name="sld_rd" value="{{ $asl->slider_id }}"/>                                    
                                            <label for="sld_rd_{{ $asl->slider_id }}" class="ui-widget">&nbsp; {{ $asl->name }}</label>
                                        </div>                                            
                                    </div>
                                    <div class="EmptyBox10"></div>
                                    <div class="ui-grid-row" >
                                        <div class="ui-grid-col-12" >
                                            <div id="sldr_{{ $asl->slider_id }}">
                                                @include('partial.slider',['slider' => $asl])
                                            </div>
                                        </div>                                            
                                    </div>
                                </div>
                            </div>     
                            <div class="ui-grid-col-2" ></div>                     
                        </div>                                                                    
                    </div>
                </li>
            @endforeach 
        </ul>                  

        <div class="EmptyBox20"></div>

        <fieldset>
            <legend>Tamaño de columna por resolución</legend>

            <div class="EmptyBox10"></div>

            <div class="ui-grid-row">
                <div class="ui-grid-col-12">
                    <small style="color: blue;">
                        El tamaño máximo es 12 y significa que habrá 1 sola columna en la fila, mientras que si se escoge el tamaño 1 significa que el contenido
                        ocupará 1 columna de las 12 posibles en una fila.
                    </small>
                </div>
            </div>

            <div class="EmptyBox20"></div>

            <div class="ui-grid-row">
                <div class="ui-grid-col-2">                                            
                    <label for="columns_on_lg_sl" class="col-md-4 control-label">Dispositivos grandes:</label>
                </div>
                <div class="ui-grid-col-10">
                    <select id="columns_on_lg_sl" name="columns_on_lg_sl" class="selectOneMenu">
                        @for($i=12; $i>=1; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>                                                                                                                
            </div> 

            <div class="ui-grid-row">
                <div class="ui-grid-col-2">                                            
                    <label for="columns_on_md_sl" class="col-md-4 control-label">Dispositivos medianos:</label>
                </div>
                <div class="ui-grid-col-10">
                    <select id="columns_on_md_sl" name="columns_on_md_sl" class="selectOneMenu">
                        @for($i=12; $i>=1; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>                                                                                                                
            </div>

            <div class="ui-grid-row">
                <div class="ui-grid-col-2">                                            
                    <label for="columns_on_g_sl" class="col-md-4 control-label">Dispositivos pequeños:</label>
                </div>
                <div class="ui-grid-col-10">
                    <select id="columns_on_g_sl" name="columns_on_g_sl" class="selectOneMenu">                                
                        @for($i=12; $i>=1; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor 
                    </select>
                </div>                                                                                                                
            </div>
        </fieldset>

        <div class="EmptyBox10"></div>

        <div class="ui-grid-row text-center">
            <div class="ui-grid-col-12" > 
                <button id="add-new-slider" role="button" aria-disabled="false" is="p-button" icon="fa-plus" class="width_auto" >
                    Agregar
                </button>
                <button id="cancel-new-slider" role="button" aria-disabled="false" is="p-button" icon="fa-ban" class="width_auto" >
                    Cancelar
                </button>            
            </div>
        </div>

    </div>
</form>

<script type="text/javascript">
    
    $(document).ready(function(){                                       
        $('#sliders_carrousel').puicarousel({
            headerText: 'Slider Activos'
        });                               
    });
    
</script>    