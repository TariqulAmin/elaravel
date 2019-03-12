@extends('layout')

@section('slider')
		
    @include('slider')

@endsection

@section('side-navigation')
	
   @include('side-navigation')

@endsection


@section('content')

<div class="col-sm-9 padding-right">

<div class="features_items"><!--features_items-->

	<h2 class="title text-center">Features Items</h2>
	
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
					  <li><a href=" {{ url('/view-product',$product->id) }}  "><i class="fa fa-plus-square"></i>View Product</a></li>
					</ul>
				</div>
			</div>
		</div>
			 
	 @endforeach


	 
	 
</div><!--features_items-->


<div class="row">
		 
	  <div class="col-sm-5">

			 <p class="text-muted" style="">Item {{ $products->firstItem()}} to {{ $products->lastItem() }} of {{ $products->total()}} total</p>	
		</div>

		<div class="col-sm-6">

				{{ $products->render() }}
		 
		 </div> 

</div>






<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">recommended items</h2>
	
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">	
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{URL::to('front-end/images/home/recommend1.jpg')}}" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{URL::to('front-end/images/home/recommend2.jpg')}}" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{URL::to('front-end/images/home/recommend3.jpg')}}" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="item">	
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{URL::to('front-end/images/home/recommend1.jpg')}}" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{URL::to('front-end/images/home/recommend2.jpg')}}" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{URL::to('front-end/images/home/recommend3.jpg')}}" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
			</a>
			<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
			</a>			
	</div>
</div><!--/recommended_items-->

</div>
		
@endsection

