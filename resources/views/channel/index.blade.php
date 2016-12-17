@extends('layouts.frontend')

@section('title', 'Channels')

@section('content')
<h1>Channels</h1>
<ul>
	@foreach ($channels->sortBy('name') as $channel)
		<li>
            <a href="{{ route('channel.show', [ $channel ] ) }}">{{ $channel->name }}</a>
		</li>
	@endforeach
</ul>
@endsection
