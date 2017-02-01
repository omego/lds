@extends('layouts.backend')

@section('title', trans('ds.create_slide'))

@section('content')
	<h2>@lang('ds.create_slide')</h2>

	@include('backend.slides.form', [ 'form_method' => 'post', 'form_route' => [ 'backend.slides.store' ], 'slide' => null ])
	
@endsection
