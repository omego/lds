@extends('layouts.backend')

@section('title', 'Dashboard')

@section('content')
	<h2>@lang('ds.dashboard')</h2>

	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">@lang('ds.channels')</div>
				<table class="table">
					@foreach ($channels->sortBy('name') as $channel)
						<tr>
							<td><a href="{{ route('backend.channels.edit', [ $channel ] ) }}">{{ $channel->name }}</a></td>
							<td class="fit">{{ trans_choice('ds.n_slides', $channel->slides->count(), [ 'count' => $channel->slides->count() ]) }}</td>
							<td class="fit"><a href="{{ route('backend.channels.edit', [ $channel ] ) }}" title="@lang('base.edit')"><i class="fa fa-pencil"></i></a></td>
							<td class="fit"><a href="{{ route('frontend.channel', [ $channel ] ) }}" target="_blank" title="@lang('ds.frontend_view')"><i class="fa fa-eye"></i></a></td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">@lang('ds.recently_updated_slides')
					<span class="pull-right"><a href="{{ route('backend.slides') }}">@lang('base.show_all')</a></span>
				</div>
				<table class="table">
					@foreach ($slides as $slide)
						<tr>
							<td><a href="{{ route('backend.slides.edit', [ $slide ] ) }}">{{ $slide->name }}</a></td>
							<td class="fit">{{ $slide->updated_at->diffForHumans() }}</td>
							<td class="fit"><a href="{{ route('backend.slides.edit', [ $slide ] ) }}" title="@lang('base.edit')"><i class="fa fa-pencil"></i></a></td>
							<td class="fit"><a href="{{ route('frontend.slide', [ $slide ] ) }}" target="_blank" title="@lang('ds.frontend_view')"><i class="fa fa-eye"></i></a></td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
@endsection
