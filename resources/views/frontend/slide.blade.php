@extends('layouts.presentation')

@section('title', $slide->name . " | " . trans('ds.slide'))

@section('content')
	<div class="slider">
		@include('frontend.single_slide')
	</div>
@endsection
