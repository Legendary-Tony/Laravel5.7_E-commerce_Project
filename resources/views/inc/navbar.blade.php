<div id="top-bar" class="container">
	<div class="row">
		<div class="span4">
			<form method="POST" class="search_form">
				<input type="text" class="input-block-level search-query" Placeholder="eg. T-sirt">
			</form>
		</div>
		<div class="span8">
			
			<div id="menu"  class="account pull-right">
				<ul class="user-menu">				
					
					<li><i class="fas fa-shopping-cart"></i> <a href="{{ route('cart.index') }}">Cart</a> 	
						<span class="badge badge-pill badge-warning">@if (Session::has('cart'))
							{{ Session::get('cart')->totalQty}}
						@endif</span>
					</li>
					<li> <i class="fas fa-shopping-basket"></i> <a href="{{ route('checkout') }}">Checkout</a></li>					
					<!-- Authentication Links -->
					@guest
					<li>
						<i class="fas fa-sign-in-alt"> </i> <a  href="{{ route('login') }}">{{ __('Login') }}</a>
					</li>
					<li>
						@if (Route::has('register'))
						<i class="fas fa-user"></i> <a  href="{{ route('register') }}">{{ __('Register') }}</a>
						@endif
					</li>
					@else
					{{-- <li id="menu" class="pull-right"> --}}
						{{-- <i class="fas fa-sign-out-alt"></i> <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }} <span class="caret"></span>
						</a> --}}
						<li><i class="fas fa-sign-out-alt"></i> {{ Auth::user()->name }}
							<ul>									
								<li><a href="{{ route('profile') }}">Profile</a></li>
								<li><a class="dropdown-item"  href="{{ route('logout') }}"
									onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</li>

						</ul>
					</li>	
						{{-- <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
							<h5><strong><a href="{{ route('profile') }}">Profile</a></strong></h5>
							<br>
							<strong><a class="dropdown-item"  href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a></strong>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div> --}}
					{{-- </li> --}}
					@endguest
				</ul>
			</div>

		</div>
	</div>
</div>
<div id="wrapper" class="container">
	<section class="navbar main-menu">
		<div class="navbar-inner main-menu">				
			<a href="/" class="logo pull-left"><img src="{{ asset('themes/images/logo.png') }}" class="site_logo" alt=""></a>
			<nav id="nav" class="pull-right">
				<ul>
					{{-- <li><a href="./products.html">Woman</a>					
						<ul>
							<li><a href="./products.html">Lacinia nibh</a></li>									
							<li><a href="./products.html">Eget molestie</a></li>
							<li><a href="./products.html">Varius purus</a></li>									
						</ul>
					</li> --}}															
					{{-- <li><a href="./products.html">Man</a></li>	 --}}		
												
					<li><a href="{{ route('products') }}">Our Store</a></li>
					<li><a href="{{ route('about.us') }}">About Us</a></li>
					<li><a href="{{ route('contact.us') }}">Contact Us</a></li>
				</ul>
			</nav>
		</div>
	</section>