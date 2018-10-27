var stripe = Stripe('pk_test_NHy3yhGXnyU9E9gMu1C9H3GW');

var $form = $('#postCkeckout');

$form.submit(function(event) {
	$('charge-error').addClass('hidden');
	$form.find('button').prop('disabled', true);
	Stripe.card.createToken({
		number: $('#card-number').val(),
		cvc: $('#card-cvc').val(),
		exp_month: $('#card-expiry-month').val(),
		exp_year: $('#card-expiry-year').val(),
		name: $('#card-name').val()
	}, stripeResponseHandler);
	return false;
});

function stripeResponseHandler(status, response) {
	if (response.error) {
		$('#charge-error').removeClass('hidden');
		$('#charge-error').text('response.error.message');
		$form.find('button').prop('disabled', true);
	} else {
		var token = response.id;
		$form.append($('<input type="hidden" name="stripeToken" />').val(token));

    // Submit the form:
    $form.get(0).submit();

}
}

