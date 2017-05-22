@extends('layouts.app')

@section('content')

<p-breadcrumb>
    <p-menuitem value=""></p-menuitem> 
    <p-menuitem value="Contáctanos"></p-menuitem>    
</p-breadcrumb>

<div class="ui-g dashboard">
    <div class="ui-g-12"> 
        <div class="card card-w-title">

            <div class="text-center titulo">
                <p><i class="fa fa-envelope" ></i></p>
                <p><h1 class="coolvetica-rg" >Contáctanos.</h1></p>                
            </div>

            <br />

            <div class="ui-grid ui-grid-responsive">                                    
                <div class="ui-grid-row">
                    <div class="ui-grid-col-1"></div>
                    <div class="ui-grid-col-10">

                        <div class="ui-grid ui-grid-responsive text-center">
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-6">
                                    <div class="OrangeBack White FontBold Fs20 BordRadHalf MarBot10" style="width:60px; height:42px; padding-top:18px; margin: 0 auto;">
                                        <i class="fa fa-envelope-o FloatNoneOnMobile FontBold" style="margin: 0 5px;"></i>
                                    </div>
                                    <p>info@clicka.ec</p>
                                </div>
                                <div class="ui-grid-col-6">
                                    <div class="OrangeBack White FontBold Fs20 BordRadHalf MarBot10" style="width:60px; height:42px; padding-top:18px; margin: 0 auto;">
                                        <i class="fa fa-phone FloatNoneOnMobile FontBold" style="margin: 0 5px;"></i>
                                    </div>
                                    <p>+593 99 5601 586</p>
                                </div>
                            </div>                        
                            <div class="EmptyBox20"></div>                                                                                            
                        </div>
                        
                        <div id="formAjax" >
                            @include('partial.contact_form')
                        </div>
                        
                    </div>
                    <div class="ui-grid-col-1"></div>
                </div>                                    
            </div>
            
            
        </div>
    </div>
</div>

@endsection