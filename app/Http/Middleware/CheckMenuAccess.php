<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class CheckMenuAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {        
        \Illuminate\Support\Facades\Log::info('path: '.$request->route()->getPath());                        
        \Illuminate\Support\Facades\Log::info('prefix: '.$request->route()->getPrefix());                        
        //\Illuminate\Support\Facades\Log::info('action: '.$request->route()->getAction());
        \Illuminate\Support\Facades\Log::info('action name: '.$request->route()->getActionName());
        \Illuminate\Support\Facades\Log::info('uri: '.$request->route()->getUri());        
        //return redirect('/');
        
        $tiene_acceso_menu = DB::table('menu_options')
                ->join('roles_menu_options','menu_options.menu_id','=','roles_menu_options.menu_id')
                ->join('roles','roles.role_id','=','roles_menu_options.role_id')
                ->join('users_per_roles','users_per_roles.role_id','=','roles.role_id')
                ->join('users','users_per_roles.user_id','=','users.user_id')
                ->where('roles.state','A')
                ->where('roles_menu_options.state','A')
                ->where('menu_options.state','A')
                ->where('users_per_roles.state','A')
                ->where('users.user_id',$request->user()->user_id)                
                ->where('menu_options.url',$request->route()->getPath())                                
                ->select('menu_options.*')
                ->distinct()
                ->get();
        
        if ($tiene_acceso_menu->isEmpty()) :
            return redirect('errors/no_menu_access');
        else:
            return $next($request);
        endif;
        
        // si tiene acceso al $request->path()
        
        //caso contrario 
        //
    }
}
