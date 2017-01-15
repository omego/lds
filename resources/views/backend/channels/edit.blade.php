@extends('layouts.backend')

@section('title', trans('ds.edit_channel'))

@section('content')
	<h2>@lang('ds.edit_channel')</h2>
	{!! Form::model($channel, ['route' => ['backend.channels.update', $channel]]) !!}
		{{ Form::bsText('name') }}
		<button type="submit" class="btn btn-primary">@lang('base.save')</button>	
	{!! Form::close() !!}
@endsection
