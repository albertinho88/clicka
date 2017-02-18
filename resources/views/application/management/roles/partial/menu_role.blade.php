<ul class="menubar">                                
    <li>
        <a href="{{ route('index_roles') }}" data-icon="fa-th-list" class="">Roles</a>
    </li>
    <li>
        <a href="{{ route('create_role') }}" data-icon="fa-plus" class="">Nuevo Rol</a>
    </li>
    @if(isset($role))
    <li>
        <a href="{{ route('edit_role',['role_id' => $role->role_id]) }}" data-icon="fa-pencil" class="">Editar Rol</a>
    </li>    
    @endif
    @if(isset($role))
    <li>
        <a href="{{ route('show_role',['role_id' => $role->role_id]) }}" data-icon="fa-search" class="">Ver Rol</a>
    </li>    
    @endif
</ul>