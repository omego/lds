@extends('layouts.frontend')

@section('title', $channel->name)

@section('content')
<h1>{{ $channel->name }}</h1>
<ul class="bxslider">
	@foreach ($channel->slides->sortBy('updated_at') as $slide)
		<li>
			<h2>{{ $slide->title }}</h2>
			<h3>{{ $slide->subtitle }}</h3>
			{!! $slide->content !!}
		</li>
	@endforeach
</ul>
@endsection

@section('script')
    $(document).ready(function(){
        $('.bxslider').bxSlider({
            mode: 'fade',
            speed: 500,
            pause: 3000,
            auto: true,
            pager: false          
        });
    });
@endsection
