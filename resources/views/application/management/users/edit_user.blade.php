@extends('layouts.app')

@section('content')

<div id="formAjax">
    <div class="ui-g" >
        <div class="ui-g-12"> 
            <div class="card card-w-title">                                                                                                 
                <div class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            @include('application.management.users.partial.menu_user')
                        </div>
                    </div>
                    
                    <div class="EmptyBox10" ></div>
                    
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <div class="text-center titulo">
                                <p><i class="fa fa-pencil" ></i></p>
                                <p><h1 class="coolvetica-rg" >Editar Usuario.</h1></p>                
                            </div>
                        </div>
                    </div>
                
                    <form id="editUserForm" name="editUserForm" method="POST" action="{{ route('update_user') }}" class="ajaxJsonForm form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="name" class="col-md-4 control-label">Nombre:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input id="name" name="name" type="text" autocomplete="off" style="width: 95%;" class="form-control" value="{{ $user->name }}" />
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
                                <label for="email" class="col-md-4 control-label">Email:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <input id="email" name="email" type="text" autocomplete="off" style="width: 95%;" class="form-control" value="{{ $user->email }}"/>
                            </div>                                                                                                                
                        </div>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2"></div>
                            <div class="ui-grid-col-10">
                                <span id="email_help_block" class="help-block">
                                    @if ($errors->has('email'))                                                    
                                        <strong>{{ $errors->first('email') }}</strong>                                                    
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
                                <select id="state" name="state">
                                    <option >Seleccionar</option>
                                    <option value="A" <?php echo $user->state=='A'?'selected':''; ?> >Activo</option>
                                    <option value="I" <?php echo $user->state=='I'?'selected':''; ?>>Inactivo</option> 
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
                        
                        <div class="EmptyBox10"></div>

                        <div class="ui-grid-row text-center">
                            <div class="ui-grid-col-12" >                                                                                         
                                <button type="submit" role="button" aria-disabled="false" is="p-button" icon="fa-floppy-o" >
                                    Guardar
                                </button>
                            </div>
                        </div> 
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
