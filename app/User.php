<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
    
    public function active_menu_options_per_role()
    {
        return $this->getMenuTree(null,1);
    }
    
    public function getMenuTree($idMenuParent, $nivel) {                
        if ($idMenuParent == null) {
            $menus = \App\MenuOption::whereNull('menu_parent_id')
                    ->whereIn('state',array('A'))
                    ->where('type','EXT')
                    ->orderBy('order','asc')
                    ->get();
        } else {
            $menus = \App\MenuOption::where('menu_parent_id','=',$idMenuParent)
                    ->whereIn('state',array('A'))
                    ->where('type','EXT')
                    ->orderBy('order','asc')
                    ->get();
        }
        
        $menu_tree = '';
        
        if (!$menus->isEmpty()) {            
            foreach ($menus as $menu) :
                                
                if ($menu->children_menu_option->count()>0):
                    $menu_tree .= '<li class="active-menuitem" role="menuitem">';
                    $menu_tree .= '<a class="ripplelink">
                                    <i class="fa fa-fw fa-home"></i>
                                    <span>'.$menu->label.'</span>
                                    <span class="ink animate"></span>
                                    <i class="fa fa-fw fa-angle-down"></i>
                                </a>';
                    $menu_tree .= '<ul>'.$this->getMenuTree($menu->menu_id, $nivel+1).'</ul></li>';                    
                else:
                    $menu_tree .= '<li role="menuitem">';
                    $menu_tree .= '<a href="'.url($menu->url).'" >
                                    <i class="fa fa-fw fa-home"></i>
                                    <span>'.$menu->label.'</span>
                                </a>';
                    $menu_tree .= '</li>';
                endif;                                    
                                
            endforeach;            
        }
        
        return $menu_tree;
    }        
}
