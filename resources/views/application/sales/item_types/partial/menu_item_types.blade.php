<ul class="menubar">                                
    <li>
        <a href="{{ route('index_item_types') }}" data-icon="fa-th-list" class="">Categorías de Items</a>
    </li>
    <li>
        <a href="{{ route('create_item_type') }}" data-icon="fa-plus" class="">Nueva Categoría de Items</a>
    </li>
    @if(isset($item_type->item_type_id))
    <li>
        <a href="{{ route('edit_item_type',['item_type_id' => $item_type->item_type_id]) }}" data-icon="fa-pencil" class="">Editar Categoría de Items</a>
    </li>        
    <li>
        <a href="{{ route('show_item_type',['item_type_id' => $item_type->item_type_id]) }}" data-icon="fa-search" class="">Ver Categoría de Items</a>
    </li>    
    @endif
</ul>