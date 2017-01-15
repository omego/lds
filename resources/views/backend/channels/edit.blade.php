@extends('layouts.backend')

@section('title', trans('ds.edit_channel'))

@section('content')
	<h2>@lang('ds.edit_channel')</h2>

	@include('components.messages.validation')

	<p>
		<strong>@lang('ds.channel_url'):</strong> <a href="{{ route('frontend.channel', $channel) }}" title="@lang('ds.frontend_view')" target="_blank">{{ route('frontend.channel', $channel) }}</a>
	</p>
	
	{!! Form::model($channel, ['route' => ['backend.channels.update', $channel]]) !!}
		{{ Form::bsText('name', null, trans('base.name') ) }}
		<p>
			<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @lang('base.save')</button> 
			<a href="{{ route('backend.channels') }}" class="btn btn-default"><i class="fa fa-times"></i> @lang('base.cancel')</a>
		</p>
	{!! Form::close() !!}
@endsection
