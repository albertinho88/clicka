@extends('layouts.app')

@section('content')

<div id="formAjax" class="ui-fluid">
    <div class="ui-g">
        <div class="ui-g-12"> 
            <div class="card card-w-title">                                                                                                 
                <div id="divCreateEditSlider" class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            @include('application.cms.sliders.partial.menu_slider')
                        </div>
                    </div>

                    <div class="EmptyBox10" ></div>

                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <div class="text-center titulo">
                                <p><i class="fa fa-pencil" ></i></p>
                                <p><h1 class="coolvetica-rg" >Editar Slider.</h1></p>                
                            </div>
                        </div>
                    </div>

                    <form id="editSliderForm" name="editSliderForm" method="POST" action="{{ route('update_slider') }}" class="ajaxJsonForm form-horizontal">                        
                        <input type="hidden" name="slider_id" value="{{ $slider->slider_id }}" />                        
                        @include('application.cms.sliders.partial.slider_form')                        
                    </form>
                </div>
                
                <div id="divSelectFile" class="ui-grid ui-grid-responsive">
                    @include('application.cms.sliders.partial.slider_img_form')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection