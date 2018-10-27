@extends('layouts.app')

@section('content')

{{-- <div id="wrapper" class="container"> --}}

	<section class="header_text sub">
		<img class="pageBanner" src="{{ asset('themes/images/pageBanner.png') }}" alt="New products" >
		{{-- <h4><span>New products</span></h4> --}}
	</section>
	<section class="main-content">

		<div class="row">						
			<div  style="padding: 16px 16px; width: 400px; margin-left: 35%"  class="span6 col">	
				<div class="block">	
				<div class="alert  alert-info">
					{{-- <button type="button" class="close">&times;</button> --}}
					<strong>Congratulations!</strong> Your order have successfully placed, you will receive confirmation receipt through your E-mail. <p>Thank You For Patronizing Us.</p>
				</div>
				<a class="btn btn-warning" href="/">Back</a>
			</div>
			</div>
		</div>
	{{-- </div> --}}
</section>

@endsection