@extends('layouts.app')

@section('content')

<div id="wrapper" class="container">

	<section class="header_text sub">
		<img class="pageBanner" src="{{ asset('themes/images/pageBanner.png') }}" alt="New products" >
		<h4><span>{{ $categoryName }}</span></h4>
	</section>
	<section class="main-content">

		<div class="row">						
			<div class="span9">								
				<ul class="thumbnails listing-products">
					@forelse ($products as $product)
					<li class="span3">
						<div class="product-box">
							<span class="sale_tag"></span>												
							<a href="{{ route('products.show', $product->id) }}"><img alt="" src="{{ $product->image }}"></a><br/>
							<a href="" class="title">{{ $product->name}}</a><br/>
							{{-- <a href="#" class="category">{{ $product->detail }}</a> --}}
							<p class="price">{{ shop($product) }}</p>
						</div>
					</li>  

					@empty
					<div class="span9">
						<h2>No item found!!</h2>
					</div>
					@endforelse

				</ul>								
				<hr>

				<div class="pagination pagination-small pagination-centered">
					<ul>
						<li>
							
						{{ $products->appends(request()->input())->links() }}
						</li>
					</ul>
				</div>
			</div>

			@include('inc.sidebar')



		</div>
	</div>
</section>
@endsection