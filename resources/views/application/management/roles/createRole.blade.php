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
                                    <a href="{{ route('list_roles') }}" data-icon="fa-users">Roles</a>
                                </li>
                                <li>
                                    <a href="{{ route('create_role') }}" data-icon="fa-plus">Nuevo Rol</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            <div class="text-center titulo">
                                <p><i class="fa fa-user-plus" ></i></p>
                                <p><h1 class="coolvetica-rg" >Nuevo Rol.</h1></p>                
                            </div>
                        </div>
                    </div>
                    
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-12">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection