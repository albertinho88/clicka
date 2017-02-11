@extends('layouts.app')

@section('content')

<div class="ui-g">
    <div class="ui-g-12"> 
        <div class="card card-w-title">                                                                                                 
            <div class="ui-grid ui-grid-responsive">                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <div class="text-center titulo">
                            <p>
                                <i class="fa fa-users" ></i>
                                <h1 class="coolvetica-rg" >Usuarios.</h1>
                            </p>                
                        </div>
                    </div>
                </div>
                
                
                <div class="EmptyBox10" ></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <div id="formAjax" style="display:none;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    $( document ).ready(function() {        
        $.ajax({
            url: '{{ route('list_users') }}',
            method: "GET",            
            dataType: "html",
            beforeSend: function (xhr) {                
                addLoadingMessage();
            }
        })
        .done(function( htmlResponse ) {
            setHtmlContent('formAjax',htmlResponse);            
            initComponents();            
            clearMessage();
        });
    });
    
</script>

@endsection