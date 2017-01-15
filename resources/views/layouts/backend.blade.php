@extends('layouts.base')

@section('body_class', 'backend')

@section('layout_content')
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container">
			<div class="navbar-header">

				<!-- Collapsed Hamburger -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<!-- Branding Image -->
				<a class="navbar-brand" href="{{ route('backend.dashboard') }}">
					<i class="fa fa-television"></i> {{ config('app.name', 'Laravel') }}
				</a>
			</div>

			<div class="collapse navbar-collapse" id="app-navbar-collapse">
				<!-- Left Side Of Navbar -->
				<ul class="nav navbar-nav">
					<li class="{{ areActiveRoutes(['backend.channels', 'backend.channels.edit']) }}"><a href="{{ route('backend.channels') }}">@lang('ds.channels')</a></li>
					<li class="{{ areActiveRoutes(['backend.slides', 'backend.slides.edit']) }}"><a href="{{ route('backend.slides') }}">@lang('ds.slides')</a></li>
					<li class="{{ areActiveRoutes(['backend.settings']) }}"><a href="{{ route('backend.settings') }}">@lang('ds.settings')</a></li>
				</ul>

				<!-- Right Side Of Navbar -->
				<ul class="nav navbar-nav navbar-right">
					<!-- Authentication Links -->
					<li class=""><a href="{{ route('frontend.index') }}">Frontend</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="{{ url('/logout') }}"
									onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
									Logout
								</a>

								<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		@yield('content')
	</div>
    <script src="{{asset('js/backend.js')}}"></script>
    
@endsection
