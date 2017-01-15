@extends('layouts.backend')

@section('title', trans('ds.channels'))

@section('content')
	<h2>@lang('ds.channels')</h2>
	@if (count($channels) > 0)
		<table class="table table-condensed table-bordered table-striped">
			<thead>
				<tr>
					<th>@lang('base.name')</th>
					<th class="fit">@lang('base.last_changed')</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($channels->sortBy('name') as $channel)
					<tr>
						<td><a href="{{ route('backend.channels.edit', $channel) }}">{{ $channel->name }}</a></td>
						<td class="fit" title="{{ $channel->updated_at->format(config('app.date_format')) }}">{{ $channel->updated_at->diffForHumans() }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<div class="alert alert-info" role="alert">@lang('ds.no_channels_added')</div>
	@endif
@endsection
