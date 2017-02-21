<div class="ui-g">
    <div class="ui-g-12"> 
        <div class="card card-w-title">                                                                                                 
            <div class="ui-grid ui-grid-responsive">
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        @include('application.management.menu_options.partial.menu_menu_options')
                    </div>
                </div>

                <div class="EmptyBox10" ></div>                

                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <div class="text-center titulo">
                            <p><i class="fa fa-search"></i></p>
                            <p><h1 class="coolvetica-rg" >Ver Opción Menú.</h1></p>                
                        </div>
                    </div>
                </div>

                <div class="EmptyBox10" ></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="label" class="col-md-4 control-label">Etiqueta:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $menu_option->label }}
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="url" class="col-md-4 control-label">Url:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $menu_option->url }}
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="order" class="col-md-4 control-label">Orden:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $menu_option->order }}
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="type" class="col-md-4 control-label">Tipo:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $menu_option->type }}
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="state" class="col-md-4 control-label">Estado:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $menu_option->state }}
                    </div>                                                                                                                
                </div>

                <div class="EmptyBox10"></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="menu_parent_id" class="col-md-4 control-label">Menú Padre:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        <?php echo isset($menu_option->parent_menu_option)?$menu_option->parent_menu_option->label:''; ?>
                    </div>                                                                                                                
                </div>

                <div class="EmptyBox10"></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="created_at" class="col-md-4 control-label">Fecha creación:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $menu_option->created_at }}
                    </div>                                                                                                                
                </div>

                <div class="EmptyBox10"></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="updated_at" class="col-md-4 control-label">Fecha actualización:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $menu_option->updated_at }}
                    </div>                                                                                                                
                </div>
            </div>
        </div>
    </div>
</div>