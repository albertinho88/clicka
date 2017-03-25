@extends('layouts.app')

@section('content')

    @if($page->page_id != "home")
    <p-breadcrumb>
        <p-menuitem value=""></p-menuitem> 
        <p-menuitem value="{{ $page->name }}"></p-menuitem>    
    </p-breadcrumb>
    @endif    
        
    <div class="ui-fluid">
        <div class="ui-g">
            <div class="ui-g-12">
                <div class="{{ $page->container_class }}">
                    
                    @if($page->title != "")
                        <div class="text-center titulo">
                            <p><i class="fa fa-{{ $page->icon }}" ></i></p>
                            <p><h1 class="coolvetica-rg" >{{ $page->title }}.</h1></p>                
                        </div>
                    @endif
                    
                    
                    
                </div>                
            </div>
        </div>
    </div>

    @include('partial.main_services')

@endsection