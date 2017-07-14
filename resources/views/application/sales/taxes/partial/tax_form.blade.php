<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if (isset($tax->tax_id))

<div class="ui-grid-row">
    <div class="ui-grid-col-2">                                            
        <label for="tax_id" class="col-md-4 control-label">Identificador:</label>
    </div>
    <div class="ui-grid-col-10">
        {{ $tax->tax_id }}                
    </div>                                                                                                                
</div>

@endif

<div class="EmptyBox20"></div>

<div class="ui-grid-row">
    <div class="ui-grid-col-2">                                            
        <label for="name" class="col-md-4 control-label">Nombre:</label>
    </div>
    <div class="ui-grid-col-10">
        <input id="name" name="name" type="text" autocomplete="off" class="form-control" value="{{ $tax->name }}" maxlength="25" />
    </div>                                                                                                                
</div>
<div class="ui-grid-row">
    <div class="ui-grid-col-2"></div>
    <div class="ui-grid-col-10">
        <span id="name_help_block" class="help-block">
            @if ($errors->has('name'))                                                    
                <strong>{{ $errors->first('name') }}</strong>                                                    
            @endif
        </span>
    </div>
</div> 

<div class="EmptyBox10"></div>

<div class="ui-grid-row">
    <div class="ui-grid-col-2">                                            
        <label for="description" class="col-md-4 control-label">Descripción:</label>
    </div>
    <div class="ui-grid-col-10">
        <input id="description" name="description" type="text" autocomplete="off" class="form-control" value="{{ $tax->description }}" maxlength="100" />
    </div>                                                                                                                
</div>
<div class="ui-grid-row">
    <div class="ui-grid-col-2"></div>
    <div class="ui-grid-col-10">
        <span id="description_help_block" class="help-block">
            @if ($errors->has('description'))                                                    
                <strong>{{ $errors->first('description') }}</strong>                                                    
            @endif
        </span>
    </div>
</div>                                                

<div class="EmptyBox10"></div>

<div class="ui-grid-row">
    <div class="ui-grid-col-2">                                            
        <label for="name" class="col-md-4 control-label">Valor (Ej. 12.00):</label>
    </div>
    <div class="ui-grid-col-10">
        <input id="percentage" name="percentage" type="text" autocomplete="off" class="form-control" value="{{ $tax->percentage }}" maxlength="9" />
    </div>                                                                                                                
</div>
<div class="ui-grid-row">
    <div class="ui-grid-col-2"></div>
    <div class="ui-grid-col-10">
        <span id="percentage_help_block" class="help-block">
            @if ($errors->has('percentage'))                                                    
                <strong>{{ $errors->first('percentage') }}</strong>                                                    
            @endif
        </span>
    </div>
</div> 

<div class="EmptyBox10"></div>

<div class="ui-grid-row">
    <div class="ui-grid-col-2">                                            
        <label for="init_date" class="col-md-4 control-label">Inicio Vigencia:</label>
    </div>
    <div class="ui-grid-col-10">
        <input id="init_date" name="init_date" type="text" class="datepicker-ui form-control" autocomplete="off" value="{{ $tax->init_date }}" />
    </div>                                                                                                                
</div>
<div class="ui-grid-row">
    <div class="ui-grid-col-2"></div>
    <div class="ui-grid-col-10">
        <span id="init_date_help_block" class="help-block">
            @if ($errors->has('init_date'))                                                    
                <strong>{{ $errors->first('init_date') }}</strong>                                                    
            @endif
        </span>
    </div>
</div>  

<div class="EmptyBox10"></div>

<div class="ui-grid-row">
    <div class="ui-grid-col-2">                                            
        <label for="expiration_date" class="col-md-4 control-label">Fin Vigencia:</label>
    </div>
    <div class="ui-grid-col-10">        
        <input id="expiration_date" name="expiration_date" type="text" class="datepicker-ui form-control" autocomplete="off" value="{{ $tax->expiration_date }}" />        
    </div>                                                                                                                
</div>
<div class="ui-grid-row">
    <div class="ui-grid-col-2"></div>
    <div class="ui-grid-col-10">
        <span id="expiration_date_help_block" class="help-block">
            @if ($errors->has('expiration_date'))                                                    
                <strong>{{ $errors->first('expiration_date') }}</strong>                                                    
            @endif
        </span>
    </div>
</div> 

<div class="EmptyBox10"></div>

<div class="ui-grid-row text-center">
    <div class="ui-grid-col-12" >                                                                                         
        <button type="submit" role="button" aria-disabled="false" is="p-button" icon="fa-floppy-o" class="width_auto" >
            Guardar
        </button>
        <button type="button" role="button" aria-disabled="false" is="p-button" icon="fa-ban" class="width_auto" onclick="window.history.go(-1);">
            Cancelar
        </button>
    </div>
</div> 