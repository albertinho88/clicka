<?php

namespace App\Http\Middleware;

use Closure;

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
        //\Illuminate\Support\Facades\Log::info('Showing user profile for user: '.$request->path());                        
        //return redirect('/');
        
        // si tiene acceso al $request->path()
        return $next($request);
        //caso contrario 
        //return redirect('error.no_access_menu');
    }
}
