<ul class="menubar">                                
    <li>
        <a href="{{ route('index_sliders') }}" data-icon="fa-th-list" class="">Sliders</a>
    </li>
    <li>
        <a href="{{ route('create_slider') }}" data-icon="fa-plus" class="">Nuevo Slider</a>
    </li>
    @if(isset($slider->slider_id))
    <li>
        <a href="{{ route('edit_slider',['slider_id' => $slider->slider_id]) }}" data-icon="fa-pencil" class="">Editar Slider</a>
    </li>    
    <li>
        <a href="{{ route('show_slider',['slider_id' => $slider->slider_id]) }}" data-icon="fa-search" class="">Ver Slider</a>
    </li>  
    @endif
</ul>