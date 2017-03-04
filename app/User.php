<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * Get all of the user_role for the user.
     */
    public function users_roles()
    {
        return $this->hasMany('\App\UserRole', 'user_id');
    }
    
    /**
     * Get all of the user_role for the user.
     */
    public function active_users_roles()
    {
        return $this->hasMany('\App\UserRole')->where('state','A');
    }
    
    public function active_menu_options_per_role($selectedMenuPath)
    {
        return $this->getMenuTree(null,1,$selectedMenuPath);       
    }
    
    public function getMenuTree($idMenuParent, $nivel, $selectedMenuPath) {                
        if ($idMenuParent == null) {
            $menus = DB::table('menu_options')
                ->join('roles_menu_options','menu_options.menu_id','=','roles_menu_options.menu_id')
                ->join('roles','roles.role_id','=','roles_menu_options.role_id')
                ->join('users_per_roles','users_per_roles.role_id','=','roles.role_id')
                ->join('users','users_per_roles.user_id','=','users.user_id')
                ->where('roles.state','A')
                ->where('roles_menu_options.state','A')
                ->where('menu_options.state','A')
                ->where('users_per_roles.state','A')
                ->where('users.user_id',$this->user_id)
                ->where('menu_options.type','EXT')
                ->whereNull('menu_parent_id')
                ->orderBy('menu_options.order','asc')
                ->select('menu_options.*')
                ->distinct()
                ->get();
        } else {
            
            $menus = DB::table('menu_options')
                ->join('roles_menu_options','menu_options.menu_id','=','roles_menu_options.menu_id')
                ->join('roles','roles.role_id','=','roles_menu_options.role_id')
                ->join('users_per_roles','users_per_roles.role_id','=','roles.role_id')
                ->join('users','users_per_roles.user_id','=','users.user_id')
                ->where('roles.state','A')
                ->where('roles_menu_options.state','A')
                ->where('menu_options.state','A')
                ->where('users_per_roles.state','A')
                ->where('users.user_id',$this->user_id)
                ->where('menu_options.type','EXT')
                ->where('menu_parent_id',$idMenuParent)
                ->orderBy('menu_options.order','asc')
                ->select('menu_options.*')
                ->distinct()
                ->get();            
        }                
        
        if (!$menus->isEmpty()) :            
            $menu_tree = '';
        
            foreach ($menus as $menu) :
                
                $children_menu_option = $this->getMenuTree($menu->menu_id, $nivel+1, $selectedMenuPath);
                
                if ($children_menu_option != null):
                    $menu_tree .= '<li';
                    $menu_tree .= ' class="active-menuitem" ';
                    $menu_tree .= 'role="menuitem">';
                    $menu_tree .= '<a class="ripplelink">
                                    <i class="fa fa-fw fa-'.$menu->icon.'"></i>
                                    <span>'.$menu->label.'</span>
                                    <span class="ink animate"></span>
                                    <i class="fa fa-fw fa-angle-down"></i>
                                </a>';
                    $menu_tree .= '<ul role="menu" style="display: block;">'.$children_menu_option.'</ul></li>';                    
                else:
                    $menu_tree .= '<li role="menuitem"';
                    $menu_tree .= $menu->url == $selectedMenuPath ? ' class="active-menuitem" ' : '';
                    $menu_tree .= '>';
                    $menu_tree .= '<a href="'.url($menu->url).'" >
                                    <i class="fa fa-fw fa-'.$menu->icon.'"></i>
                                    <span>'.$menu->label.'</span>
                                </a>';
                    $menu_tree .= '</li>';
                endif;                                    
                                
            endforeach;  
            
            return $menu_tree;
        else :
            return null;
        endif;
    }
        
}
