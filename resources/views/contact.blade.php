@extends('layouts.app')

@section('content')
<section class="header_text sub">
	<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
	<h4><span>Contact Us</span></h4>
</section>
<section class="main-content">				
	<div class="row">				
		<div class="span5">
			<div>
				<h5>GET IN TOUCH</h5>
				<p><strong>Phone:</strong>&nbsp;+234 (0) 810-0062-831<br>
					<strong>phone:</strong>&nbsp;+234 (0) 706-7172-511<br>
					<strong>Email:</strong>&nbsp;<a href="#">excellentloaded@gmail.com</a>								
				</p>
				<br/>
				<h5>OFFICE IN UYO</h5>
				<p><strong>Phone:</strong>&nbsp;+234 (0) 701-1188-312<br>
					<strong>Email:</strong>&nbsp;<a href="#">donlegendary@yahoo.com</a>					
				</p>
			</div>
		</div>
		<div class="span7">
			<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
			<form method="post" action="#">
				<fieldset>
					<div class="clearfix">
						<label for="name"><span>Name:</span></label>
						<div class="input">
							<input tabindex="1" size="18" id="name" name="name" type="text" value="" class="input-xlarge" placeholder="Name">
						</div>
					</div>

					<div class="clearfix">
						<label for="email"><span>Email:</span></label>
						<div class="input">
							<input tabindex="2" size="25" id="email" name="email" type="text" value="" class="input-xlarge" placeholder="Email Address">
						</div>
					</div>

					<div class="clearfix">
						<label for="message"><span>Message:</span></label>
						<div class="input">
							<textarea tabindex="3" class="input-xlarge" id="message" name="body" rows="7" placeholder="Message"></textarea>
						</div>
					</div>

					<div class="actions">
						<button tabindex="3" type="submit" class="btn btn-inverse">Send message</button>
					</div>
				</fieldset>
			</form>
		</div>				
	</div>
</section>	
@endsection