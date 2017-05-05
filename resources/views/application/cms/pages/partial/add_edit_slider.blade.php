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
    
    <div class="ui-grid-row">
        <div class="ui-grid-col-12">
            <ul id="cars1">
                @foreach ($active_sliders as $asl)
                <li>
                    <div class="ui-grid ui-grid-responsive">                                   
                        <div class="ui-grid-row" > 
                            <div class="ui-grid-col-12" >                    
                                @include('partial.slider',['slider' => $asl])                     
                            </div>                               
                        </div>                                                   
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
        
    <script type="text/javascript">
        
        $(function() {
            $('#cars1').puicarousel({
                headerText: 'Sliders Activos',
                responsive: true,
            });
            
        });
        
    </script>
    
    <div class="EmptyBox10"></div>
    
    <div class="ui-grid-row text-center">
        <div class="ui-grid-col-12" >                                
            <button id="cancel-slider" role="button" aria-disabled="false" is="p-button" icon="fa-ban" class="width_auto" >
                Cancelar
            </button>            
        </div>
    </div>
    
</div>

<script type="text/javascript">
    
    $(document).ready(function(){
        $("#cancel-slider").click(function(e){
            
            $("#divEditSlider").toggle("fade", 300);                        
            $("#divEditPage").toggle("fade", 300, function() {                
                $('html, body').animate({
                    scrollTop: $("#addSlider").offset().top
                }, 600);
            });            
        
            e.preventDefault();
        });
    });
    
</script>    