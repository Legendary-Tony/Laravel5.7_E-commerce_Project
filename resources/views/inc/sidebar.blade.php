<div class="span3 col">
	<div class="block">	
		<ul class="nav nav-list">
			<li class="nav-header">CATEGORIES</li>
			@foreach ($categories as $category)
			 <li class="{{ request()->category == $category->slug ? 'active' : ''}}"><a href="{{ route('products', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
			@endforeach
		</ul>

	</div>
	{{-- <div class="block">
		<h4 class="title">
			<span class="pull-left"><span class="text">Randomize</span></span>
			<span class="pull-right">
				<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
			</span>
		</h4>
		<div id="myCarousel" class="carousel slide">
			<div class="carousel-inner">
				<div class="active item">
					<ul class="thumbnails listing-products">
						<li class="span3">
							<div class="product-box">
								
								
									<span class="sale_tag"></span>												
								<a href="product_detail.html"><img alt="" src="{{ asset('themes/images/ladies/7.jpg') }}"></a><br/>
								<a href="product_detail.html" class="title"></a><br/>
								<a href="#" class="category">Suspendisse aliquet</a>
								<p class="price"></p>
									

							</div>
						</li>
					</ul>
				</div>

			</div>
		</div>
	</div> --}}
</div>