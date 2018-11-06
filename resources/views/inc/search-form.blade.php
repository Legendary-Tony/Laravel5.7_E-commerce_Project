@if (count($errors) > 0)
@foreach ($errors->all() as $error)
<div class="alert alert-danger"><a href="">{{ $error }} Try again!!</a></div>
@endforeach
@else
<form action="{{ route('search') }}" method="GET" class="search_form">
	{{-- {{ method_field('GET') }} --}}
	{{-- {{ csrf_field() }} --}}
	<input type="text" id="search" name="search" placeholder="Search for products" class="input-block-level search-query" value="{{ request()->input('search') }}">
</form>
@endif