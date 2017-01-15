@extends('layouts.backend')

@section('title', 'Channels')

@section('content')
	<h2>Channels</h2>
	@if (count($channels) > 0)
		<table class="table table-condensed table-bordered table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Changed</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($channels->sortBy('name') as $channel)
					<tr>
						<td>{{ $channel->name }}</td>
						<td>{{ $channel->updated_at }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<div class="alert alert-info" role="alert">No Channels have been defined yet.</div>
	@endif
@endsection
