@extends('layouts.app')

@section('content')

<div id="formAjax" class="ui-fluid">
    <div class="ui-g">
        <div class="ui-g-12"> 
            <div class="card card-w-title">                                                                                                 
                <div id="divEditPage" class="ui-grid ui-grid-responsive">

                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            @include('application.cms.pages.partial.menu_page')
                        </div>
                    </div>

                    <div class="EmptyBox10" ></div>

                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <div class="text-center titulo">
                                <p><i class="fa fa-plus" ></i></p>
                                <p><h1 class="coolvetica-rg" >Editar Página.</h1></p>                
                            </div>
                        </div>
                    </div>

                    <form id="editPageForm" name="editPageForm" method="POST" action="{{ route('update_page') }}" class="ajaxJsonForm form-horizontal">
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="page_id" class="col-md-4 control-label">Identificador:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                {{ $page->page_id }}
                                <input type="hidden" name="page_id" value="{{ $page->page_id }}" />
                            </div>                                                                                                                
                        </div>

                        <div class="EmptyBox10"></div>
                        
                        @include('application.cms.pages.partial.page_form')
                    </form>                                           
                </div>
                
                @include('application.cms.pages.partial.add_edit_htmlsection')
                @include('application.cms.pages.partial.add_edit_slider')
                
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('../resources/assets/js/page_management.js') }}" type="text/javascript"></script>

@endsection