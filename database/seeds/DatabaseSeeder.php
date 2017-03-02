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
        //$this->call(UsersTableSeeder::class);
        //$this->call(RolesTableSeeder::class);
        
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
        
        $menuop3 = new \App\MenuOption();
        $menuop3->label = 'Roles';
        $menuop3->icon = 'users';
        $menuop3->url = 'application/management/roles';        
        $menuop3->type = 'EXT';
        $menuop3->state = 'A';
        $menuop3->order = 2;
        $menuop3->menu_parent_id = $menuop1->menu_id;
        $menuop3->save();
        
        $menuop4 = new \App\MenuOption();
        $menuop4->label = 'Opciones Menú';
        $menuop4->icon = 'bars';
        $menuop4->url = 'application/management/menu_options';        
        $menuop4->type = 'EXT';
        $menuop4->state = 'A';
        $menuop4->order = 3;
        $menuop4->menu_parent_id = $menuop1->menu_id;
        $menuop4->save();
        
        $menuop7 = new \App\MenuOption();
        $menuop7->label = 'Servicios';
        $menuop7->icon = 'cubes';
        $menuop7->url = 'application/management/services';        
        $menuop7->type = 'EXT';
        $menuop7->state = 'A';
        $menuop7->order = 4;
        $menuop7->menu_parent_id = $menuop1->menu_id;
        $menuop7->save();
        
        
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
