<?php

namespace App\Http\Middleware;

use Closure;

class PaymentMethod
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
        $payment_id=session('payment_id');
        
        if(!$payment_id){

          return redirect()->back();

        }
        
        return $next($request);
    }
}
