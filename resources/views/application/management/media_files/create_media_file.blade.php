@extends('layouts.app')

@section('content')

<div id="formAjax" class="ui-fluid">
    <div class="ui-g" >
        <div class="ui-g-12"> 
            <div class="card card-w-title">                                                                                                 
                <div class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            @include('application.management.media_files.partial.menu_media_file')
                        </div>
                    </div>
                    
                    <div class="EmptyBox10" ></div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection