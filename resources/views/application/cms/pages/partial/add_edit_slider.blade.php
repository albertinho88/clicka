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
    
    @foreach ($active_sliders as $asl)
        <div class="ui-g-12 ui-md-6 ui-lg-6">
            <div class="ui-g card overview-box overview-box-1 " style="background-color: #BDBDBD;">                                  
                <div class="callbacks_container">
                    <ul class="rslides" id="{{ $asl->name }}">
                        @foreach($asl->slider_images as $slide)
                            <li>
                              <img src="{{ asset($slide->image_path) }}" alt="">                              
                              <p class="caption">{{ $slide->caption }}</p>
                            </li>
                        @endforeach                      
                    </ul>
                  </div>
            </div>
        </div>
        <script type="text/javascript">
            $("#{{ $asl->name }}").responsiveSlides({
                auto: <?php echo $asl->animate_automatically?'true':'false'; ?>,             // Boolean: Animate automatically, true or false
                speed: {{ $asl->transition_speed }},            // Integer: Speed of the transition, in milliseconds
                timeout: {{ $asl->time_between_transition }},          // Integer: Time between slide transitions, in milliseconds
                pager: <?php echo $asl->show_pager?'true':'false'; ?>,           // Boolean: Show pager, true or false
                nav: false,             // Boolean: Show navigation, true or false
                random: false,          // Boolean: Randomize the order of the slides, true or false
                pause: false,           // Boolean: Pause on hover, true or false
                pauseControls: true,    // Boolean: Pause when hovering controls, true or false
                prevText: "Previous",   // String: Text for the "previous" button
                nextText: "Next",       // String: Text for the "next" button
                maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
                navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
                manualControls: "",     // Selector: Declare custom pager navigation
                namespace: "callbacks",   // String: Change the default namespace used
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
              });
        </script>
    @endforeach             
    
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