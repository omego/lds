@extends('layouts.presentation')

@section('title', $slide->name . " | " . trans('ds.slide'))

@section('content')
	<div class="slider" data-slick='{"autoplaySpeed":3000,"speed":500}'>
		@include('frontend.single_slide')
	</div>
@endsection
