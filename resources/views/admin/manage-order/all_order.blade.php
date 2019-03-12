@extends('admin_layout')

@section('admin_content')

<ul class="breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">Home</a> 
    <i class="icon-angle-right"></i>
  </li>
  <li><a href="#">Order</a></li>
</ul>

<div class="row-fluid sortable">		
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon user"></i><span class="break"></span>Orders</h2>
      <div class="box-icon">
        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
      </div>
    </div>

    @include('error')
    <div class="box-content">
      <table class="table table-striped table-bordered bootstrap-datatable datatable">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>Order Total</th>
            
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>   
        <tbody>

        @foreach ($orders as $order)

        <tr>
            <td>{{$order->id}}</td>
            <td class="center">{{$order->customer->first_name}} {{$order->customer->last_name}}</td>
            <td class="center">{{$order->order_total}}</td>
            <td class="center">

              @if ($order->order_status==1)
               
              <span class="label label-success">Payment Successful</span>
              
              @elseif($order->order_status==0)
              
              <span class="label label-danger">Pending</span>   
              
              @endif
              
            </td>
            
            <td class="center">

              
                {{-- @if ($order->order_status==1)
               
                  <a class="btn btn-success" href="/order/active/{{ $order->id }}">
                    <i class="halflings-icon white thumbs-up"></i>  
                  </a>
                
                @elseif($order->order_status==0)
                
                <a class="btn btn-danger" href="/order/inactive/{{ $order->id }}">
                    <i class="halflings-icon white thumbs-down"></i>  
                  </a>  
                
                @endif --}}


              
            

              <a class="btn btn-info" href="{{route('manage-order.show',$order->id)}}">
                <i class="halflings-icon white edit"></i>  
              </a>
              
            {{-- <form id ="form-delete" class=""  method="POST" action="{{action('OrderController@destroy',$order->id)}}">
                 
                 @csrf
                 @method('DELETE')
                
                 <button type="submit" class="btn btn-danger" id="delete">
                 <i class="halflings-icon white trash"></i> 
                </button> --}}

            </form>
            
            </td>
          </tr>
            
        @endforeach 
 
  
        </tbody>
      </table> 
 
    </div>
  

  </div><!--/span-->

   

</div><!--/row-->



    
@endsection