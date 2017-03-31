<div class="ui-g">
    <div class="ui-g-12"> 
        <div class="card card-w-title">                                                                                                 
            <div class="ui-grid ui-grid-responsive">
                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        @include('application.cms.pages.partial.menu_page')
                    </div>
                </div>

                <div class="EmptyBox10" ></div>                

                <div class="ui-grid-row">
                    <div class="ui-grid-col-12">
                        <div class="text-center titulo">
                            <p><i class="fa fa-search"></i></p>
                            <p><h1 class="coolvetica-rg" >Ver Página.</h1></p>                
                        </div>
                    </div>
                </div>
                
                <div class="EmptyBox10" ></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="page_id" class="col-md-4 control-label">Identificador:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $page->page_id }}
                    </div>                                                                                                                
                </div>
                
                <div class="EmptyBox10"></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="is_menu_item" class="col-md-4 control-label">Es menú item:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        <input type="checkbox" id="is_menu_item" name="is_menu_item" <?php echo $page->is_menu_item?'checked':''; ?> disabled="disabled"/>
                    </div>                                                                                                                
                </div>
                
                @if($page->is_menu_item)
                
                    <div class="EmptyBox10" ></div>
                    
                    <fieldset id="fldsMenu">
                        <legend>Propiedades Menú</legend>
                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="name" class="col-md-4 control-label">Nombre:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                {{ $page->name }}
                            </div>                                                                                                                
                        </div>

                        <div class="EmptyBox10"></div>

                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="label" class="col-md-4 control-label">Icono:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                {{ $page->icon }}
                            </div>                                                                                                                
                        </div>

                        <div class="EmptyBox10"></div>

                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="menu_class" class="col-md-4 control-label">Clases html:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                {{ $page->menu_class }}
                            </div>                                                                                                                
                        </div>

                        <div class="EmptyBox10"></div>

                        <div class="ui-grid-row">
                            <div class="ui-grid-col-2">                                            
                                <label for="order" class="col-md-4 control-label">Orden:</label>
                            </div>
                            <div class="ui-grid-col-10">
                                {{ $page->order }}
                            </div>                                                                                                                
                        </div>
                    </fieldset>
                
                @endif
                                                
                <div class="EmptyBox10"></div>
                
                <fieldset>
                    <legend>Contenido</legend>
                    
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-2">                                            
                            <label for="container_class" class="col-md-4 control-label">Clases Contenedor:</label>
                        </div>
                        <div class="ui-grid-col-10">
                            {{ $page->container_class }}
                        </div>                                                                                                                
                    </div>
                    
                    <div class="EmptyBox10"></div>
                    
                    <div class="ui-grid-row">
                        <div class="ui-grid-col-2">                                            
                            <label for="order" class="col-md-4 control-label">Título:</label>
                        </div>
                        <div class="ui-grid-col-10">
                            {{ $page->title }}
                        </div>                                                                                                                
                    </div>                                                                        
                    
                    <div id="divPageContent" class="{{ $page->container_class }}">
                        @foreach($page_content as $pcontent)
                            <div class="EmptyBox10"></div>
                            <div class="ui-grid-row">
                                <div class="ui-grid-col-12">                                
                                    @if ($pcontent->content->cat_det_id_type == 'HTMLSEC')                                                                                        
                                        <?php echo $pcontent->content->htmlsection->html_content; ?>
                                    @elseif ($pcontent->content->cat_det_id_type == 'SLIDER')                                    
                                        Slider
                                    @elseif ($pcontent->content->cat_det_id_type == 'FORM')                                    
                                        Formulario
                                    @endif 
                                </div>
                            </div>                        
                        @endforeach
                    </div>

                    
                </fieldset>
                
                <div class="EmptyBox10"></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="state" class="col-md-4 control-label">Estado:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $page->state }}
                    </div>                                                                                                                
                </div>

                <div class="EmptyBox10"></div>
                
                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="page_parent_id" class="col-md-4 control-label">Página Padre:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        <?php echo isset($page->parent_page)?$page->parent_page->name:''; ?>
                    </div>                                                                                                                
                </div>

                <div class="EmptyBox10"></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="created_at" class="col-md-4 control-label">Fecha creación:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $page->created_at }}
                    </div>                                                                                                                
                </div>

                <div class="EmptyBox10"></div>

                <div class="ui-grid-row">
                    <div class="ui-grid-col-2">                                            
                        <label for="updated_at" class="col-md-4 control-label">Fecha actualización:</label>
                    </div>
                    <div class="ui-grid-col-10">
                        {{ $page->updated_at }}
                    </div>                                                                                                                
                </div>
            </div>
        </div>
    </div>
</div>