@extends('layouts.backend')

@section('title', trans('ds.slies'))

@section('content')
	<h2>@lang('ds.slides')</h2>
	@if (count($slides) > 0)
		<table class="table table-condensed table-bordered table-striped">
			<thead>
				<tr>
					<th>@lang('base.name')</th>
					<th class="fit">@lang('base.last_changed')</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($slides->sortByDesc('updated_at') as $slide)
					<tr>
						<td>{{ $slide->name }}</td>
						<td class="fit" title="{{ $slide->updated_at }}">{{ $slide->updated_at->diffForHumans() }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<div class="alert alert-info" role="alert">No Slides have been added yet.</div>
	@endif
@endsection
