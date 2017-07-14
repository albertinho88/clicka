<div class="ui-g">
    <div class="ui-g-12"> 
        <div class="card card-w-title">                                                                                                 
            <div class="ui-grid ui-grid-responsive">
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        @include('application.sales.item_types.partial.menu_item_types')
                    </div>
                </div>

                <div class="EmptyBox10" ></div>                

                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <div class="text-center titulo">
                            <p><i class="fa fa-search"></i></p>
                            <p><h1 class="coolvetica-rg" >Ver Categoría de Items.</h1></p>                
                        </div>
                    </div>
                </div>

                <div class="EmptyBox10" ></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="item_type_id" class="col-md-4 control-label">Identificador:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $item_type->item_type_id }}
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="name" class="col-md-4 control-label">Nombre:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $item_type->name }}
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="description" class="col-md-4 control-label">Descripción:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $item_type->description }}
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="state" class="col-md-4 control-label">Estado:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $item_type->state }}
                    </div>                                                                                                                
                </div>                                
                
                <div class="EmptyBox10"></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="created_at" class="col-md-4 control-label">Fecha creación:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $item_type->created_at }}
                    </div>                                                                                                                
                </div>

                <div class="EmptyBox10"></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="updated_at" class="col-md-4 control-label">Fecha actualización:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $item_type->updated_at }}
                    </div>                                                                                                                
                </div>
            </div>
        </div>
    </div>
</div>