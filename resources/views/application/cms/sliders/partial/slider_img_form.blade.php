<div class="ui-grid-row">
    <div class="ui-grid-col-12">
        <div class="text-center titulo">
            <p><i class="fa fa-hand-pointer-o" ></i></p>
            <p><h1 class="coolvetica-rg" >Seleccionar Archivo.</h1></p>                
        </div>
    </div>
</div>

<div class="EmptyBox10"></div>

<div id="div_files_tree" class="text-center"></div>
<form id="frmListMedia" >
    <div class="ui-grid ui-grid-responsive">
        <div class="ui-grid-row">
            <div class="ui-grid-col-12">                                                
                <input type="hidden" id="parent_dir" name="parent_dir" value="{{ $root_dir }}" />                                    
                <input type="hidden" name="_token" value="{{ csrf_token() }}">                                    
            </div>
        </div>
    </div>
</form>
