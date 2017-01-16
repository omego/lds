@extends('layouts.backend')

@section('title', trans('ds.channels'))

@section('content')
	<h2>@lang('ds.channels')
		<span class="pull-right">
			<a href="{{ route('backend.channels.create') }}" class="btn btn-default"><i class="fa fa-plus-circle"></i> @lang('ds.create_channel')</a>
		</span>
	</h2>

	@include('components.messages.success')

	@if (count($channels) > 0)
		<table class="table table-condensed table-bordered table-striped">
			<thead>
				<tr>
					<th>@lang('base.name')</th>
					<th class="fit"># @lang('ds.slides')</th>
					<th class="fit">@lang('base.last_changed')</th>
					<th class="fit">@lang('base.actions')</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($channels->sortBy('name') as $channel)
					<tr>
						<td><a href="{{ route('backend.channels.edit', $channel) }}">{{ $channel->name }}</a></td>
						<td class="fit text-center">{{ $channel->slides->count() }}</td>
						<td class="fit" title="{{ $channel->updated_at->format(config('app.date_format')) }}">{{ $channel->updated_at->diffForHumans() }}</td>
						<td class="fit text-center">
							<a href="{{ route('backend.channels.edit', $channel) }}" title="@lang('base.edit')"><i class="fa fa-pencil"></i></a> &nbsp;
							<a href="{{ route('frontend.channel', $channel) }}" title="@lang('ds.frontend_view')" target="_blank"><i class="fa fa-eye"></i></a>
							{!! Form::open([ 'method' => 'delete', 'route' => ['backend.channels.destroy', $channel] ]) !!}
								<button type="submit" class="btn btn-xs btn-link" title="@lang('base.delete')"><i class="fa fa-trash"></i></button> 
							{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<div class="alert alert-info" role="alert">@lang('ds.no_channels_added')</div>
	@endif
@endsection
