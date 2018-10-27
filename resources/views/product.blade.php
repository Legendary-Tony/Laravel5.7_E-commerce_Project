@extends('layouts.app')

@section('header')
<link href="{{ asset('themes/css/jquery.fancybox.css') }}" rel="stylesheet"/>
<script src="{{ asset('themes/js/jquery.fancybox.js') }}"></script>
@endsection
@section('content')
<section class="header_text sub">
	<img class="pageBanner" src="{{ asset('themes/images/pageBanner.png') }}" alt="New products" >
	<h4><span>Product Detail</span></h4>
</section>
<section class="main-content">				
	<div class="row">						
		<div class="span9">
			<div class="row">
				<div class="span4">
					<a href="{{ $products->image }}" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="{{ $products->image }}"></a>												
					{{-- <ul class="thumbnails small">								
						<li class="span1">
							<a href="{{ asset('themes/images/ladies/2.jpg') }}" class="thumbnail" data-fancybox-group="group1" title="Description 2"><img src="{{ asset('themes/images/ladies/2.jpg') }}" alt=""></a>
						</li>								
						<li class="span1">
							<a href="{{ asset('themes/images/ladies/3.jpg') }}" class="thumbnail" data-fancybox-group="group1" title="Description 3"><img src="{{ asset('themes/images/ladies/3.jpg') }}" alt=""></a>
						</li>													
						<li class="span1">
							<a href="{{ asset('themes/images/ladies/4.jpg') }}" class="thumbnail" data-fancybox-group="group1" title="Description 4"><img src="{{ asset('themes/images/ladies/4.jpg') }}" alt=""></a>
						</li>
						<li class="span1">
							<a href="{{ asset('themes/images/ladies/5.jpg') }}" class="thumbnail" data-fancybox-group="group1" title="Description 5"><img src="{{ asset('themes/images/ladies/5.jpg') }}" alt=""></a>
						</li>
					</ul> --}}
					<hr>
				</div>

				
					
				
				<div class="span5">
					
					{{-- <address>
						<strong>Brand:</strong> <span>Apple</span><br>
						<strong>Product Code:</strong> <span>FB5001</span><br>
						<strong>Availability:</strong> <span>3</span><br>								
					</address>	 --}}								
					<h4><strong>Price: {{ money_format('$%i', $products->price / 363.50) }} </strong></h4>
					
				</div>
				<div class="span5">

						<form class="form-inline" action="{{ route('cart.store', $products->id) }}" method="POST" >
							{{ csrf_field() }} 
							<input type="hidden"  name="id" value="{{ $products->id }}">
							<input type="hidden" name="name" value="{{ $products->name }}">
							<input type="hidden" name="price" value="{{ $products->price }}">
							
						{{-- <label class="checkbox">
							<input type="checkbox" value=""> Option one is this and that
						</label>
						<br/>
						<label class="checkbox">
							<input type="checkbox" value=""> Be sure to include why it's great
						</label> --}}
						<p>&nbsp;</p>
						<label>Qty:</label>
						<input type="text" class="span1" placeholder="1">
						<button class="btn btn-inverse" type="submit">Add to cart</button>
					</form>
					
					
				</div>							
			</div>
			<div class="row">

				<div class="span9">
					<ul class="nav nav-tabs" id="myTab">
						<li class="active"><a href="#home">Description</a></li>
						<li class=""><a href="#profile">Additional Information</a></li>
					</ul>							 
					<div class="tab-content">
						<div class="tab-pane active" id="home">{{ $products->description }}</div>
						<div class="tab-pane" id="profile">
							<table class="table table-striped shop_attributes">	
								<tbody>
									<tr class="">
										<th>Size</th>
										<td>{{ $products->size }}</td>
									</tr>		
									<tr class="alt">
										<th>Colour</th>
										<td>{{ $products->color }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>							
				</div>
									
				@include('inc.related')
			</div>
		</div>
		@include('inc.sidebar')
	</div>
</section>	
@endsection
@section('footer')
<script>
	$(function () {
		$('#myTab a:first').tab('show');
		$('#myTab a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		})
	})
	$(document).ready(function() {
		$('.thumbnail').fancybox({
			openEffect  : 'none',
			closeEffect : 'none'
		});

		$('#myCarousel-2').carousel({
			interval: 2500
		});								
	});
</script>
@endsection