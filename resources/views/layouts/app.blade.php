<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        
        <title>Clicka - Servicios TI</title>
        
        <link href="{{ asset('_resource/theme.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('_resource/fa/font-awesome.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('_resource/components.css') }}" type="text/css" rel="stylesheet">
        
        <script src="{{ asset('_resource/jquery/jquery.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/core.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/components.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/jquery/jquery-plugins.js') }}" type="text/javascript"></script>        
        
        <link href="{{ asset('_resource/keyboard/keyboard.css') }}" type="text/css" rel="stylesheet">
        <script src="{{ asset('_resource/keyboard/keyboard.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/touch/touchswipe.js') }}" type="text/javascript"></script>                        
        
        <link href="{{ asset('_resource/css/nanoscroller.css') }}" type="text/css" rel="stylesheet">        
        <link href="{{ asset('_resource/css/animate.css') }}" type="text/css" rel="stylesheet">        
        <link href="{{ asset('_resource/css/layout-green.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('_resource/responsive_slide/responsiveslides.css') }}" type="text/css" rel="stylesheet">
        
        <link href="{{ asset('_resource/primeui-4.1.15/primeui.css') }}" type="text/css" rel="stylesheet">        
        <link href="{{ asset('_resource/css/custom_styles.css') }}" type="text/css" rel="stylesheet">            
            
        <script src="{{ asset('_resource/js/nanoscroller.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/js/layout.js') }}" type="text/javascript"></script>    
        <script src="{{ asset('_resource/js/swipe.js') }}" type="text/javascript"></script>    
        <script src="{{ asset('_resource/responsive_slide/responsiveslides.min.js') }}" type="text/javascript"></script>
        
        <script src="{{ asset('_resource/primeui-4.1.15/x-tag-core.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/primeui-4.1.15/primeui.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/primeui-4.1.15/primeelements.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/js/custom.js') }}" type="text/javascript"></script>
                
        
    </head>
    <body class="main-body">
        <div class="layout-wrapper {{ Auth::check() ? 'menu-layout-static' : 'menu-layout-overlay' }} ">
            
            <!-- Topbar -->
            <div class="topbar clearfix">
                <div class="topbar-left">            
                    <div class="logo"></div>
                </div>
                
                <div class="topbar-right">
                    @if (Auth::check())
                    <a id="menu-button" href="#">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    @endif

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
                        <li>
                            <a href="<?php echo url('contact_us'); ?>" class="topbar-link" >
                                <i class="topbar-icon fa fa-fw fa-envelope-o animated swing infinite"></i>
                                <span>Contáctanos</span>
                            </a>                            
                        </li>
                        <li>
                            <a href="<?php echo url('services'); ?>" class="topbar-link">
                                <i class="topbar-icon fa fa-fw fa-laptop"></i>
                                <span class="">Servicios</span>
                            </a>                            
                        </li>
                        <li>

                            <a href="<?php echo url('about_us'); ?>" class="topbar-link">
                                <i class="topbar-icon fa fa-fw fa-comment-o"></i>
                                <span class="">Conócenos</span>
                            </a>                            
                        </li>
                        <li class="profile-item">
                            <a href="<?php echo url('/'); ?>" class="topbar-link">                            
                                <i class="topbar-icon fa fa-fw fa-home"></i>
                                <span class="topbar-message">Inicio</span>
                            </a>                            
                        </li>                                                
                    </ul>
                </div>                                
            </div>            
            
            
            <div class="layout-menu-container">
                <div class="nano">
                    <div class="nano-content menu-scroll-content">
                        <div class="search-input">
                            <!--<input type="text" placeholder="Search" />
                            <i class="fa fa-search"></i>-->
                        </div>
                        
                            <ul id="pm" class="layout-menu clearfix">
                                @if (Auth::check())
                                    <li role="menuitem">
                                        <a href="/poseidon/dashboard.xhtml" class="ripplelink">
                                            <i class="fa fa-fw fa-home"></i>
                                            <span>Administración</span>
                                            <span class="ink animate"></span>
                                            <i class="fa fa-fw fa-angle-down"></i>
                                        </a>
                                        <ul role="menu">
                                            <li role="menuitem">
                                                <a href="{{ route('index_users') }}" >
                                                    <i class="fa fa-fw fa-users"></i>
                                                    <span>Usuarios</span>
                                                </a>                                            
                                            </li>
                                            <li role="menuitem">
                                                <a href="{{ route('list_roles') }}" >
                                                    <i class="fa fa-fw fa-tree"></i>
                                                    <span>Roles</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif                                
                            </ul>                            
                            <script type="text/javascript">PrimeFaces.cw("Poseidon", "me", {id: "pm"});</script>
                        
                        <div class="layout-menu-footer"></div>                                                                                                                
                    </div>
                </div>
            </div>            
            
            <div class="layout-main">
                <div class="layout-main-content">
                    @yield('content')                    
                </div>                
                <div class="footer">
                    <div class="card clearfix">
                        <span class="footer-text-left">
                            <img class="" style="height:50px;" src="{{ asset('_resource/images/clicka/clicka-logo-verde-2016.svg') }}">
                        </span>
                        <span class="footer-text-right">
                            <span class="ui-icon ui-icon-copyright"></span>  
                            <span>Todos los derechos reservados.</span>                                
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="growlel"></div>                  
    </body>
</html>