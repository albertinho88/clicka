<ul class="menubar">                                
    <li>
        <a href="{{ route('index_users') }}" data-icon="fa-users" class="">Usuarios</a>
    </li>
    <li>
        <a href="{{ route('create_user') }}" data-icon="fa-plus" class="">Nuevo Usuario</a>
    </li>
    @if(isset($user))
    <li>
        <a href="{{ route('edit_user',['user_id' => $user->user_id]) }}" data-icon="fa-pencil" class="">Editar Usuario</a>
    </li>    
    @endif
    @if(isset($user))
    <li>
        <a href="{{ route('show_user',['user_id' => $user->user_id]) }}" data-icon="fa-search" class="">Ver Usuario</a>
    </li>    
    @endif
</ul>