@extends('layouts.presentation')

@section('title', $channel->name . " | " . trans('ds.channel'))

@section('content')
	@if (count($channel->publishedSlides()) > 0)
		<div class="slider" data-slick='{"autoplaySpeed":{{ Setting::get('slider_display_duration', 3000) }},"speed":{{ Setting::get('slider_transition_duration', 500) }}}'>
			@foreach ($channel->publishedSlides()->sortByDesc('updated_at') as $slide)
				@include('frontend.single_slide')
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
