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
                        <input type="hidden" id="user_id" name="user_id" value="{{ $user->user_id }}">
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
                                {{ $user->email }}
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
                        
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="roles" class="col-md-4 control-label">Roles:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                <div class="ui-grid ui-grid-responsive">
                                    <div class="ui-grid-row">
                                        <div class="ui-grid-col-12">                                            
                                            <div id="j_idt89" class="ui-selectmanymenu ui-inputfield ui-widget ui-widget-content ui-corner-all" style="width:95%;">
                                                <div class="ui-selectlistbox-listcontainer" style="height:auto">
                                                    <ul class="ui-selectlistbox-list">                                                        
                                                        @foreach($active_roles as $actrole)
                                                        <li class="ui-selectlistbox-item ui-corner-all">
                                                            <input type="checkbox" name="user_roles[]" 
                                                                   id="{{ $actrole->role_id }}" value="{{ $actrole->role_id }}"                                                                    
                                                                   <?php echo $actrole->selected; ?> />
                                                            {{ $actrole->name }}
                                                        </li>
                                                        @endforeach                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                                                                                                                
                        </div>
                        
                        <div class="EmptyBox10"></div>

                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="created_at" class="col-md-4 control-label">Fecha creación:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                {{ $user->created_at }}
                            </div>                                                                                                                
                        </div>

                        <div class="EmptyBox10"></div>

                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="updated_at" class="col-md-4 control-label">Fecha actualización:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                {{ $user->updated_at }}
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
