<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerLoginRequest;
use App\Http\Requests\CustomerRegistrationRequest;
use App\Http\Requests\ShippingRequest;

use App\Customer;
use App\Shipping;
class CheckoutController extends Controller
{
    
    public function login(){

       return view('pages.login');

    }

    public function customer_registration(Request $request){

       $input=$request->all();

       $password=md5($request->password);

       $input['password']=$password;

       $customer=Customer::create($input);

       session(['customer_id'=> $customer->id,
       'customer_first_name'=> $customer->first_name,
       'customer_last_name'=> $customer->last_name
       
       ]);

       return redirect('/checkout');

    }

    public function customer_login(Request $request){

        $email= $request->email;
        $password=md5($request->password);

        $customer=Customer::where('email',$email)->where('password',$password)->first();

        if($customer){

            session(['customer_id'=> $customer->id,
            'customer_first_name'=> $customer->first_name,
            'customer_last_name'=> $customer->last_name
            
            ]);
     
            return redirect('/checkout');
        
        }else{

            
            return redirect('/customer_login');

        }


    }

    public function checkout(){

        return view('pages.checkout');
    }

    public function shipping_details(ShippingRequest $request){

         $shipping=Shipping::create($request->all());

         session(['shipping_id'=>$shipping->id]);

          return session()->all();

        //   return redirect('/payment');
        
    }

    public function logout(){

        // session()->forget(['customer_id','customer_first_name','customer_last_name']);

        session()->flush();

        return redirect('/customer_login');

    }

}
