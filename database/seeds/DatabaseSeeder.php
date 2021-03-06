<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CatalogsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        
        $user = new \App\User();
        $user->name = 'Julio Larraga';
        $user->email = 'jl@clicka.ec';
        $user->password = bcrypt('Crossfi++er88');
        $user->state = 'A';
        $user->save();
        
        $role = new \App\Role();
        $role->name = 'Administrador';
        $role->state = 'A';
        $role->save();
        
        $user_role = new \App\UserRole();
        $user_role->user_id = $user->user_id;
        $user_role->role_id = $role->role_id;
        $user_role->state = 'A';
        $user_role->save();
        
        $menuop1 = new \App\MenuOption();
        $menuop1->label = 'Administrador';
        $menuop1->icon = 'home';
        $menuop1->url = '#';        
        $menuop1->type = 'EXT';
        $menuop1->state = 'A';
        $menuop1->order = 1;
        $menuop1->save();
        
            $menuop2 = new \App\MenuOption();
            $menuop2->label = 'Usuarios';
            $menuop2->icon = 'user';
            $menuop2->url = 'application/management/users';        
            $menuop2->type = 'EXT';
            $menuop2->state = 'A';
            $menuop2->order = 1;
            $menuop2->menu_parent_id = $menuop1->menu_id;
            $menuop2->save();
            
                $menuop21 = new \App\MenuOption();
                $menuop21->label = 'Crear Usuario';
                $menuop21->icon = '';
                $menuop21->url = 'application/management/users/create';        
                $menuop21->type = 'INT';
                $menuop21->state = 'A';
                $menuop21->order = 1;
                $menuop21->menu_parent_id = $menuop2->menu_id;
                $menuop21->save();

                $menuop22 = new \App\MenuOption();
                $menuop22->label = 'Editar Usuario';
                $menuop22->icon = '';
                $menuop22->url = 'application/management/users/edit/{user_id}';        
                $menuop22->type = 'INT';
                $menuop22->state = 'A';
                $menuop22->order = 2;
                $menuop22->menu_parent_id = $menuop2->menu_id;
                $menuop22->save();

                $menuop23 = new \App\MenuOption();
                $menuop23->label = 'Ver Usuario';
                $menuop23->icon = '';
                $menuop23->url = 'application/management/users/show/{user_id}';        
                $menuop23->type = 'INT';
                $menuop23->state = 'A';
                $menuop23->order = 3;
                $menuop23->menu_parent_id = $menuop2->menu_id;
                $menuop23->save();

            $menuop3 = new \App\MenuOption();
            $menuop3->label = 'Roles';
            $menuop3->icon = 'users';
            $menuop3->url = 'application/management/roles';        
            $menuop3->type = 'EXT';
            $menuop3->state = 'A';
            $menuop3->order = 2;
            $menuop3->menu_parent_id = $menuop1->menu_id;
            $menuop3->save();
            
                $menuop31 = new \App\MenuOption();
                $menuop31->label = 'Crear Rol';
                $menuop31->icon = '';
                $menuop31->url = 'application/management/roles/create';        
                $menuop31->type = 'INT';
                $menuop31->state = 'A';
                $menuop31->order = 1;
                $menuop31->menu_parent_id = $menuop3->menu_id;
                $menuop31->save();

                $menuop32 = new \App\MenuOption();
                $menuop32->label = 'Editar Rol';
                $menuop32->icon = '';
                $menuop32->url = 'application/management/roles/edit/{role_id}';        
                $menuop32->type = 'INT';
                $menuop32->state = 'A';
                $menuop32->order = 2;
                $menuop32->menu_parent_id = $menuop3->menu_id;
                $menuop32->save();

                $menuop33 = new \App\MenuOption();
                $menuop33->label = 'Ver Rol';
                $menuop33->icon = '';
                $menuop33->url = 'application/management/roles/show/{role_id}';        
                $menuop33->type = 'INT';
                $menuop33->state = 'A';
                $menuop33->order = 3;
                $menuop33->menu_parent_id = $menuop3->menu_id;
                $menuop33->save();

            $menuop4 = new \App\MenuOption();
            $menuop4->label = 'Opciones Menú';
            $menuop4->icon = 'bars';
            $menuop4->url = 'application/management/menu_options';        
            $menuop4->type = 'EXT';
            $menuop4->state = 'A';
            $menuop4->order = 3;
            $menuop4->menu_parent_id = $menuop1->menu_id;
            $menuop4->save();

                $menuop41 = new \App\MenuOption();
                $menuop41->label = 'Crear Opción Menú';
                $menuop41->icon = '';
                $menuop41->url = 'application/management/menu_options/create';        
                $menuop41->type = 'INT';
                $menuop41->state = 'A';
                $menuop41->order = 1;
                $menuop41->menu_parent_id = $menuop4->menu_id;
                $menuop41->save();

                $menuop42 = new \App\MenuOption();
                $menuop42->label = 'Editar Opción Menú';
                $menuop42->icon = '';
                $menuop42->url = 'application/management/menu_options/edit/{menu_id}';        
                $menuop42->type = 'INT';
                $menuop42->state = 'A';
                $menuop42->order = 2;
                $menuop42->menu_parent_id = $menuop4->menu_id;
                $menuop42->save();

                $menuop43 = new \App\MenuOption();
                $menuop43->label = 'Ver Opción Menú';
                $menuop43->icon = '';
                $menuop43->url = 'application/management/menu_options/show/{menu_id}';        
                $menuop43->type = 'INT';
                $menuop43->state = 'A';
                $menuop43->order = 3;
                $menuop43->menu_parent_id = $menuop4->menu_id;
                $menuop43->save();
            
                $menuop9 = new \App\MenuOption();
                $menuop9->label = 'Catálogos';
                $menuop9->icon = 'puzzle-piece';
                $menuop9->url = 'application/management/catalogs';        
                $menuop9->type = 'EXT';
                $menuop9->state = 'A';
                $menuop9->order = 4;
                $menuop9->menu_parent_id = $menuop1->menu_id;
                $menuop9->save();

                        $menuop91 = new \App\MenuOption();
                        $menuop91->label = 'Crear Catálogo';
                        $menuop91->icon = '';
                        $menuop91->url = 'application/management/catalogs/create';        
                        $menuop91->type = 'INT';
                        $menuop91->state = 'A';
                        $menuop91->order = 1;
                        $menuop91->menu_parent_id = $menuop9->menu_id;
                        $menuop91->save();

                        $menuop92 = new \App\MenuOption();
                        $menuop92->label = 'Editar Catálogo';
                        $menuop92->icon = '';
                        $menuop92->url = 'application/management/catalogs/edit/{catalog_id}';        
                        $menuop92->type = 'INT';
                        $menuop92->state = 'A';
                        $menuop92->order = 2;
                        $menuop92->menu_parent_id = $menuop9->menu_id;
                        $menuop92->save();

                        $menuop93 = new \App\MenuOption();
                        $menuop93->label = 'Ver Catálogo';
                        $menuop93->icon = '';
                        $menuop93->url = 'application/management/catalogs/show/{catalog_id}';        
                        $menuop93->type = 'INT';
                        $menuop93->state = 'A';
                        $menuop93->order = 3;
                        $menuop93->menu_parent_id = $menuop9->menu_id;
                        $menuop93->save();                            
        
        
        $menuop5 = new \App\MenuOption();
        $menuop5->label = 'Ventas';
        $menuop5->icon = 'tags';
        $menuop5->url = '#';        
        $menuop5->type = 'EXT';
        $menuop5->state = 'A';
        $menuop5->order = 2;
        $menuop5->save();
            
            $menuop701 = new \App\MenuOption();
            $menuop701->label = 'Impuestos';
            $menuop701->icon = 'money';
            $menuop701->url = 'application/sales/taxes';        
            $menuop701->type = 'EXT';
            $menuop701->state = 'A';
            $menuop701->order = 1;
            $menuop701->menu_parent_id = $menuop5->menu_id;
            $menuop701->save();

                            $menuop7011 = new \App\MenuOption();
                            $menuop7011->label = 'Crear Impuesto';
                            $menuop7011->icon = '';
                            $menuop7011->url = 'application/sales/taxes/create';        
                            $menuop7011->type = 'INT';
                            $menuop7011->state = 'A';
                            $menuop7011->order = 1;
                            $menuop7011->menu_parent_id = $menuop701->menu_id;
                            $menuop7011->save();

                            $menuop7012 = new \App\MenuOption();
                            $menuop7012->label = 'Editar Impuesto';
                            $menuop7012->icon = '';
                            $menuop7012->url = 'application/sales/taxes/edit/{tax_id}';        
                            $menuop7012->type = 'INT';
                            $menuop7012->state = 'A';
                            $menuop7012->order = 2;
                            $menuop7012->menu_parent_id = $menuop701->menu_id;
                            $menuop7012->save();

                            $menuop7013 = new \App\MenuOption();
                            $menuop7013->label = 'Ver Impuesto';
                            $menuop7013->icon = '';
                            $menuop7013->url = 'application/sales/taxes/show/{tax_id}';        
                            $menuop7013->type = 'INT';
                            $menuop7013->state = 'A';
                            $menuop7013->order = 3;
                            $menuop7013->menu_parent_id = $menuop701->menu_id;
                            $menuop7013->save();
                            
            $menuop601 = new \App\MenuOption();
            $menuop601->label = 'Categorías de Items';
            $menuop601->icon = 'filter';
            $menuop601->url = 'application/sales/item_types';        
            $menuop601->type = 'EXT';
            $menuop601->state = 'A';
            $menuop601->order = 2;
            $menuop601->menu_parent_id = $menuop5->menu_id;
            $menuop601->save();

                    $menuop6011 = new \App\MenuOption();
                    $menuop6011->label = 'Crear Categoría de Items';
                    $menuop6011->icon = '';
                    $menuop6011->url = 'application/sales/item_types/create';        
                    $menuop6011->type = 'INT';
                    $menuop6011->state = 'A';
                    $menuop6011->order = 1;
                    $menuop6011->menu_parent_id = $menuop601->menu_id;
                    $menuop6011->save();

                    $menuop6012 = new \App\MenuOption();
                    $menuop6012->label = 'Editar Categoría de Items';
                    $menuop6012->icon = '';
                    $menuop6012->url = 'application/sales/item_types/edit/{item_type_id}';        
                    $menuop6012->type = 'INT';
                    $menuop6012->state = 'A';
                    $menuop6012->order = 2;
                    $menuop6012->menu_parent_id = $menuop601->menu_id;
                    $menuop6012->save();

                    $menuop6013 = new \App\MenuOption();
                    $menuop6013->label = 'Ver Categoría de Items';
                    $menuop6013->icon = '';
                    $menuop6013->url = 'application/sales/item_types/show/{item_type_id}';        
                    $menuop6013->type = 'INT';
                    $menuop6013->state = 'A';
                    $menuop6013->order = 3;
                    $menuop6013->menu_parent_id = $menuop601->menu_id;
                    $menuop6013->save();
        
            $menuop501 = new \App\MenuOption();
            $menuop501->label = 'Items de Venta';
            $menuop501->icon = 'shopping-bag';
            $menuop501->url = 'application/sales/sales_items';        
            $menuop501->type = 'EXT';
            $menuop501->state = 'A';
            $menuop501->order = 3;
            $menuop501->menu_parent_id = $menuop5->menu_id;
            $menuop501->save();
            
                $menuop5011 = new \App\MenuOption();
                $menuop5011->label = 'Crear Item de Venta';
                $menuop5011->icon = '';
                $menuop5011->url = 'application/sales/sales_items/create';        
                $menuop5011->type = 'INT';
                $menuop5011->state = 'A';
                $menuop5011->order = 1;
                $menuop5011->menu_parent_id = $menuop501->menu_id;
                $menuop5011->save();

                $menuop5012 = new \App\MenuOption();
                $menuop5012->label = 'Editar Item de Venta';
                $menuop5012->icon = '';
                $menuop5012->url = 'application/sales/sales_items/edit/{sales_item_id}';        
                $menuop5012->type = 'INT';
                $menuop5012->state = 'A';
                $menuop5012->order = 2;
                $menuop5012->menu_parent_id = $menuop501->menu_id;
                $menuop5012->save();

                $menuop5013 = new \App\MenuOption();
                $menuop5013->label = 'Ver Item de Venta';
                $menuop5013->icon = '';
                $menuop5013->url = 'application/sales/sales_items/show/{sales_item_id}';        
                $menuop5013->type = 'INT';
                $menuop5013->state = 'A';
                $menuop5013->order = 3;
                $menuop5013->menu_parent_id = $menuop501->menu_id;
                $menuop5013->save();                            
        
            $menuop6 = new \App\MenuOption();
            $menuop6->label = 'Cotizar';
            $menuop6->icon = 'calculator';
            $menuop6->url = 'application/sales/quotation/create';        
            $menuop6->type = 'EXT';
            $menuop6->state = 'A';
            $menuop6->order = 4;
            $menuop6->menu_parent_id = $menuop5->menu_id;
            $menuop6->save();
            
        $menuop20 = new \App\MenuOption();
        $menuop20->label = 'Sitio Web';
        $menuop20->icon = 'sitemap';
        $menuop20->url = '#';        
        $menuop20->type = 'EXT';
        $menuop20->state = 'A';
        $menuop20->order = 3;
        $menuop20->save();
        
            $menuop8 = new \App\MenuOption();
            $menuop8->label = 'Archivos Multimedia';
            $menuop8->icon = 'file-image-o';
            $menuop8->url = 'application/management/media_files';        
            $menuop8->type = 'EXT';
            $menuop8->state = 'A';
            $menuop8->order = 0;
            $menuop8->menu_parent_id = $menuop20->menu_id;
            $menuop8->save();            
        
            $menuop201 = new \App\MenuOption();
            $menuop201->label = 'Páginas';
            $menuop201->icon = 'bars';
            $menuop201->url = 'application/cms/pages';        
            $menuop201->type = 'EXT';
            $menuop201->state = 'A';
            $menuop201->order = 1;
            $menuop201->menu_parent_id = $menuop20->menu_id;
            $menuop201->save();
                        
                $menuop2011 = new \App\MenuOption();
                $menuop2011->label = 'Crear Página';
                $menuop2011->icon = '';
                $menuop2011->url = 'application/cms/pages/create';        
                $menuop2011->type = 'INT';
                $menuop2011->state = 'A';
                $menuop2011->order = 1;
                $menuop2011->menu_parent_id = $menuop201->menu_id;
                $menuop2011->save();

                $menuop2012 = new \App\MenuOption();
                $menuop2012->label = 'Editar Página';
                $menuop2012->icon = '';
                $menuop2012->url = 'application/cms/pages/edit/{page_id}';        
                $menuop2012->type = 'INT';
                $menuop2012->state = 'A';
                $menuop2012->order = 2;
                $menuop2012->menu_parent_id = $menuop201->menu_id;
                $menuop2012->save();

                $menuop2013 = new \App\MenuOption();
                $menuop2013->label = 'Ver Página';
                $menuop2013->icon = '';
                $menuop2013->url = 'application/cms/pages/show/{page_id}';        
                $menuop2013->type = 'INT';
                $menuop2013->state = 'A';
                $menuop2013->order = 3;
                $menuop2013->menu_parent_id = $menuop201->menu_id;
                $menuop2013->save();
                
            $menuop301 = new \App\MenuOption();
            $menuop301->label = 'Sliders';
            $menuop301->icon = 'picture-o';
            $menuop301->url = 'application/cms/sliders';        
            $menuop301->type = 'EXT';
            $menuop301->state = 'A';
            $menuop301->order = 2;
            $menuop301->menu_parent_id = $menuop20->menu_id;
            $menuop301->save();
                        
                $menuop3011 = new \App\MenuOption();
                $menuop3011->label = 'Crear Slider';
                $menuop3011->icon = '';
                $menuop3011->url = 'application/cms/sliders/create';        
                $menuop3011->type = 'INT';
                $menuop3011->state = 'A';
                $menuop3011->order = 1;
                $menuop3011->menu_parent_id = $menuop301->menu_id;
                $menuop3011->save();

                $menuop3012 = new \App\MenuOption();
                $menuop3012->label = 'Editar Slider';
                $menuop3012->icon = '';
                $menuop3012->url = 'application/cms/sliders/edit/{slider_id}';        
                $menuop3012->type = 'INT';
                $menuop3012->state = 'A';
                $menuop3012->order = 2;
                $menuop3012->menu_parent_id = $menuop301->menu_id;
                $menuop3012->save();

                $menuop3013 = new \App\MenuOption();
                $menuop3013->label = 'Ver Slider';
                $menuop3013->icon = '';
                $menuop3013->url = 'application/cms/sliders/show/{slider_id}';        
                $menuop3013->type = 'INT';
                $menuop3013->state = 'A';
                $menuop3013->order = 3;
                $menuop3013->menu_parent_id = $menuop301->menu_id;
                $menuop3013->save();
                
            $menuop7 = new \App\MenuOption();
            $menuop7->label = 'Servicios';
            $menuop7->icon = 'cubes';
            $menuop7->url = 'application/management/services';        
            $menuop7->type = 'EXT';
            $menuop7->state = 'A';
            $menuop7->order = 6;
            $menuop7->menu_parent_id = $menuop20->menu_id;
            $menuop7->save();
            
                $menuop71 = new \App\MenuOption();
                $menuop71->label = 'Crear Servicio';
                $menuop71->icon = '';
                $menuop71->url = 'application/management/services/create';        
                $menuop71->type = 'INT';
                $menuop71->state = 'A';
                $menuop71->order = 1;
                $menuop71->menu_parent_id = $menuop7->menu_id;
                $menuop71->save();

                $menuop72 = new \App\MenuOption();
                $menuop72->label = 'Editar Servicio';
                $menuop72->icon = '';
                $menuop72->url = 'application/management/services/edit/{service_id}';        
                $menuop72->type = 'INT';
                $menuop72->state = 'A';
                $menuop72->order = 2;
                $menuop72->menu_parent_id = $menuop7->menu_id;
                $menuop72->save();

                $menuop73 = new \App\MenuOption();
                $menuop73->label = 'Ver Servicio';
                $menuop73->icon = '';
                $menuop73->url = 'application/management/services/show/{service_id}';        
                $menuop73->type = 'INT';
                $menuop73->state = 'A';
                $menuop73->order = 3;
                $menuop73->menu_parent_id = $menuop7->menu_id;
                $menuop73->save();
        
        $all_menu_options = \App\MenuOption::all();
        
        foreach ($all_menu_options as $menop) :
            $role_menu = new \App\RoleMenuOption();
            $role_menu->role_id = $role->role_id;
            $role_menu->menu_id = $menop->menu_id;
            $role_menu->state = 'A';
            $role_menu->save();
        endforeach;             
    }
}
