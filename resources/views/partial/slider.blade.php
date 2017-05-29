<?php 
    $slider_uid = str_replace(".", "", $slider->name.microtime(false));
    $slider_uid = str_replace(" ", "", $slider_uid);
    $slider_uid .= str_random(8);
?>

    
<div class="callbacks_container">
    <ul class="rslides" id="<?php echo $slider_uid; ?>">
        @foreach($slider->ordered_slider_images as $slide)
            <li>
                <img src="{{ asset($slide->image_path) }}" alt="" >                
              @if($slide->caption)
                <p class="caption">
                    @if($slide->icon)
                         <i class="fa {{ $slide->icon }}" ></i><br />
                    @endif
                    {{ $slide->caption }}
                </p>
              @endif
            </li>
        @endforeach                      
    </ul>
</div>   


<script type="text/javascript">
    $("#<?php echo $slider_uid ?>").responsiveSlides({
        auto: <?php echo isset($slider->animate_automatically)?'true':'false'; ?>,             // Boolean: Animate automatically, true or false
        speed: {{ $slider->transition_speed }},            // Integer: Speed of the transition, in milliseconds
        timeout: {{ $slider->time_between_transition }},          // Integer: Time between slide transitions, in milliseconds
        pager: <?php echo $slider->show_pager?'true':'false'; ?>,           // Boolean: Show pager, true or false
        nav: <?php echo $slider->show_navigation?'true':'false'; ?>,             // Boolean: Show navigation, true or false
        random: <?php echo $slider->random_slides_order?'true':'false'; ?>,          // Boolean: Randomize the order of the slides, true or false
        pause: <?php echo $slider->pause_on_hover?'true':'false'; ?>,           // Boolean: Pause on hover, true or false
        pauseControls: <?php echo $slider->pause_hover_controls?'true':'false'; ?>,    // Boolean: Pause when hovering controls, true or false
        prevText: "<?php echo $slider->prev_text; ?>",   // String: Text for the "previous" button
        nextText: "<?php echo $slider->next_text; ?>",       // String: Text for the "next" button
        maxwidth: "<?php echo $slider->max_width; ?>",           // Integer: Max-width of the slideshow, in pixels
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