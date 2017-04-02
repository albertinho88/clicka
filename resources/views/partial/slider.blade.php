<script>
    $(function () {                                                
        // Slideshow 1
        $("#slider1").responsiveSlides({
          //maxwidth: 100%,
          speed: 800,
          auto: true,
          pager: false,
          nav: true,        
          namespace: "callbacks",
          before: function () {
            $('.events').append("<li>before event fired.</li>");
          },
          after: function () {
            $('.events').append("<li>after event fired.</li>");
          }
        });
        
        $(".rslides").responsiveSlides({
            auto: true,             // Boolean: Animate automatically, true or false
            speed: 500,            // Integer: Speed of the transition, in milliseconds
            timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
            pager: false,           // Boolean: Show pager, true or false
            nav: false,             // Boolean: Show navigation, true or false
            random: false,          // Boolean: Randomize the order of the slides, true or false
            pause: false,           // Boolean: Pause on hover, true or false
            pauseControls: true,    // Boolean: Pause when hovering controls, true or false
            prevText: "Previous",   // String: Text for the "previous" button
            nextText: "Next",       // String: Text for the "next" button
            maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
            navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
            manualControls: "",     // Selector: Declare custom pager navigation
            namespace: "rslides",   // String: Change the default namespace used
            before: function(){},   // Function: Before callback
            after: function(){}     // Function: After callback
          });
    });
</script>

<div class="ui-fluid">
    <div class="ui-g">
        <div class="ui-g-12">                
            <!-- Slideshow 4 -->
            <div class="callbacks_container">
              <ul class="rslides" id="slider1">
                <li>
                  <img src="{{ asset('_resource/images/slider/slider_1.jpg')}}" alt="">
                  <!--<p class="caption">"Un software personalizado puede convertirse en el activo mas importante de tu empresa."</p>-->
                  <p class="caption">"Software a la Medida."</p>
                </li>
                <li>
                  <img src="{{ asset('_resource/images/slider/slider_1.jpg')}}" alt="">
                  <p class="caption">"Si tu negocio no está en internet, tu negocio no existe."</p>
                </li>
                <!--<li>
                  <img src="images/2.jpg" alt="">
                  <p class="caption">This is another caption</p>
                </li>
                <li>
                  <img src="images/3.jpg" alt="">
                  <p class="caption">The third caption</p>
                </li>-->
              </ul>
            </div>
        </div>
    </div>
</div>