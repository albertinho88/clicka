
@if ($menu_left_per_user != null)
    
    <ul id="pm" class="layout-menu clearfix">        
        <?php  echo $menu_left_per_user; ?>
    </ul>
    <script type="text/javascript">PrimeFaces.cw("Poseidon", "me", {id: "pm"});</script>

    <!--<ul id="pm" class="layout-menu clearfix">        
        <li class="active-menuitem" role="menuitem">
            <a class="ripplelink">
                <i class="fa fa-fw fa-home"></i>
                <span>Administración</span>
                <span class="ink animate"></span>
                <i class="fa fa-fw fa-angle-down"></i>
            </a>
            <ul role="menu" style="display: block;">
                <li role="menuitem">
                    <a href="{{ route('index_users') }}" >
                        <i class="fa fa-fw fa-users"></i>
                        <span>Usuarios</span>
                    </a>                                            
                </li>
                <li role="menuitem">
                    <a href="{{ route('index_roles') }}" >
                        <i class="fa fa-fw fa-tree"></i>
                        <span>Roles</span>
                    </a>
                </li>
                <li role="menuitem">
                    <a href="{{ route('index_menu_options') }}" >
                        <i class="fa fa-fw fa-list"></i>
                        <span>Opciones Menú</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <script type="text/javascript">PrimeFaces.cw("Poseidon", "me", {id: "pm"});</script>--> 
@endif                                


