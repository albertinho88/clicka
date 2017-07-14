<div class="ui-g">
    <div class="ui-g-12"> 
        <div class="card card-w-title">                                                                                                 
            <div class="ui-grid ui-grid-responsive">
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        @include('application.sales.taxes.partial.menu_tax')
                    </div>
                </div>

                <div class="EmptyBox10" ></div>                

                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <div class="text-center titulo">
                            <p><i class="fa fa-search"></i></p>
                            <p><h1 class="coolvetica-rg" >Ver Impuesto.</h1></p>                
                        </div>
                    </div>
                </div>

                <div class="EmptyBox10" ></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="tax_id" class="col-md-4 control-label">Identificador:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $tax->tax_id }}
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="name" class="col-md-4 control-label">Nombre:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $tax->name }}
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="description" class="col-md-4 control-label">Descripción:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $tax->description }}
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="percentage" class="col-md-4 control-label">Porcentaje:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $tax->percentage }}
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="init_date" class="col-md-4 control-label">Inicio Vigencia:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $tax->init_date }}
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="expiration_date" class="col-md-4 control-label">Fin Vigencia:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $tax->expiration_date }}
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="created_at" class="col-md-4 control-label">Fecha creación:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $tax->created_at }}
                    </div>                                                                                                                
                </div>

                <div class="EmptyBox10"></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="updated_at" class="col-md-4 control-label">Fecha actualización:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $tax->updated_at }}
                    </div>                                                                                                                
                </div>
            </div>
        </div>
    </div>
</div>