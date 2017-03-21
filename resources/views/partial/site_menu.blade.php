<a id="topbar-menu-button" href="#">
    <i class="fa fa-bars"></i>
</a>
<ul class="topbar-items fadeInDown animated">
    @if (!Auth::check())
        <li>
            <a href="<?php echo url('login'); ?>" class="topbar-link" >
                <i class="topbar-icon fa fa-fw fa-lock"></i>
                <span>Login</span>
            </a>                            
        </li>
    @else 
        <li>
            <a style="cursor: pointer;">
                <i class="topbar-icon fa fa-fw fa-user"></i>
                <span>{{ Auth::user()->name }}</span>
            </a>

            <ul class="poseidon-menu animated fadeInDown">
                    <li role="menuitem">
                            <a href="#">
                                    <i class="fa fa-fw fa-user"></i>
                                    <span>Mi Perfil</span>
                            </a>
                    </li>
                    <li role="menuitem">
                            <a href="#">
                                    <i class="fa fa-fw fa-cog"></i>
                                    <span>Configuración</span>
                            </a>
                    </li>
                    <li role="menuitem">
                            <a href="<?php echo url('logout'); ?>">
                                    <i class="fa fa-fw fa-sign-out"></i>
                                    <span>Cerrar Sesión</span>
                            </a>
                    </li>
            </ul>
        </li>
    @endif
    
    <?php echo $site_menu; ?>
    
    

</ul>