@extends('layouts.backend')

@section('title', trans('ds.edit_channel'))

@section('content')
	<h2>@lang('ds.edit_channel')</h2>

	<p>
		<strong>@lang('ds.channel_url'):</strong> <a href="{{ route('frontend.channel', $channel) }}" title="@lang('ds.frontend_view')" target="_blank">{{ route('frontend.channel', $channel) }}</a>
	</p>

	@include('backend.channels.form', [ 'form_method' => 'put', 'form_route' => ['backend.channels.update', $channel], 'channel' => $channel ])
	
@endsection
