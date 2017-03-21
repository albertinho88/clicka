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
                
            $menuop8 = new \App\MenuOption();
            $menuop8->label = 'Archivos Multimedia';
            $menuop8->icon = 'file-image-o';
            $menuop8->url = 'application/management/media_files';        
            $menuop8->type = 'EXT';
            $menuop8->state = 'A';
            $menuop8->order = 5;
            $menuop8->menu_parent_id = $menuop1->menu_id;
            $menuop8->save();
                
                /*$menuop81 = new \App\MenuOption();
                $menuop81->label = 'Subir Archivo Multimedia';
                $menuop81->icon = '';
                $menuop81->url = 'application/management/media_files/create';        
                $menuop81->type = 'INT';
                $menuop81->state = 'A';
                $menuop81->order = 1;
                $menuop81->menu_parent_id = $menuop8->menu_id;
                $menuop81->save();*/

            $menuop7 = new \App\MenuOption();
            $menuop7->label = 'Servicios';
            $menuop7->icon = 'cubes';
            $menuop7->url = 'application/management/services';        
            $menuop7->type = 'EXT';
            $menuop7->state = 'A';
            $menuop7->order = 6;
            $menuop7->menu_parent_id = $menuop1->menu_id;
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
        
        
        $menuop5 = new \App\MenuOption();
        $menuop5->label = 'Procesos';
        $menuop5->icon = 'code-fork';
        $menuop5->url = '#';        
        $menuop5->type = 'EXT';
        $menuop5->state = 'A';
        $menuop5->order = 2;
        $menuop5->save();
        
            $menuop6 = new \App\MenuOption();
            $menuop6->label = 'Cotizar';
            $menuop6->icon = 'calculator';
            $menuop6->url = '#';        
            $menuop6->type = 'EXT';
            $menuop6->state = 'A';
            $menuop6->order = 1;
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
        
            $menuop201 = new \App\MenuOption();
            $menuop201->label = 'Inicio';
            $menuop201->icon = 'home';
            $menuop201->url = 'application/cms/home';        
            $menuop201->type = 'EXT';
            $menuop201->state = 'A';
            $menuop201->order = 1;
            $menuop201->menu_parent_id = $menuop20->menu_id;
            $menuop201->save();
            
            $menuop202 = new \App\MenuOption();
            $menuop202->label = 'Conócenos';
            $menuop202->icon = 'comment-o';
            $menuop202->url = 'application/cms/about_us';        
            $menuop202->type = 'EXT';
            $menuop202->state = 'A';
            $menuop202->order = 2;
            $menuop202->menu_parent_id = $menuop20->menu_id;
            $menuop202->save();
        
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
