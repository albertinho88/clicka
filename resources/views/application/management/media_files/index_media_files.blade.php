@extends('layouts.app')

@section('content')

<div class="ui-g">
    <div class="ui-g-12"> 
        <div class="card card-w-title">                                                                                                 
            <div class="ui-grid ui-grid-responsive">
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <ul class="menubar">                                    
                            <li>
                                <a  data-icon="fa-plus" class="">Subir Archivo</a>
                            </li>                            
                        </ul>
                    </div>
                </div>
                
                <div class="EmptyBox10" ></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <div class="text-center titulo">
                            <p>
                                <i class="fa fa-th-list" ></i>
                                <h1 class="coolvetica-rg" >Archivos Multimedia.</h1>
                            </p>                
                        </div>
                    </div>
                </div>

                <div class="EmptyBox10" ></div>                                
                
                <form id="frmListMedia" action="{{ route('list_media_files_json')  }}">
                    <input type="hidden" id="parent_dir" name="parent_dir" value="{{ $root_dir }}" />
                </form>
                <div id="div_files_tree" class="text-center"></div>
            </div>            
        </div>
    </div>
</div>

<script type="text/javascript">
$(function() {
    listMediaFiles();    
});

listMediaFiles = function() {
    $.ajax({
        type: "GET",
        url: $("#frmListMedia").attr("action"),
        data: $("#frmListMedia").serialize(),
        dataType: "html",
        context: this,
        beforeSend: function() {
           addLoadingMessage();           
        },       
        success: function(response) {             
            $("#div_files_tree").html(response);
            initUiComponents();            
            clearMessage();
            initCustomComponents();            
        }
    }).fail(function(e){
        addMessage([{severity: 'error', summary: '', detail: 'Ha ocurrido un error. Por favor intente más tarde.'}]);
    });
};

initCustomComponents = function() {
    $(".directory").click(function(){
        $("#parent_dir").val($("#parent_dir").val() + $(this).attr("id") + "/");
        listMediaFiles();
    });
};

</script>

@endsection