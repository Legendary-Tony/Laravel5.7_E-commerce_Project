@extends('layouts.app')


@section('content')
<section class="header_text sub">
	<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
	<h4><span>Shopping Cart</span></h4>

</section>
<section class="main-content">

	<div class="row">
		
		<div class="span9">
			
			
			@include('inc.message')

			<h4 class="title"><span class="text"><strong>Your</strong> Cart</span></h4>
			@if (Session::has('cart'))
			@foreach ($products as $product)
			<table class="table table-striped">

				<thead>
					<tr>
						
						<th>Image</th>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Unit Price</th>
						<th>Total</th>

					</tr>
				</thead>

				<tbody>

					<tr>
						
						<td><a href=""><img alt="" src="{{ $product['item'] ['image'] }}"></a></td>
						<td>{{ $product['item'] ['name'] }}</td>
						<td><input type="text" placeholder="1" value="{{ $product['qty']}}" class="input-mini"></td>
						<td>{{ Price($product) }}</td>
						<td>{{ total($totalPrice) }}</td>
					</tr>			  


					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><strong>{{ total($totalPrice) }}</strong></td>
					</tr>		  
				</tbody>
			</table>
			@endforeach

			@if (!session()->has('coupon'))
			<h4>What would you like to do next?</h4>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>

			<form method="POST" action="{{ route('coupon.store') }}">
				{{ csrf_field() }}
				<label >
					Use Coupon Code
				</label>	
				<div class="input-group-append">
					@foreach ($coupon_code as $coupon)
					@foreach ($products as $product)
						<span class="input-group-text"><input style="height: 22px; width: 150px;" class="form-control" type="text" value="{{ $totalPrice / 363.50 >= 10.00 ? $coupon->code : '' }}"  name="coupon_code"></span>
					<span class="input-group-text"><button class="btn btn-default" type="submit">Apply</button></span>
					@endforeach
					@endforeach
					
				</div>
			</form>
			@endif
			
			
			<hr>

			<p class="cart-total right">
				{{-- @foreach ($products as $product)
				<strong>Unit Price</strong>: ${{ $product['item']['price'] }}<br>
				@endforeach --}}
				@if (session()->has('coupon'))
				<strong>Discount</strong> ({{ session()->get('coupon')['name'] }}): -{{ money_format('$%i', (session()->get('coupon')['discount']) / 363.50 )}}<br>
				@endif
				<strong>Total Amount</strong>:   {{ total($totalPrice) }}
				<br>

			</p>
			<hr/>
			<p class="buttons center">	
				<div style="margin-left: 35%" class="btn-group">

					@else
					<h3>You have no item(s) in cart!</h3>
					@endif
					@if (Session::has('cart'))
					@foreach ($products as $remove)
					<button type="button" id="menu" class="btn dropdown-toggle" data-toggle="dropdown">Action<span class="caret"></span></button>
					<ul class="dropdown-menu">
						<a href="{{ route('cart.reduce', ['id' => $remove['item']['id']]) }}"><li>Remove One</li></a>
						<br>
						<a href="{{ route('cart.remove', ['id' => $remove['item']['id']]) }}""><li>Clear Cart</li></a>
					</ul>
					@endforeach
				</div>	
				@if (session()->has('coupon'))
				<form style="display: inline;" method="POST" action="{{ route('coupon.delete') }}">
					{{ csrf_field() }}
					{{ method_field('delete') }}
					<button class="btn btn-default" type="submit">Remove Coupon</button>
				</form>
				@endif
				<a class="btn btn-inverse" href="{{ route('checkout') }}" id="checkout">Checkout</a>
			</p>
			@endif
		</div>

		@include('inc.sidebar')
		@include('inc.related')
	</div>


</section>		
@endsection