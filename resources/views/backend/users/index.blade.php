@extends('layouts.backend')

@section('title', trans('base.users'))

@section('content')
	<h2>@lang('base.users')
		<span class="pull-right">
			<a href="{{ route('backend.users.create') }}" class="btn btn-default"><i class="fa fa-plus-circle"></i> @lang('base.create_user')</a>
		</span>
	</h2>

	@include('components.messages.success')
	@include('components.messages.validation')

	@if (count($users) > 0)
		<table class="table table-condensed table-bordered table-striped">
			<thead>
				<tr>
					<th>@lang('base.name')</th>
					<th>@lang('base.email')</th>
					<th class="fit">@lang('base.last_changed')</th>
					<th class="fit">@lang('base.actions')</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users->sortBy('name') as $user)
					<tr>
						<td><a href="{{ route('backend.users.edit', $user) }}">{{ $user->name }}</a></td>
						<td>{{ $user->email }}</td>
						<td class="fit" title="{{ $user->updated_at->format(config('app.date_format')) }}">{{ $user->updated_at->diffForHumans() }}</td>
						<td class="fit text-center">
							<a href="{{ route('backend.users.edit', $user) }}" title="@lang('base.edit')"><i class="fa fa-pencil"></i></a> &nbsp;
							@if ($user->id != Auth::id())
							{!! Form::open([ 'method' => 'delete', 'route' => ['backend.users.destroy', $user] ]) !!}
								<button type="submit" class="btn btn-xs btn-link delete-submit" title="@lang('base.delete')"><i class="fa fa-trash"></i></button> 
							{!! Form::close() !!}
							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<div class="alert alert-info" role="alert">@lang('base.no_users_added')</div>
	@endif
@endsection

@section('script')
	$(function(){
		$('.delete-submit').click(function(e){
			if (!confirm('@lang('base.really_delete_this_user')')) {
				e.preventDefault();
			}
		});
	});
@endsection
