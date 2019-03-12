<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerLoginRequest;
use App\Http\Requests\CustomerRegistrationRequest;
use App\Http\Requests\ShippingRequest;

use App\Customer;
use App\Shipping;
use App\Payment;
use App\Order;
use App\OrderDetail;
use Stripe\Stripe;
use Stripe\Charge;

use Cart;
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

          

          return redirect('/payment');
        
    }

    public function payment(){

         $contents=Cart::content();
         return view('pages.payment',compact('contents'));

    }

    public function place_order(Request $request){


        $payment=Payment::create($request->all());
        session(['payment_id'=>$payment->id]);


        $customer_id=session('customer_id');
        $shipping_id=session('shipping_id');
        $payment_id=session('payment_id');

        $order=Order::create(['customer_id'=>$customer_id,
        'shipping_id'=>$shipping_id,
        'payment_id'=>$payment_id,
        'order_total'=>Cart::subtotal()
        ]);

        session(['order_id'=>$order->id]);

        $order_id=session('order_id');

        $contents=Cart::content();

        foreach ($contents as $content) {
            
          OrderDetail::create([
           
            'order_id'=>$order_id,
            'product_id'=>$content->id,
            'product_name'=>$content->name,
            'product_price'=>$content->price,
            'product_quantity'=>$content->qty
                                     
          ]);  

        }

        if($payment->payment_method == 'handcash'){

            Cart::destroy();
            return redirect('/confirm-handcash');
            

        }elseif($payment->payment_method == 'stripe'){

             return redirect('/payment-stripe');

        }elseif($payment->payment_method == 'bkash'){

            

        }
        
      }
         
      public function payment_stripe(){

         $contents=Cart::content();
         return view('pages.stripe',compact('contents'));

    }

    public function stripe_submission(Request $request){

        $total=str_replace(',', '', Cart::total());
        Stripe::setApiKey('sk_test_DAq9cjU3h3spKKBeRYRUct4q');
        Charge::create([
            "amount" => $total*(100),
            "currency" => "bdt",
            "source" => $request->input('stripeToken'), // obtained with Stripe.js
            "description" => "Charge for shohan@gmail.com"
          ]);

        $request->session()->flash('success', "Payment Successful");
        Cart::destroy();
      return redirect('/confirm-stripe');
        
       

    }



    public function logout(){

        // session()->forget(['customer_id','customer_first_name','customer_last_name']);

        session()->flush();

        return redirect('/customer_login');

    }

}
