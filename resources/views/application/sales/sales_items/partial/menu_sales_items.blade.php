<ul class="menubar">                                
    <li>
        <a href="{{ route('index_sales_items') }}" data-icon="fa-th-list" class="">Items de Venta</a>
    </li>
    <li>
        <a href="{{ route('create_sales_item') }}" data-icon="fa-plus" class="">Nuevo Item de Venta</a>
    </li>
    @if(isset($sales_item->sales_item_id))
    <li>
        <a href="{{ route('edit_sales_item',['role_id' => $sales_item->sales_item_id]) }}" data-icon="fa-pencil" class="">Editar Item de Venta</a>
    </li>    
    <li>
        <a href="{{ route('show_sales_item',['role_id' => $sales_item->sales_item_id]) }}" data-icon="fa-search" class="">Ver Item de Venta</a>
    </li>    
    @endif
</ul>