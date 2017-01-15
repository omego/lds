@extends('layouts.backend')

@section('title', trans('ds.settings'))

@section('content')
	<h2>@lang('ds.settings')</h2>
	{!! Form::open(['route' => 'backend.settings.update']) !!}
		{{ Form::bsNumber('slide_display_duration', '3000') }}
		{{ Form::bsNumber('slide_transition_duration', '500') }}
		<p>
			<button type="submit" class="btn btn-primary">@lang('base.save')</button> 
		</p>
	{!! Form::close() !!}
@endsection
