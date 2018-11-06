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
					@forelse ($products->chunk(3) as $item)
					<div class="row" >
						@foreach ($item as $product)
						<li class="span3">
							<div class="product-box chunk">
								<span class="sale_tag"></span>												
								<a href="{{ route('products.show', $product->slug) }}"><img alt="" src="{{ Storage::disk('s3')->url($product->image)}}"></a><br/>
								<a href="" class="title">{{ $product->name}}</a><br/>
								{{-- <a href="#" class="category">{{ $product->detail }}</a> --}}
								<p class="price">{{ shop($product) }}</p>
							</div>
						</li>
						@endforeach  
					</div>
					@empty
					<div class="span9">
						<h2>No item found!!</h2>
					</div>
					@endforelse
				</ul>								
				<hr>
				<div class="pager pagination-larage pagination-centered">
					<ul>
						<li>{{ $products->links('vendor.pagination.bootstrap-4') }}</li>
					</ul> 
				</div>
			</div>
			@include('inc.sidebar')
		</div>
	</div>
</section>
@endsection