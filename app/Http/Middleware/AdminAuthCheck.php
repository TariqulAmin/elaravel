<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthCheck
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
       $admin_id=session('admin_id');

       if(!$admin_id){
        
          return redirect('/admin');

       }

        return $next($request);
    }
}
