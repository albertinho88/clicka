
    <ul>
        @foreach($slider->ordered_slider_images as $slide)
            <li><img src="{{ asset($slide->image_path) }}" alt="{{ $slide->caption }}" title=""/></li>
        @endforeach
    </ul>
