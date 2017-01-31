@extends('layouts.frontend')

@section('title', 'Welcome')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<h2>Frontend</h2>
			<div class="panel panel-default">
				<div class="panel-heading">@lang('ds.channels')</div>
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
						@if (@App\User::count() > 0)
							@include('auth.login_form')
						@else
							<p>@lang('base.please_create_new_admin_user')</p>
							@include('auth.register_form')
						@endif	
					@else
						<p class="text-success">@lang('base.hello_admin_you_are_logged_in', [ 'name' => Auth::user()->name ])</p>
						<a href="{{ route('backend.dashboard') }}" class="btn btn-primary"><i class="fa fa-cogs"></i> @lang('base.go_to_backend')</a>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection
