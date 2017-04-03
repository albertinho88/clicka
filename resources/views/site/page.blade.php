@extends('layouts.app')

@section('content')

    @if($page->page_id != "home")
    <p-breadcrumb>
        <p-menuitem value=""></p-menuitem> 
        <p-menuitem value="{{ $page->name }}"></p-menuitem>    
    </p-breadcrumb>
    @endif    
        
    <div class="ui-fluid">
        <div class="ui-g dashboard">
            <div class="ui-g-12">
                <div class="{{ $page->container_class }}">
                    
                    @if($page->title != "")
                        <div class="text-center titulo">
                            <p><i class="fa fa-{{ $page->icon }}" ></i></p>
                            <p><h1 class="coolvetica-rg" >{{ $page->title }}.</h1></p>                
                        </div>
                    @endif
                    
                    @foreach($page_content as $pcontent)
                        <div class="ui-g-{{ $pcontent->columns_on_g  }} ui-md-{{ $pcontent->columns_on_md  }} ui-lg-{{ $pcontent->columns_on_lg  }}">
                            @if ($pcontent->content->cat_det_id_type == 'HTMLSEC')                            
                                @include('partial.htmlsection',['htmlsection' => $pcontent->content->htmlsection])                                                    
                            @elseif ($pcontent->content->cat_det_id_type == 'SLIDER')                            
                                @include('partial.slider')                            
                            @elseif ($pcontent->content->cat_det_id_type == 'FORM')                            
                                @include('partial.form')                            
                        @endif                        
                        </div>
                    @endforeach
                    
                </div>                
            </div>
        </div>
    </div>

    @include('partial.main_services')

@endsection