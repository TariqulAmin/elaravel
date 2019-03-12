@extends('layout')

@section('content')

<div class="col-sm-12">

<section id="cart_items">
  <div class="container col-sm-11">
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Shopping Cart</li>
      </ol>
    </div>
    
  
    <div class="table-responsive cart_info">
      <table class="table table-condensed">
        <thead>
          <tr class="cart_menu">
            <td class="image">Image</td>
            <td class="description">Name</td>
            <td class="price">Price</td>
            <td class="quantity">Quantity</td>
            <td class="total">Total</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>

        @foreach ($contents as $content)

        <tr>
            <td class="cart_product">
            <a href=""><img height="80px" src="images/{{$content->options->image}}" alt=""></a>
            </td>
            <td class="cart_description">
              <h4><a href="">{{$content->name}}</a></h4>
              
            </td>
            <td class="cart_price">
              <p>{{$content->price}} Tk.</p>
            </td>
            <td class="cart_quantity">
              <div class="">

                <form action=" {{action('CartController@update_item',$content->rowId)}} " method="post">

                  @csrf
                  @method('PATCH')

                    <input class="cart_quantity_input" type="text" name="product_quantity" value="{{$content->qty}}" autocomplete="off" size="2">
                    <input type="submit" value="Update" class="btn btn-sm btn-default">

                </form>
                
               
              
              </div>
            </td>
            <td class="cart_total">
              <p class="cart_total_price">{{$content->subtotal}} TK.</p>
            </td>
            <td class="cart_delete">
            <a class="cart_quantity_delete" href="{{ url('/delete-item',$content->rowId)}}"><i class="fa fa-times"></i></a>
            </td>
          </tr>
            
        @endforeach  

        
        </tbody>
      </table>
    </div>
  </div>
</section> <!--/#cart_items-->


@if ($contents->isempty()  )

<div class="col-sm-12"  style="font-weight:900 ">
    <h2 style="font-weight:300 ">Your shopping Cart is empty</h1>
    <h3 style="font-weight:300 ">You have no items in your shopping cart.</h2>

 </div>



@else
   


   <section id="do_action">
      <div class="container col-sm-12">
        <div class="heading">
          <h3>What would you like to do next?</h3>
          <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="breadcrumbs">
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Payment method</li>
          </ol>
        </div>
        <div class="paymentCont col-sm-8">
              <div class="headingWrap">
                  <h3 class="headingTop text-center">Select Your Payment Method</h3>	
                  
              </div>
          
            <form action="{{ url('/place-order') }}" method="post"> 
              
              @csrf
              
            <div style=" margin-bottom:10px " class="form-check">
              <input class="form-check-input" type="radio" name="payment_method"  value="handcash" checked>
               <img  height="40px" width="60px" src="https://cdn0.iconfinder.com/data/icons/business-pack-4/512/bank_finance_cash_dollar_purchase_money_transfer_buy-512.png" alt="">
            </div>
            
            <div style=" margin-bottom:10px " class="form-check">
              <input class="form-check-input" type="radio" name="payment_method" value="stripe">
              <img  height="40px" width="" src="https://stripe.com/img/v3/home/social.png" alt="">
    
            </div>
    
            <div style=" margin-bottom:10px " class="form-check">
              <input class="form-check-input" type="radio" name="payment_method" value="bkash">
              <img  height="40px" width="" src="https://seeklogo.com/images/B/bkash-logo-FBB258B90F-seeklogo.com.png" alt="">
    
            </div>
    
            {{-- <div style=" margin-bottom:10px " class="form-check">
              <input class="form-check-input" type="radio" name="payment_method" value="payza">
              <img  height="40px" width="" src="https://lh3.googleusercontent.com/crEFlrHdEwC_IOQPgrefOPuZJmVCNqv0GnEy_OMl-zFoPn1Wv6lWC72XUb_C6gufew" alt="">
    
            </div> --}}
    
            <input type="submit" class="btn btn-primary" value="Submit">
    
         </form>
              
              
              
          </div>
      </div>
    </section><!--/#do_action-->

   
    
@endif


</div>
    
@endsection