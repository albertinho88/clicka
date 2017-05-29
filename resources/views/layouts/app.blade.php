<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        
        <title>Clicka - Servicios TI</title>
        
        <link rel="shortcut icon" type="image/png" href="{{ asset('_resource/images/favicon.png') }}"/>
                
        <link href="{{ asset('_resource/primeui-4.1.15/primeui.css') }}" type="text/css" rel="stylesheet">
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
        
        
        <link href="{{ asset('_resource/css/custom_styles.css') }}" type="text/css" rel="stylesheet">            
            
        <script src="{{ asset('_resource/js/nanoscroller.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/js/layout.js') }}" type="text/javascript"></script>    
        <script src="{{ asset('_resource/js/swipe.js') }}" type="text/javascript"></script>    
        <script src="{{ asset('_resource/responsive_slide/responsiveslides.min.js') }}" type="text/javascript"></script>
        
        <script src="{{ asset('_resource/primeui-4.1.15/x-tag-core.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/primeui-4.1.15/primeui.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/primeui-4.1.15/primeelements.js') }}" type="text/javascript"></script>
        <script src="{{ asset('_resource/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
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

                    @include('partial.site_menu')
                    
                </div>                                
            </div>            
            
            
            <div class="layout-menu-container">
                <div class="nano">
                    <div class="nano-content menu-scroll-content">
                        <div class="search-input">
                            <!--<input type="text" placeholder="Search" />
                            <i class="fa fa-search"></i>-->
                        </div>                        
                        
                        @include('partial.left_menu')
                        
                        <div class="layout-menu-footer">
                            <!-- layout menu footer -->
                        </div>                                                                                                                
                    </div>
                </div>
            </div>            
            
            <div class="layout-main">
                <div class="layout-main-content">
                    <div class="ui-grid-row">
                        @yield('content')                    
                    </div>
                </div>                
                <div class="footer">
                    <div class="card clearfix">
                        <span class="footer-text-left">
                            <img class="" style="height:50px;" src="{{ asset('_resource/images/clicka/clicka-logo-verde-2016.svg') }}">
                        </span>
                        <span class="footer-text-right">
                            <span class="ui-icon ui-icon-copyright"></span>  
                            <span>Todos los derechos reservados. </span>                            
                        </span>
                    </div>                    
                </div>
            </div>
        </div>
        
        <div id="growlel"></div> 
        
    </body>
</html>