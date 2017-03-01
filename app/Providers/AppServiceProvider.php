<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {               
        view()->composer('partial.left_menu', function($view){
            if (auth()->check()) :
                $view->with('menu_left_per_user',auth()->user()->active_menu_options_per_role());
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
}
