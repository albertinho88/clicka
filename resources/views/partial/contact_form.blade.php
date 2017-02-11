<div class="ui-grid ui-grid-responsive">
    <form id="contactForm" name="contactForm" method="POST" action="{{ route('contact_ajax') }}" class="ajaxJsonForm form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="subject" id="subject" value="Contáctenos | Clicka Soluciones TI" />
        
        <div class="ui-grid-row text-center">
            <div class="ui-grid-col-12">
                <p>Para mayor información, envíanos este formulario con tus datos.</p>

            </div>
        </div>
        
        <div class="EmptyBox10"></div>
        
        <div class="ui-grid-row">
            <div class="ui-grid-col-2">                                            
                <label for="name" class="col-md-4 control-label">Nombre:</label>
            </div>
            <div class="ui-grid-col-10">
                <input id="name" name="name" type="text" autocomplete="off" style="width: 90%;" class="form-control" />
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
                <input id="email" name="email" type="text" autocomplete="off"  style="width: 90%;" class="form-control"  />
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
                <label for="phone" class="col-md-4 control-label">Teléfono:</label>
            </div>
            <div class="ui-grid-col-10">
                <input id="phone" name="phone" type="text" autocomplete="off" style="width: 90%;" class="form-control"   />
            </div>
        </div>
        <div class="ui-grid-row">
            <div class="ui-grid-col-2"></div>
            <div class="ui-grid-col-10">
                <span id="phone_help_block" class="help-block">
                    @if ($errors->has('phone'))                                                    
                        <strong>{{ $errors->first('phone') }}</strong>                                                    
                    @endif
                </span>
            </div>
        </div>

        <div class="EmptyBox10"></div>

        <div class="ui-grid-row">
            <div class="ui-grid-col-2">
                <p class="etiqueta">Mensaje:</p>
            </div>
            <div class="ui-grid-col-10">
                <textarea id="message" name="message" style="width: 90%;"  ></textarea>                                                            
            </div>
        </div>
        <div class="ui-grid-row">
            <div class="ui-grid-col-2"></div>
            <div class="ui-grid-col-10">
                <span id="message_help_block" class="help-block">
                    @if ($errors->has('message'))                                                    
                        <strong>{{ $errors->first('message') }}</strong>                                                    
                    @endif
                </span>
            </div>
        </div>

        <div class="EmptyBox10"></div>

        <div class="ui-grid-row text-center">
            <div class="ui-grid-col-12" >                                                                                         
                <button type="submit" role="button" aria-disabled="false" is="p-button" icon="fa-send" >
                    Enviar
                </button>
            </div>
        </div>                                                                                                                                                                    
    </form>
</div>