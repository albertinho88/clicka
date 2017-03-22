<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {      
        
        view()->composer('partial.site_menu', function($view){                        
            $view->with('site_menu',$this->getPagesTree(null, '', 0));
        }); 
        
        view()->composer('partial.left_menu', function($view){            
            if (auth()->check()) :
                $view->with('menu_left_per_user',auth()->user()->active_menu_options_per_role(request()->route()->getPath()));
            else:
                $view->with('menu_left_per_user',null); 
            endif;                
        });                
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
    public function getPagesTree($idPageParent, $pages_tree, $nivel) {                
        if ($idPageParent == NULL) {
            $pages = \App\Page::whereNull('page_parent_id')
                    ->whereIn('state',array('A','I'))
                    ->where('is_menu_item',true)
                    ->orderBy('order','desc')
                    ->get();
        } else {
            $pages = \App\Page::where('page_parent_id','=',$idPageParent)
                    ->whereIn('state',array('A','I'))
                    ->where('is_menu_item',true)
                    ->orderBy('order','desc')
                    ->get();
        }
        
        if (!$pages->isEmpty()) { 
            foreach ($pages as $page) :
                
                $a_class = $nivel==0?'topbar-link':'';
                $i_class = $nivel==0?'topbar-icon':'';
                
                $pages_tree .= '<li role="menuitem">';
                $pages_tree .= '    <a class="'.$a_class.'" href="'.route('show_site_page',['page_id' => $page->page_id]).'">';
                $pages_tree .= '        <i class="'.$i_class.' fa fa-fw fa-'.$page->icon.' '.$page->menu_class.'"></i>';
                $pages_tree .= '        <span>'.$page->name.'</span>';                
                $pages_tree .= "    </a>";                
                
                if ($page->children_pages()->count()>0) :
                    $menu_children = $this->getPagesTree($page->page_id, '', $nivel+1);
                    $pages_tree .= '<ul class="poseidon-menu animated fadeInDown">';
                    $pages_tree .= $menu_children;
                    $pages_tree .= '</ul>';
                endif;
                
                $pages_tree .= "</li>";
                                                
            endforeach;
        }
        
        return $pages_tree;
    } 
}
