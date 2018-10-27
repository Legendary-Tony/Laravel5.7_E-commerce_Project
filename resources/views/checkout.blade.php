@extends('layouts.app')
@section('header')
<link href="{{ asset('bootstrap/css/custom.css') }}" rel="stylesheet">
@endsection
@section('content')
<section class="header_text sub">
	<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
	<h4><span>Check Out</span></h4>
</section class="main-content">	

<div class="accordion" id="accordion2">
	<div class="accordion-group">
		<div class="accordion-heading">
			<div id="charge-error" class="alert alert-danger" {{ !Session::has('error') ? 'hidden' : ''}}>
				{{ session::get('error') }}
			</div>
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">Account &amp; Billing Details</a>
		</div>
		<div id="collapseOne" class="accordion-body in collapse">
			<div class="accordion-inner">
				<div class="row-fluid">

					<form action="{{ route('postCheckout') }}" method="POST" id="payment-form">
						@csrf
						<div class="container legend">
							<div class="row">
								<div class="col-md-8 col-sm-12 offset-1">
									

									<div class="col-md-5 col-sm-12 pull-left">
										<h4>Your Personal Details</h4>
										<div class="row">
											<div class="col-md-5 col-sm-12 pull-left">
												<div class="control-group">
													<label class="control-label">First Name</label>
													<input type="text" name="first_name" id="first_name" placeholder=""  class="form-control">
												</div>
											</div>
											<div class="col-md-5 col-sm-12 pull-left">
												<div class="control-group">
													<label class="control-label">Last Name</label>
													<input type="text" name="last_name" id="last_name" placeholder="" class="form-control">
												</div>
											</div>	
										</div>				  
										<div class="control-group">
											<label class="control-label">Email Address</label>
											
											<input type="email" name="email" id="email" placeholder="" class="form-control">
											
										</div>
										<div class="control-group">
											<label class="control-label">Telephone</label>
											<div class="controls">
												<input type="text" name="phone_number" id="phone_number" placeholder="" class="form-control">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label"> Address</label>
											<div class="max controls">
												<textarea name="address" id="address" class="form-control"></textarea>
											</div>
										</div>
									</div>

									<div class="col-md-5 pull-right">
										<h4>Billing Details</h4>
										<div class="control-group">
											<label class="control-label"><span class="required">*</span>Name on card</label>
											<div class="controls">
												<input type="text" name="name" id="name-on-card" placeholder=""  class="form-control">
											</div>
										</div>

										<div class="max control-group">
											<label for="card-element control-label"><span class="required">*</span>
												Credit or debit card
											</label>
											<div  class="form-control">
												<div id="card-element">
													<!-- A Stripe Element will be inserted here. -->
												</div>
											</div>

											<!-- Used to display form errors. -->
											<div id="card-errors" role="alert"></div>
											
										</div>
										{{-- <div class="row">
											<div class="col-md-6 pull-left">
												<div class="control-group">
													<label class="control-label"><span class="required">*</span>Expiring Month</label>
													<input type="text" id="card-expiry-month" placeholder="" class="form-control">
												</div>
											</div>
											<div class="col-md-4 pull-right">
												<div class="control-group">
													<label class="control-label"><span class="required">*</span>Expiring Year</label>
													<input type="text" id="card-expiry-year" placeholder="" class="form-control">
												</div>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label"><span class="required">*</span>CVC:</label>
											<div class="controls">
												<input type="text" id="card-cvc" placeholder=""  class="input-xlarge">
											</div>
										</div> --}}

										<div class="control-group">
											<button  class="btn btn-inverse text-center">Confirm order</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('footer')
<script src="https://js.stripe.com/v3/"></script>

<script>

	$("#postCkeckout").submit(function(e) {
		e.preventDefault();
	});
	// Create a Stripe client.
	var stripe = Stripe('pk_test_NHy3yhGXnyU9E9gMu1C9H3GW');



// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
	base: {
		color: '#32325d',
		// lineHeight: '18px',
		fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
		fontSmoothing: 'antialiased',
		fontSize: '14px',
		'::placeholder': {
			color: '#aab7c4'
		}
	},
	invalid: {
		color: '#fa755a',
		iconColor: '#fa755a'
	}
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style, hidePostalCode: true});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
	var displayError = document.getElementById('card-errors');
	if (event.error) {
		displayError.textContent = event.error.message;
	} else {
		displayError.textContent = '';
	}
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
	event.preventDefault();

	var options = {
		name: document.getElementById('name-on-card').value,
		address_line1: document.getElementById('address').value
	}

	stripe.createToken(card).then(function(result) {
		if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
  } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
  }
});
});

function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}

</script>
{{-- <script src="{{ asset('js/checkout.js') }}"></script> --}}
@endsection