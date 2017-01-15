@extends('layouts.backend')

@section('title', 'Slides')

@section('content')
	<h2>Slides</h2>
	@if (count($slides) > 0)
		<table class="table table-condensed table-bordered table-striped">
			<thead>
				<tr>
					<th>Name</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($slides->sortBy('name') as $slide)
					<tr>
						<td>{{ $slide->name }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<div class="alert alert-info" role="alert">No Slides have been added yet.</div>
	@endif
@endsection
