@extends('layouts.backend')

@section('title', trans('base.edit_user'))

@section('content')
	<h2>@lang('base.edit_user')</h2>

	@include('backend.users.form', [ 'form_method' => 'put', 'form_route' => ['backend.users.update', $user], 'user' => $user ])

@endsection
