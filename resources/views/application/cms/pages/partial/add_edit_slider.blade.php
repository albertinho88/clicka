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