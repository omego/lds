@extends('layouts.frontend')

@section('title', 'Welcome')

@section('content')
	<div class="container">
		<h1>{{ Config::get('app.name') }}</h1>
		<div class="row">
			<div class="col-md-6">
				<h2>Frontend</h2>
				<div class="panel panel-default">
					<div class="panel-heading">Channels</div>
					<ul class="list-group">
						@foreach ($channels->sortBy('name') as $channel)
							<li class="list-group-item">
								<a href="{{ route('frontend.channel', [ $channel ] ) }}">{{ $channel->name }}</a>
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
						TODO
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
