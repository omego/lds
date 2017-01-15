@extends('layouts.backend')

@section('title', trans('ds.edit_channel'))

@section('content')
	<h2>@lang('ds.edit_channel')</h2>
	{!! Form::model($channel, ['route' => ['backend.channels.update', $channel]]) !!}
		{{ Form::bsText('name') }}
		<p>
			<button type="submit" class="btn btn-primary">@lang('base.save')</button> 
			<a href="{{ route('backend.channels') }}" class="btn btn-default">@lang('base.cancel')</a>
		</p>
	{!! Form::close() !!}
@endsection
