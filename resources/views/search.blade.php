@extends('layouts.app')

@section('header')
<link rel="stylesheet" href="{{ asset('bootstrap/css/custom.css') }}" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('bootstrap/css/popup.css') }}" crossorigin="anonymous">
@endsection

@section('content')
<section class="header_text sub">
	<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
	<h4><span>Search Result</span></h4>
</section class="main-content"> 
<section class="main-content">              
	<div class="row">                       
		<div class="accordion" id="accordion2">
			<div style="margin-left: 12%;" class="span10">
				@include('inc.message')
				<h4 class="title"><span class="text"><strong>{{ $search->count() }}</strong> Search Result(s) For '{{ request()->input('search') }}'</span></h4>
				<div class="block">

					<table class="table">
						<thead class="thead-dark">
							@if (count($search) > 0)
							<tr>
								<th scope="col">Name</th>
								<th scope="col">Description</th>
								<th scope="col">Colour</th>
								<th scope="col">price</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($search as $items)
							<tr>
								<th scope="row"><a href="{{ route('products.show', $items->slug) }}">{{ $items->name }}</a></th>
								<td>{!! substr(strip_tags($items->description), 0, 100) !!}</td>
								<td>{{ $items->color }}</td>
								<td>{{ $items->price }}</td>
							</tr>
							@endforeach
							@else
							<h5>No search result found!!</h5>
							@endif
						</tbody>
					</table>
				</div>
				<hr>
				<div class="pager pagination-larage pagination-centered">
					<ul>
						<li>{{ $search->appends(request()->input())->links('vendor.pagination.bootstrap-4') }}</li>
					</ul> 
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
