@extends('layouts.app')
@section('content')
		
			<section  class="homepage-slider" id="home-slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<img src="themes/images/carousel/banner-1.jpg" alt="" />
							<div class="intro">
								<h1>Mid season sale</h1>
								<p><span>Up to 10% Off</span></p>
								<p><span>On selected items online and in stores</span></p>
							</div>
						</li>
						<li>
							<img src="themes/images/carousel/banner-2.jpg" alt="" />
							
						</li>
					</ul>
				</div>			
			</section>
			@include('main')
			
		@endsection
    