<div class="slide" {!! $slide->getStyleArg([
    'background-color' => Setting::get('style_slide_background_color'),
    'color' => Setting::get('style_slide_foreground_color'),
    'font-size' => null !== Setting::get('style_slide_font_size') ? Setting::get('style_slide_font_size') . Setting::get('style_slide_font_size_type', 'px') : null,
]) !!}>
	{!! $slide->content !!}
</div>
