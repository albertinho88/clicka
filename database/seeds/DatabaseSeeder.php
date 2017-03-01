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
        $menuop2->url = 'application/management/users';        
        $menuop2->type = 'EXT';
        $menuop2->state = 'A';
        $menuop2->order = 1;
        $menuop2->menu_parent_id = $menuop1->menu_id;
        $menuop2->save();
        
        $menuop3 = new \App\MenuOption();
        $menuop3->label = 'Roles';
        $menuop3->url = 'application/management/roles';        
        $menuop3->type = 'EXT';
        $menuop3->state = 'A';
        $menuop3->order = 2;
        $menuop3->menu_parent_id = $menuop1->menu_id;
        $menuop3->save();
        
        $menuop4 = new \App\MenuOption();
        $menuop4->label = 'Opciones Menú';
        $menuop4->url = 'application/management/menu_options';        
        $menuop4->type = 'EXT';
        $menuop4->state = 'A';
        $menuop4->order = 3;
        $menuop4->menu_parent_id = $menuop1->menu_id;
        $menuop4->save();
        
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
