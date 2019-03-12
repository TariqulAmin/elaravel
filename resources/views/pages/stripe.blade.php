@extends('layout')
@section('content')

<div class="col-sm-12">

<section id="cart_items" >
		{{-- <div class="container"> --}}
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Stripe Payment</li>
				</ol>
			</div><!--/breadcrums-->

			

			<div class="register-req col-sm-6 col-sm-offset-3">
				<p>Please Register Card Details</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
  
          
          
          <div class="col-sm-12 col-sm-offset-3 ">
						<div class="bill-to">
							<p>Card Details</p>
							<div class="form-one">
							<form method="POST" action="{{ url('/stripe-submission') }}" id="stripe-form">
                  @csrf
                  
									
									<input type="text" id="card-name" placeholder="Card Holder Name" required>
									
									<input type="text" id="card-number" placeholder="Card Number" required>
                  <input type="text" id="card-expiry-month" placeholder="Expiration Month" required>
                  <input type="text" id="card-expiry-year" placeholder="Expiration year" required>
                  <input type="text" id="card-cvc" placeholder="CVC" required>
                  
                  <input type="submit" value="Pay {{Cart::total()}} TK." class="btn btn-primary">
								
							</form>

							{{-- @if (Session::has('error')) --}}

							<div id="stripe-error" class="alert alert-danger">  </div>
									
							{{-- @endif --}}

							
							</div>

							
						
						</div>
					</div>
								
				</div>
			</div>
		


	
		{{-- </div> --}}
	</section> <!--/#cart_items-->
</div>    
@endsection


@section('scripts')
		
<script src="https://js.stripe.com/v2/"></script>

<script>

Stripe.setPublishableKey('pk_test_AJFkOg6DFTRIZxyZhnVRBT0u');

$('#stripe-error').addClass('hidden');

var form=$('#stripe-form');

form.submit(function(e){

e.preventDefault();

 Stripe.createToken({
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val(),
        name: $('#card-name').val(),

      }, stripeResponseHandler);

});
 
function stripeResponseHandler(status,response){

   if(response.error){

		$('#stripe-error').removeClass('hidden');
		$('#stripe-error').text(response.error.message);

	 }else{

    var token=response.id;
		form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
		form.get(0).submit();

	 }

}




</script>

@endsection