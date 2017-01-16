@extends('layouts.backend')

@section('title', trans('ds.slides'))

@section('content')
	<h2>@lang('ds.slides')</h2>

	@include('components.messages.success')

	@if (count($slides) > 0)
		<table class="table table-condensed table-bordered table-striped">
			<thead>
				<tr>
					<th>@lang('base.name')</th>
					<th class="fit">@lang('ds.channels')</th>
					<th class="fit">@lang('ds.published')</th>
					<th class="fit">@lang('base.last_changed')</th>
					<th class="fit">@lang('base.actions')</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($slides->sortByDesc('updated_at') as $slide)
					<tr>
						<td><a href="{{ route('backend.slides.edit', $slide) }}">{{ $slide->name }}</a></td>
						<td class="fit">{{ $slide->channels->map(function ($item, $key) {
							return $item->name;
						})->implode(', ') }}</td>
						<td class="fit text-center">
							@if ($slide->published) 
    							{!! Form::open([ 'method' => 'put', 'route' => ['backend.slides.unpublish', $slide] ]) !!}
                                	<button type="submit" class="btn btn-xs btn-link delete-submit" title="@lang('ds.unpublish')"><i class="fa fa-check text-success"></i></button>
								{!! Form::close() !!}
                            @else
        						{!! Form::open([ 'method' => 'put', 'route' => ['backend.slides.publish', $slide] ]) !!}
                            		<button type="submit" class="btn btn-xs btn-link delete-submit" title="@lang('ds.publish')"><i class="fa fa-times text-muted"></i></button>
    							{!! Form::close() !!}
							@endif
						</td>
						<td class="fit" title="{{ $slide->updated_at->format(config('app.date_format')) }}">{{ $slide->updated_at->diffForHumans() }}</td>
						<td class="fit text-center">
  							<a href="{{ route('backend.slides.edit', $slide) }}" title="@lang('base.edit')"><i class="fa fa-pencil"></i></a> &nbsp;
							<a href="{{ route('frontend.slide', $slide) }}" title="@lang('ds.frontend_view')" target="_blank"><i class="fa fa-eye"></i></a>
							{!! Form::open([ 'method' => 'delete', 'route' => ['backend.slides.destroy', $slide] ]) !!}
								<button type="submit" class="btn btn-xs btn-link delete-submit" title="@lang('base.delete')"><i class="fa fa-trash"></i></button> 
							{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<div class="alert alert-info" role="alert">@lang('ds.no_slides_added')</div>
	@endif
@endsection
