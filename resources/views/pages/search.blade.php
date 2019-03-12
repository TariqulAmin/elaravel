@extends('layout')

@section('side-navigation')
	
   @include('side-navigation')

@endsection


@section('content')

<div class="col-sm-9 padding-right">

<div class="features_items"><!--features_items-->

  

<h3 class="text-muted">Search result for "{{$query}}"</h3>

@if ($products->isEmpty())

  <h1 class="text-center text-danger">No results found</h1>
     
 @else

 @foreach ($products as $product)

	 <div class="col-sm-4">

    <div class="product-image-wrapper">
      <div class="single-products">
          <div class="productinfo text-center">
            <img height="300px" width="" src="images/{{$product->product_image}}" alt="" />
            <h2>{{$product->product_price}} TK.</h2>
            <p>{{$product->product_name}}</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>
          <div class="product-overlay">
            <div class="overlay-content">
              <h2>{{$product->product_price}} TK.</h2>
              <p>{{$product->product_name}}</p>
              <a href="{{ url('/view-product',$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
          </div>
      </div>
      <div class="choose">
        <ul class="nav nav-pills nav-justified">
          <li><a href="#"><i class="fa fa-plus-square"></i>{{$product->brand->brand_name}}</a></li>
          <li><a href=" {{ url('/view-product',$product->id) }} "><i class="fa fa-plus-square"></i>View Product</a></li>
        </ul>
      </div>
    </div>
  </div>
			 
	 @endforeach 
     
 @endif
	

	
	

	
</div><!--features_items-->

<div class="row">
		 
	  <div class="col-sm-5">

			 <p class="text-muted" style="">Item {{ $products->firstItem()}} to {{ $products->lastItem() }} of {{ $products->total()}} total</p>	
		</div>

		<div class="col-sm-6">

				{{ $products->appends(Request::except('page'))->render() }}
		 
		 </div> 

</div>



</div>
		
@endsection

