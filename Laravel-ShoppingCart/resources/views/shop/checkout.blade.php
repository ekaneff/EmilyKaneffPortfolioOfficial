@extends('layouts.master')

@section('title')
	Order Confirmation
@endsection

@include('partials.nav')

@section('content')
	<div class="container">
		<h1>Payment Info</h1>
		<form action="/cart/charge" method="POST" id="payment-form">
			{{ csrf_field() }}
			<div class="payment-errors" role="alert"></div>
		  <div class="form-group">
		    <input type="hidden" class="form-control" id="total" value='${{ $total }}.00' >
		  </div>
		  <div class="form-group">
		    <label for="card-number">Card Number</label>
		    <input type="text" class="form-control card-number" id="card-number" size="20" data-stripe="number">
		  </div>
		  <div class="form-group">
		    <label for="expiration">Expiration</label>
		    <input type="text" class="card-expiry-month" id="expiration" size="2" size="2" data-stripe="exp_month"> 
		    <span> / </span>
		    <input type="text" class="card-expiry-year" id="expiration" size="2" size="2" data-stripe="exp_year">
		  </div>
		  <div class="form-group">
		    <label for="cvc">CVC</label>
		    <input  id="expiration" class="card-cvc" type="text" size="4" data-stripe="cvc">
		  </div>	
		  <h2>Total: ${{$total}}.00</h2>	 
		  <button type="submit" class="btn btn-primary submit">Submit</button>
		</form>
		
	</div>
	
@endsection

@section('scripts')
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script type="text/javascript">
	  Stripe.setPublishableKey('pk_test_0YlsytUgEhdo3XUOFFnOIgfW');
	  
	  $(function() {
		  var $form = $('#payment-form');
		  $form.submit(function(event) {
		  	if($('#total').val() != '$0.00')
		  	{
			    // Disable the submit button to prevent repeated clicks:
				$form.find('.submit').prop('disabled', true);

			    // Request a token from Stripe:
			    Stripe.card.createToken($form, stripeResponseHandler);

			    // Prevent the form from being submitted:
			    return false;
			 }
			 else
			 {
			 	event.preventDefault();
			 	$form.find('.payment-errors').text('Minimum order exception, please add an item to your cart.');
			 	$form.find('.payment-errors').addClass('alert alert-danger')

			 }
		  });
		  function stripeResponseHandler(status, response) {
			  // Grab the form:
			  var $form = $('#payment-form');

			  if (response.error) { // Problem!

			    // Show the errors on the form:
			    $form.find('.payment-errors').text(response.error.message);
			    $form.find('.submit').prop('disabled', false); // Re-enable submission
			    $form.find('.payment-errors').addClass('alert alert-danger')

			  } else { // Token was created!

			    // Get the token ID:
			    var token = response.id;

			    // Insert the token ID into the form so it gets submitted to the server:
			    $form.append($('<input type="hidden" name="stripeToken">').val(token));
			    $form.append($('<input type="hidden" name="total">').val({{ $total }}));

			    console.log(token);
			    // Submit the form:
			    $form.get(0).submit();
			  }
			};

		});
	</script>
@endsection

