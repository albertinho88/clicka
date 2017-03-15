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
                    
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12"> 
                            <div id="prev-image" ></div>
                        </div>
                    </div>
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">                                                                                                                                                    
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input id="iptNewFile" name="new_file" type="file" style="width: 95%;" autocomplete="off" 
                                   accept=".jpg, .png, .jpeg, .gif, .bmp, .svg"/>
                        </div>
                    </div>
                </div>
                
                                        
                </form>
            </div>
        </div>
    </div>
</div>

@endsection