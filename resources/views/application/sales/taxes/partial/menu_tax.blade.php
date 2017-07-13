<ul class="menubar">                                
    <li>
        <a href="{{ route('index_taxes') }}" data-icon="fa-th-list" class="">Impuestos</a>
    </li>
    <li>
        <a href="{{ route('create_tax') }}" data-icon="fa-plus" class="">Nuevo Impuesto</a>
    </li>
    @if(isset($tax->tax_id))
    <li>
        <a href="{{ route('edit_tax',['tax_id' => $tax->tax_id]) }}" data-icon="fa-pencil" class="">Editar Impuesto</a>
    </li>        
    <li>
        <a href="{{ route('show_tax',['tax_id' => $tax->tax_id]) }}" data-icon="fa-search" class="">Ver Impuesto</a>
    </li>    
    @endif
</ul>