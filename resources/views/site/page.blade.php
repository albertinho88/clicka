@extends('layouts.app')

@section('content')

    @if($page->page_id != "home")
    <p-breadcrumb>
        <p-menuitem value=""></p-menuitem> 
        <p-menuitem value="{{ $page->name }}"></p-menuitem>    
    </p-breadcrumb>
    @endif
    
    <div class="ui-g">
        <div class="ui-g-12"> 
            <div class="card card-w-title">
                
                @if($page->title != "")
                    <div class="text-center titulo">
                        <p><i class="fa fa-{{ $page->icon }}" ></i></p>
                        <p><h1 class="coolvetica-rg" >{{ $page->title }}.</h1></p>                
                    </div>
                
                    <br />
                @endif               
                
                <!-- Slideshow 4 -->
                <div class="callbacks_container">
                  <ul class="rslides" id="slider1">
                    <li>
                      <img src="{{ asset('_resource/images/slider/slider_1.jpg')}}" alt="">
                      <!--<p class="caption">"Un software personalizado puede convertirse en el activo mas importante de tu empresa."</p>-->
                      <p class="caption">"Software a la Medida."</p>
                    </li>
                    <li>
                      <img src="{{ asset('_resource/images/slider/slider_1.jpg')}}" alt="">
                      <p class="caption">"Si tu negocio no está en internet, tu negocio no existe."</p>
                    </li>
                    <!--<li>
                      <img src="images/2.jpg" alt="">
                      <p class="caption">This is another caption</p>
                    </li>
                    <li>
                      <img src="images/3.jpg" alt="">
                      <p class="caption">The third caption</p>
                    </li>-->
                  </ul>
                </div>
            </div>
        </div>
    </div>
        
    <div class="ui-fluid">
        <div class="ui-g">
            <div class="ui-g-12">                
                
            </div>
        </div>
    </div>

    <script>
        $(function () {                                                
            // Slideshow 1
            $("#slider1").responsiveSlides({
              //maxwidth: 100%,
              speed: 800,
              auto: true,
              pager: false,
              nav: true,        
              namespace: "callbacks",
              before: function () {
                $('.events').append("<li>before event fired.</li>");
              },
              after: function () {
                $('.events').append("<li>after event fired.</li>");
              }
            });
        });
    </script>

    @include('partial.main_services')

@endsection