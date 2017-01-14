@extends('layouts.frontend')

@section('title', 'Welcome')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<h2>Frontend</h2>
			<div class="panel panel-default">
				<div class="panel-heading">Channels</div>
				<ul class="list-group">
					@foreach ($channels->sortBy('name') as $channel)
						<li class="list-group-item">
							<a href="{{ route('frontend.channel', [ $channel ] ) }}" target="_blank">{{ $channel->name }}</a>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="col-md-6">
			<h2>Backend</h2>
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@if (Auth::guest())
						@include('auth.login_form')
					@else
						<p class="text-success">You are already logged in.</p>
						<a href="{{ route('backend.dashboard') }}" class="btn btn-primary">Go to Backend</a>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection
