@extends('layout')
@section('content')

<div class="col-sm-12">

<section id="cart_items" >
		{{-- <div class="container"> --}}

			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shipping Detail</li>
				</ol>
			</div><!--/breadcrums-->

			@include('error')

			<div class="container" >

				<div class="row">

						<div class="col-sm-6 col-sm-offset-3">

								<div class="register-req">
									<p>Please Register Shipping Details</p>
								</div><!--/register-req-->
					
						</div>
			  		
					
						<div class="col-sm-6 col-sm-offset-3">
					
								<div class="shopper-informations" >
									
						
										
										
											<div class="bill-to">
												<p>Shipping Details</p>
												<div class="signup-form">
												<form method="POST" action="{{ url('/shipping-details') }}">
														@csrf
														<input type="text" name="shipping_email" placeholder="Email*">
														
														<input type="text" name="shipping_first_name" placeholder="First Name *">
														
														<input type="text" name="shipping_last_name" placeholder="Last Name *">
														<input type="text" name="shipping_address" placeholder="Address *">
														<input type="text" name="shipping_mobile_number" placeholder="Mobile Number *">
														<input type="submit" value="Submit" class="btn btn-primary">
													
												</form>
												</div>
											
											</div>
									
													
									</div>
								</div>


				</div>


			</div>


		


	
		{{-- </div> --}}
	</section> <!--/#cart_items-->
</div>    
@endsection