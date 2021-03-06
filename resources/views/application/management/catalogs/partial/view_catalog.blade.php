<div class="ui-g">
    <div class="ui-g-12"> 
        <div class="card card-w-title">                                                                                                 
            <div class="ui-grid ui-grid-responsive">
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        @include('application.management.catalogs.partial.menu_catalog')
                    </div>
                </div>

                <div class="EmptyBox10" ></div>                

                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <div class="text-center titulo">
                            <p><i class="fa fa-search"></i></p>
                            <p><h1 class="coolvetica-rg" >Ver Catálogo.</h1></p>                
                        </div>
                    </div>
                </div>
                
                <div class="EmptyBox10" ></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="catalog_id" class="col-md-4 control-label">Código:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $catalog->catalog_id }}
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10" ></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="name" class="col-md-4 control-label">Nombre:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $catalog->name }}
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="state" class="col-md-4 control-label">Estado:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $catalog->state }}
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div> 
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="state" class="col-md-4 control-label">Detalle:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        <ul>
                            @foreach ($catalog->catalog_details as $catdet) 
                                <li>{{ $catdet->catalog_detail_id.' - '.$catdet->value.' ('.$catdet->state.')' }}</li>
                            @endforeach
                        </ul>
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div> 

                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="created_at" class="col-md-4 control-label">Fecha creación:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $catalog->created_at }}
                    </div>                                                                                                                
                </div>

                <div class="EmptyBox10"></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="updated_at" class="col-md-4 control-label">Fecha actualización:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $catalog->updated_at }}
                    </div>                                                                                                                
                </div>
            </div>
        </div>
    </div>
</div>