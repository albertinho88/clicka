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
            $view->with('site_menu',$this->getPagesTree(null, ''));
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
    
    public function getPagesTree($idPageParent, $pages_tree) {                
        if ($idPageParent == NULL) {
            $pages = \App\Page::whereNull('page_parent_id')
                    ->whereIn('state',array('A','I'))
                    ->where('is_menu_item',true)
                    ->orderBy('order','asc')
                    ->get();
        } else {
            $pages = \App\Page::where('page_parent_id','=',$idPageParent)
                    ->whereIn('state',array('A','I'))
                    ->where('is_menu_item',true)
                    ->orderBy('order','asc')
                    ->get();
        }
        
        if (!$pages->isEmpty()) { 
            foreach ($pages as $page) :
                $pages_tree .= "<li>";
                $pages_tree .= '    <a class="topbar-link">';
                $pages_tree .= '        <i class="topbar-icon fa fa-fw fa-'.$page->icon.' '.$page->html_class.'"></i>';
                $pages_tree .= '        <span>'.$page->name.'</span>';                
                $pages_tree .= "    </a>";
                $pages_tree .= "</li>";
                                
                $pages_tree = $this->getPagesTree($page->page_id, $pages_tree);
            endforeach;
        }
        
        return $pages_tree;
    } 
}
