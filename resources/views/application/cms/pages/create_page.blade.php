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
                                <p><h1 class="coolvetica-rg" >Nueva Página.</h1></p>                
                            </div>
                        </div>
                    </div>

                    <form id="createPageForm" name="createPageForm" method="POST" action="{{ route('store_page') }}" class="ajaxJsonForm form-horizontal">                            
                            
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2">                                            
                                    <label for="page_id" class="col-md-4 control-label">Identificador:</label>
                                </div>
                                <div class="ui-grid-col-10">
                                    <input id="page_id" name="page_id" type="text" autocomplete="off"  class="form-control" />
                                </div>                                                                                                                
                            </div>
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-2"></div>
                                <div class="ui-grid-col-10">
                                    <span id="page_id_help_block" class="help-block">
                                        @if ($errors->has('page_id'))                                                    
                                            <strong>{{ $errors->first('page_id') }}</strong>                                                    
                                        @endif
                                    </span>
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