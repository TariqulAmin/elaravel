@extends('layout')

@section('content')


      <section id="cart_items">
        <div class="container col-sm-12">
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
    
      <section id="do_action">
        <div class="container col-sm-12">
          <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="chose_area">
                <ul class="user_option">
                  <li>
                    <input type="checkbox">
                    <label>Use Coupon Code</label>
                  </li>
                  <li>
                    <input type="checkbox">
                    <label>Use Gift Voucher</label>
                  </li>
                  <li>
                    <input type="checkbox">
                    <label>Estimate Shipping & Taxes</label>
                  </li>
                </ul>
                <ul class="user_info">
                  <li class="single_field">
                    <label>Country:</label>
                    <select>
                      <option>United States</option>
                      <option>Bangladesh</option>
                      <option>UK</option>
                      <option>India</option>
                      <option>Pakistan</option>
                      <option>Ucrane</option>
                      <option>Canada</option>
                      <option>Dubai</option>
                    </select>
                    
                  </li>
                  <li class="single_field">
                    <label>Region / State:</label>
                    <select>
                      <option>Select</option>
                      <option>Dhaka</option>
                      <option>London</option>
                      <option>Dillih</option>
                      <option>Lahore</option>
                      <option>Alaska</option>
                      <option>Canada</option>
                      <option>Dubai</option>
                    </select>
                  
                  </li>
                  <li class="single_field zip-field">
                    <label>Zip Code:</label>
                    <input type="text">
                  </li>
                </ul>
                <a class="btn btn-default update" href="">Get Quotes</a>
                <a class="btn btn-default check_out" href="">Continue</a>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="total_area">
                <ul>
                  <li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
                  <li>Eco Tax <span>{{Cart::tax()}}</span></li>
                  <li>Shipping Cost <span>Free</span></li>
                  <li>Total <span>{{Cart::total()}}</span></li>
                </ul>
                  <a class="btn btn-default update" href="">Update</a>
                  <a class="btn btn-default check_out" href="">Check Out</a>
              </div>
            </div>
          </div>
        </div>
      </section><!--/#do_action-->


@endsection