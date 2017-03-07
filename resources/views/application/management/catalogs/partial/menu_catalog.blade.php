<ul class="menubar">                                
    <li>
        <a href="{{ route('index_catalogs') }}" data-icon="fa-th-list" class="">Catálogos</a>
    </li>
    <li>
        <a href="{{ route('create_catalog') }}" data-icon="fa-plus" class="">Nuevo Catálogo</a>
    </li>
    @if(isset($catalog))
    <li>
        <a href="{{ route('edit_catalog',['catalog_id' => $catalog->catalog_id]) }}" data-icon="fa-pencil" class="">Editar Catálogo</a>
    </li>    
    <li>
        <a href="{{ route('show_catalog',['catalog_id' => $catalog->catalog_id]) }}" data-icon="fa-search" class="">Ver Catálogo</a>
    </li>
    <li>
        <a href="{{ route('manage_catalog_detail',['catalog_id' => $catalog->catalog_id]) }}" data-icon="fa-tasks" class="">Gestionar Detalle</a>
    </li>    
    @endif
</ul>