<div class="span9">	
	<br>
	<h4 class="title">
		<span class="pull-left"><span class="text"><strong>Related</strong> Products</span></span>
		<span class="pull-right">
			<a class="left button" href="#myCarousel-1" data-slide="prev"></a><a class="right button" href="#myCarousel-1" data-slide="next"></a>
		</span>
	</h4>
	<div id="myCarousel-1" class="carousel slide">
		<div class="carousel-inner">
			<div class="active item">
				<ul class="thumbnails listing-products">
					@foreach ($related as $relate)
					<li class="span3">
						<div class="product-box">
							<span class="sale_tag"></span>			
							<a href="{{ route('products.show', $relate->id) }}"><img alt="" src="{{ $relate->image }}"></a><br/>
							<a href="{{ route('products.show', $relate->id) }}" class="title">{{ $relate->name }}</a><br/>
							@foreach ($relate->categories as $category)
							<a href="{{ route('products', ['category', $category->slug]) }}" class="category">{{ $category->name}}</a>
							@endforeach
							<p class="price">{{ money_format('$%i', $relate->price / 363.50) }}</p>
						</div>
					</li>
					@endforeach    
				</ul>
			</div>
		</div>
	</div>
</div>