@extends('layouts.backend')

@section('title', trans('ds.slies'))

@section('content')
	<h2>@lang('ds.slides')</h2>
	@if (count($slides) > 0)
		<table class="table table-condensed table-bordered table-striped">
			<thead>
				<tr>
					<th>@lang('base.name')</th>
					<th class="fit">@lang('ds.channels')</th>
					<th class="fit">@lang('base.last_changed')</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($slides->sortByDesc('updated_at') as $slide)
					<tr>
						<td><a href="{{ route('backend.slides.edit', $slide) }}">{{ $slide->name }}</a></td>
						<td class="fit">{{ $slide->channels->map(function ($item, $key) {
							return $item->name;
						})->implode(', ') }}</td>
						<td class="fit" title="{{ $slide->updated_at->format(config('app.date_format')) }}">{{ $slide->updated_at->diffForHumans() }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<div class="alert alert-info" role="alert">@lang('ds.no_slides_added')</div>
	@endif
@endsection
