<div class="slide" {!! $slide->getStyleArg([
    'background-color' => Setting::get('style_slide_background_color'),
    'color' => Setting::get('style_slide_foreground_color'),
]) !!}>
	{!! $slide->content !!}
</div>
