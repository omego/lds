@extends('layouts.frontend')

@section('title', $channel->name)

@section('content')
<ul>
	@foreach ($channel->slides->sortBy('updated_at') as $slide)
		<li>
			<h2>{{ $slide->title }}</h2>
			<h3>{{ $slide->subtitle }}</h3>
			{!! $slide->content !!}
		</li>
	@endforeach
</ul>
@endsection
