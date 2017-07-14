<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if (isset($item_type->item_type_id))

<div class="ui-grid-row">
    <div class="ui-grid-col-2">                                            
        <label for="item_type_id" class="col-md-4 control-label">Identificador:</label>
    </div>
    <div class="ui-grid-col-10">
        {{ $item_type->item_type_id }}                
    </div>                                                                                                                
</div>

@endif

<div class="EmptyBox20"></div>

<div class="ui-grid-row">
    <div class="ui-grid-col-2">                                            
        <label for="name" class="col-md-4 control-label">Nombre:</label>
    </div>
    <div class="ui-grid-col-10">
        <input id="name" name="name" type="text" autocomplete="off" class="form-control" value="{{ $item_type->name }}" maxlength="25" />
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