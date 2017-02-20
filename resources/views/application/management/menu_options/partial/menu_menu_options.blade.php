<ul class="menubar">                                
    <li>
        <a href="{{ route('index_menu_options') }}" data-icon="fa-th-list" class="">Opciones Menú</a>
    </li>
    <li>
        <a href="{{ route('create_menu_option') }}" data-icon="fa-plus" class="">Nueva Opción Menú</a>
    </li>
    @if(isset($menu_option))
    <li>
        <a href="{{ route('edit_menu_option',['menu_option_id' => $menu_option->menu_option_id]) }}" data-icon="fa-pencil" class="">Editar Opción Menú</a>
    </li>    
    @endif
    @if(isset($menu_option))
    <li>
        <a href="{{ route('show_menu_option',['menu_option_id' => $menu_option->menu_option_id]) }}" data-icon="fa-search" class="">Ver Opción Menú</a>
    </li>    
    @endif
</ul>