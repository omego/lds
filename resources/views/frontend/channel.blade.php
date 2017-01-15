@extends('layouts.presentation')

@section('title', $channel->name)

@section('content')
	@if (count($channel->publishedSlides()) > 0)
		<div class="slider" data-slick='{"autoplaySpeed":3000,"speed":500}'>
			@foreach ($channel->publishedSlides()->sortByDesc('updated_at') as $slide)
				<div class="slide" style="background-color: {{ $slide->background_color }}">
					{!! $slide->content !!}
				</div>
			@endforeach
		</div>
	@else
		<div class="no-slides">
			<p>No slides in this channel!</p>
		</div>
	@endif
@endsection

@section('script')
    $(document).ready(function(){
        $('.slider').slick({
			autoplay: true,
			arrows: false,
			fade: true,
			pauseOnFocus: false,
			pauseOnHover: false
        });
    });
@endsection
