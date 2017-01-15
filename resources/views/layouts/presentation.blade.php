@extends('layouts.base')

@section('body_class', 'presentation')

@section('layout_content')
	@yield('content')
	<script src="{{asset('js/app.js')}}"></script>
@endsection
