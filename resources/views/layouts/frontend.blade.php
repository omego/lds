@extends('layouts.base')

@section('body_class', 'frontend')

@section('layout_content')
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ route('frontend.index') }}">
					<i class="fa fa-television"></i> {{ config('app.name', 'Laravel') }}
				</a>
			</div>
		</div>
	</nav>
	<div class="container">
		@yield('content')
	</div>
	<script src="{{asset('js/app.js')}}"></script>
@endsection
