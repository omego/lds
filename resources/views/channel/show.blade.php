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
<a class="btn btn-danger" href="#">
  <i class="fa fa-trash-o fa-lg"></i> Delete</a>
<a class="btn btn-default btn-sm" href="#">
  <i class="fa fa-cog"></i> Settings</a>

<a class="btn btn-lg btn-success" href="#">
  <i class="fa fa-flag fa-2x pull-left"></i> Font Awesome<br>Version 4.7.0</a>
@endsection
