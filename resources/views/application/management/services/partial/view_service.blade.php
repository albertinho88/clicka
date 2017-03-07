<div class="ui-g">
    <div class="ui-g-12"> 
        <div class="card card-w-title">                                                                                                 
            <div class="ui-grid ui-grid-responsive">
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        @include('application.management.services.partial.menu_service')
                    </div>
                </div>

                <div class="EmptyBox10" ></div>                

                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <div class="text-center titulo">
                            <p><i class="fa fa-search"></i></p>
                            <p><h1 class="coolvetica-rg" >Ver Servicio.</h1></p>                
                        </div>
                    </div>
                </div>

                <div class="EmptyBox10" ></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="name" class="col-md-4 control-label">Nombre:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $service->name }}
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="name" class="col-md-4 control-label">Slogan:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $service->slogan }}
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="name" class="col-md-4 control-label">Icono:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $service->icon }}
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div>
                
                
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="name" class="col-md-4 control-label">Destacado:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        <input type="checkbox" id="featured" name="featured" <?php echo $service->featured?'checked':''; ?> disabled="disabled"/>
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="state" class="col-md-4 control-label">Estado:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $service->state }}
                    </div>                                                                                                                
                </div>                                

                <div class="EmptyBox10"></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="created_at" class="col-md-4 control-label">Fecha creación:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $service->created_at }}
                    </div>                                                                                                                
                </div>

                <div class="EmptyBox10"></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="updated_at" class="col-md-4 control-label">Fecha actualización:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $service->updated_at }}
                    </div>                                                                                                                
                </div>
            </div>
        </div>
    </div>
</div>