@extends('layouts.backend')

@section('title', trans('ds.edit_slide'))

@section('content')
	<h2>@lang('ds.edit_slide')</h2>

	@include('backend.slides.form', [ 'form_method' => 'put', 'form_route' => [ 'backend.slides.update', $slide ], 'slide' => $slide ])
	
@endsection
