@extends('admin_layout')

@section('admin_content')

<div class="row-fluid">		
  <div class="box span8">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon user"></i><span class="break"></span>Customer Details</h2>
   
    </div>

  
    <div class="box-content">
      <table class="table table-striped table-bordered bootstrap-datatable">
        <thead>
          <tr>
            <th>Username</th>
            <th>Mobile Number</th>
       
          </tr>
        </thead>   
        <tbody>

        

        <tr>
            
            <td class="center">{{$order->customer->first_name}} {{$order->customer->last_name}}</td>
            <td class="center">{{$order->customer->mobile_number}}</td>
           
          </tr>
            
       
 
  
        </tbody>
      </table> 
 
    </div>
  

  </div><!--/span-->

   

</div><!--/row-->

<div class="row-fluid">		
  <div class="box span8">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon user"></i><span class="break"></span>Shipping Details</h2>
   
    </div>

  
    <div class="box-content">
      <table class="table table-striped table-bordered bootstrap-datatable">
        <thead>
          <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Mobile</th>
            
            
          </tr>
        </thead>   
        <tbody>

        

        <tr>
            
        <td class="center">{{$order->shipping->shipping_first_name}} {{$order->shipping->shipping_last_name}}</td>
            <td class="center">{{$order->shipping->shipping_address}}</td>
            <td class="center">{{$order->shipping->shipping_mobile_number}}</td>
           
          </tr>
            
        
 
  
        </tbody>
      </table> 
 
    </div>
  

  </div><!--/span-->

   

</div><!--/row-->

<div class="row-fluid">		
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon user"></i><span class="break"></span>Order Details</h2>
   
    </div>

  
    <div class="box-content">
      <table class="table table-striped table-bordered bootstrap-datatable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Sales Quantity</th>
            <th>Product Subtotal</th>
            
            
            
          </tr>
        </thead>   
        <tbody>

        @foreach ($order->orderDetails as $orderDetails)

        <tr>
            
            <td class="center"> {{$orderDetails->id}}  </td>
            <td class="center">{{$orderDetails->product_name}}</td>
            <td class="center">{{$orderDetails->product_price}}</td>
            <td class="center">{{$orderDetails->product_quantity}}</td>
            <td></td>
            
                       
          </tr>


            
        @endforeach 

       
 
  
        </tbody>

        <tfoot>

          <tr>
              <td colspan="4">Table with vat:</td>
              <td><strong>{{$order->order_total}} Tk.</strong> </td>

          </tr>
          
          

        </tfoot>
      
      </table>
 
    </div>
  

  </div><!--/span-->

   

</div><!--/row-->
    
@endsection


