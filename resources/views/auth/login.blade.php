@extends('layouts.app')

@section('content')

<div class="ui-breadcrumb ui-module ui-widget ui-widget-header ui-helper-clearfix ui-corner-all" role="menu">
    <ul>
        <li role="menuitem"><a tabindex="-1" class="ui-menuitem-link ui-corner-all ui-icon ui-icon-home" href="#"><span class="ui-menuitem-text">Inicio</span></a></li>
        <li class="ui-breadcrumb-chevron ui-icon ui-icon-triangle-1-e"></li>
        <li role="menuitem"><a tabindex="-1" class="ui-menuitem-link ui-corner-all" href="#"><span class="ui-menuitem-text">Login</span></a></li>                   
    </ul>
</div>

<div class="">
    <div class="ui-g dashboard">
        <div class="ui-g-12"> 
            <div class="card card-w-title">
                <div class="text-center">
                    <p><i class="fa fa-lock" style="font-size: 40px; font-weight: bold;"></i></p>
                    <p><h1 class="coolvetica-rg" style="font-size: 28px;" >Login.</h1></p>                
                </div>
                
                <br />                                   
                
                <div class="ui-grid ui-grid-responsive">
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-2"></div>
                        <div class="ui-grid-col-8">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-2">
                                        <label for="email" class="col-md-4 control-label">E-Mail</label>
                                    </div>
                                    <div class="ui-grid-col-10">
                                        <input id="email" type="text" class="form-control" name="email" style="width: 90%;" value="{{ old('email') }}" autofocus>
                                    </div>
                                </div>
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-2"></div>
                                    <div class="ui-grid-col-10">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>                                                                                                                
                                </div>

                                <div class="EmptyBox20"></div>

                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-2">
                                        <label for="password" class="col-md-4 control-label">Password</label>
                                    </div>
                                    <div class="ui-grid-col-10">
                                        <input id="password" type="password" class="form-control" name="password" style="width: 90%;" value="{{ old('password') }}" >
                                    </div>
                                </div>
                                <div class="ui-grid-row">
                                    <div class="ui-grid-col-2"></div>
                                    <div class="ui-grid-col-10">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="EmptyBox20"></div>

                                <div class="ui-grid-row form-group">
                                    <div class="ui-grid-col-2">

                                    </div>
                                    <div class="ui-grid-col-10">
                                        <label for="remember" class="col-md-4 control-label">Recordarme</label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}>
                                    </div>
                                </div>

                                <div class="EmptyBox20"></div>

                                <div class="ui-grid-row form-group">
                                    <div class="ui-grid-col-12 text-center">
                                        <button id="btnLogin" type="submit" role="button" aria-disabled="false" is="p-button" icon="fa-sign-in" >
                                            Ingresar
                                        </button>                                                                       
                                    </div>                            
                                </div>
                                
                                <div class="EmptyBox20"></div>
                                
                                <div class="ui-grid-row form-group">
                                    <div class="ui-grid-col-12 text-center">
                                        <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                            Olvidaste tu contraseña?
                                        </a>
                                    </div>
                                </div> 
                                
                                <div class="EmptyBox20"></div>
                                
                                <div class="ui-grid-row form-group">
                                    <div class="ui-grid-col-12 text-left">                                                                                
                                        @if ($errors->has('general_message'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('general_message') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div> 
                            </form>
                        </div>
                        <div class="ui-grid-col-2"></div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection
