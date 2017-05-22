<ul class="menubar">                                
    <li>
        <a href="{{ route('index_services') }}" data-icon="fa-th-list" class="">Servicios</a>
    </li>
    <li>
        <a href="{{ route('create_service') }}" data-icon="fa-plus" class="">Nuevo Servicio</a>
    </li>
    @if(isset($service->service_id))
    <li>
        <a href="{{ route('edit_service',['service_id' => $service->service_id]) }}" data-icon="fa-pencil" class="">Editar Servicio</a>
    </li>        
    <li>
        <a href="{{ route('show_service',['service_id' => $service->service_id]) }}" data-icon="fa-search" class="">Ver Servicio</a>
    </li>    
    @endif
</ul>