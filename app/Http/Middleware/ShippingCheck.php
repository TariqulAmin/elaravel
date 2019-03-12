<?php

namespace App\Http\Middleware;

use Closure;

class ShippingCheck
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
        $customer_id=session('customer_id');
        $shipping_id=session('shipping_id');
        
        if($customer_id && $shipping_id){

          return redirect('/payment');

        }elseif(!$customer_id && !$shipping_id){

          return redirect('/customer_login');

        } 
        
        return $next($request);
    }
}
