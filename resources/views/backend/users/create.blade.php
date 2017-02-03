@extends('layouts.backend')

@section('title', trans('base.create_user'))

@section('content')
	<h2>@lang('base.create_user')</h2>
	
	@include('backend.users.form', [ 'form_method' => 'post', 'form_route' => ['backend.users.store'], 'user' => null ])

@endsection
