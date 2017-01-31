@extends('layouts.backend')

@section('title', trans('ds.settings'))

@section('content')
	<h2>@lang('ds.settings')</h2>
	
	@include('components.messages.validation')
	@include('components.messages.success')

	{!! Form::open(['route' => 'backend.settings.update']) !!}
		<div>
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			  <li role="presentation" class="active"><a href="#slider" aria-controls="slider" role="tab" data-toggle="tab">@lang('ds.slider')</a></li>
			  <li role="presentation"><a href="#style" aria-controls="style" role="tab" data-toggle="tab">@lang('ds.slide_style')</a></li>
			  <li role="presentation"><a href="#dock" aria-controls="dock" role="tab" data-toggle="tab">@lang('ds.dock')</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
                
                <!-- Slider -->
				<div role="tabpanel" class="tab-pane active" id="slider">

                    {{ Form::bsNumber('slider_display_duration', Setting::get('slider_display_duration', 3000), trans('ds.slider_display_duration'), [ 'min' => 0 ]) }}

                    {{ Form::bsNumber('slider_transition_duration', Setting::get('slider_transition_duration', 500), trans('ds.slider_transition_duration'), [ 'min' => 0 ]) }}

				</div>

                <!-- Style -->
				<div role="tabpanel" class="tab-pane" id="style">

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Slide background color -->
                            {{ Form::bsColor('style_slide_background_color', Setting::get('style_slide_background_color'), trans('base.background_color')) }}
                        </div>
                        <div class="col-md-6">
                            <!-- Slide foreground color -->
                            {{ Form::bsColor('style_slide_foreground_color', Setting::get('style_slide_foreground_color'), trans('base.foreground_color')) }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <!-- Font size -->
                            {{ Form::bsNumber('style_slide_font_size', Setting::get('style_slide_font_size'), trans('base.font_size'), [ 'min' => 0, 'placeholder' => 14, 'step' => 0.1 ]) }}
                        </div>
                        <div class="col-md-4">
                            <!-- Font size type -->
                            {{ Form::bsSelect('style_slide_font_size_type', [ 'px' => trans('base.pixel'), 'pt' => trans('base.point'), 'vw' => trans('base.viewport_width'), 'vh' => trans('base.viewport_height') ], Setting::get('style_slide_font_size_type'), trans('base.type')) }}
                        </div>
                    </div>
                    
				</div>

                <!-- Dock -->
				<div role="tabpanel" class="tab-pane" id="dock">
					
                    <!-- Dock enable -->
                    {{ Form::bsCheckbox( 'dock_show', 1, trans('ds.show_dock'), Setting::get('dock_show', false) ) }}

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Dock background color -->
                            {{ Form::bsColor('dock_background_color', Setting::get('dock_background_color'), trans('base.background_color')) }}
                        </div>
                        <div class="col-md-6">
                            <!-- Dock foreground color -->
                            {{ Form::bsColor('dock_foreground_color', Setting::get('dock_foreground_color'), trans('base.foreground_color')) }}
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<p>
			<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @lang('base.save')</button> 
		</p>
	{!! Form::close() !!}
@endsection

@section('script')
	$(function() { 
		// for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			// save the latest tab; use cookies if you like 'em better:
			localStorage.setItem('lastTab', $(this).attr('href'));
		});

		// go to the latest tab, if it exists:
		var lastTab = localStorage.getItem('lastTab');
		if (lastTab) {
			$('[href="' + lastTab + '"]').tab('show');
		}
        
        // Color picker
		$('.colorpicker-component').colorpicker({
			 colorSelectors: { 'black': '#000000', 'white': '#ffffff', 'red': '#FF0000', 'default': '#777777', 'primary': '#337ab7', 'success': '#5cb85c', 'info': '#5bc0de', 'warning': '#f0ad4e', 'danger': '#d9534f' }
		});

	});
@endsection