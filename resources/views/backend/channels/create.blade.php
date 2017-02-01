@extends('layouts.backend')

@section('title', trans('ds.create_channel'))

@section('content')
	<h2>@lang('ds.create_channel')</h2>
	
	@include('backend.channels.form', [ 'form_method' => 'post', 'form_route' => ['backend.channels.store'], 'channel' => null ])

@endsection
