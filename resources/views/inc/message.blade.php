@if (session()->has('success'))
	<div class="alert alert-success">
	{{ session()->get('success')}}
</div>
@endif

@if (session()->has('delete'))
	<div class="alert alert-danger">
	{{ session()->get('delete')}}
</div>
@endif

@if (session()->has('coupon_error'))
	<div class="alert alert-danger">
	{{ session()->get('coupon_error')}}
</div>
@endif

@if (count($errors) > 0)
	@foreach ($errors as $error)
		{{ $error }}
	@endforeach
@endif