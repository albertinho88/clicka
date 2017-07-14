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

<div class="ui-grid-row">
    <div class="ui-grid-col-2">                                            
        <label for="description" class="col-md-4 control-label">Descripción:</label>
    </div>
    <div class="ui-grid-col-10">
        <input id="description" name="description" type="text" autocomplete="off" class="form-control" value="{{ $item_type->description }}" maxlength="100" />
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
        <label for="state" class="col-md-4 control-label">Estado:</label>
    </div>
    <div class="ui-grid-col-10">                                
        <select id="state" name="state" class="selectOneMenu">
            <option value="">Seleccionar</option>
            <option value="A" <?php echo $item_type->state=='A'?'selected':''; ?> >Activo</option>
            <option value="I" <?php echo $item_type->state=='I'?'selected':''; ?>>Inactivo</option> 
        </select>
    </div>                                                                                                                
</div>
<div class="ui-grid-row">
    <div class="ui-grid-col-2"></div>
    <div class="ui-grid-col-10">
        <span id="state_help_block" class="help-block">
            @if ($errors->has('state'))                                                    
                <strong>{{ $errors->first('state') }}</strong>                                                    
            @endif
        </span>
    </div>
</div>

<div class="EmptyBox20"></div>

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