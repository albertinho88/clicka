<ul class="menubar">                                
    <li>
        <a href="{{ route('index_pages') }}" data-icon="fa-th-list" class="">Páginas</a>
    </li>
    <li>
        <a href="{{ route('create_page') }}" data-icon="fa-plus" class="">Nueva Página</a>
    </li>
    @if(isset($page->page_id))
    <li>
        <a href="{{ route('edit_page',['page_id' => $page->page_id]) }}" data-icon="fa-pencil" class="">Editar Página</a>
    </li>    
    <li>
        <a href="{{ route('show_page',['page_id' => $page->page_id]) }}" data-icon="fa-search" class="">Ver Página</a>
    </li>  
    @endif
</ul>