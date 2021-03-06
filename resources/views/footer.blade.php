<section id="footer-bar">
	<div class="row">
		<div class="span3">
			<h4>Navigation</h4>
			<ul class="nav">
				<li><a href="{{ route('home.page') }}">Homepage</a></li>  
				<li><a href="{{ route('about.us') }}">About Us</a></li>
				<li><a href="{{ route('contact.us') }}">Contact Us</a></li>
				<li><a href="{{ route('products') }}">View Products</a></li>
				<li><a href="/login">Login</a></li>							
			</ul>					
		</div>
		<div class="span4">
			<h4>My Account</h4>
			<ul class="nav">
				<li><a href="{{ route('profile') }}">My Account</a></li>
				<li><a href="{{ route('profile') }}">Order History</a></li>
			</ul>
		</div>
		<div class="span5">
			<p class="logo"><img src="{{ asset('themes/images/logo.png') }}" class="site_logo" alt=""></p>
			<p>Envo online Shopping is one of the  most visited platform all over the globe. We created this shopping site in other for you to be able to shop freely, securely.</p>
			<br/>
			<span class="social_icons">
				<a class="facebook" href="#">Facebook</a>
				<a class="twitter" href="#">Twitter</a>
				<a class="skype" href="#">Skype</a>
				<a class="vimeo" href="#">Vimeo</a>
			</span>
		</div>					
	</div>	
</section>
<section id="copyright">
	<span>Copyright 2017 - {{ Carbon::now()->format('Y') }} Envo E-commerce  All right reserved.</span>
</section>
</div>
@section('footer')
@show
<script src="{{ asset('themes/js/common.js') }}"></script>
<script src="{{ asset('themes/js/jquery.flexslider-min.js') }}"></script>
<script type="text/javascript">
	$(function() {
		$(document).ready(function() {
			$('.flexslider').flexslider({
				animation: "fade",
				slideshowSpeed: 4000,
				animationSpeed: 600,
				controlNav: false,
				directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
		});
	});
</script>