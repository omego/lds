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
			  <li role="presentation" class="active"><a href="#slider" aria-controls="slider" role="tab" data-toggle="tab">Slider</a></li>
			  <li role="presentation"><a href="#dock" aria-controls="dock" role="tab" data-toggle="tab">Dock</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
                
                <!-- Slider -->
				<div role="tabpanel" class="tab-pane active" id="slider">

                    {{ Form::bsNumber('slider_display_duration', Setting::get('slider_display_duration', 3000), trans('ds.slider_display_duration'), [ 'min' => 0 ]) }}

                    {{ Form::bsNumber('slider_transition_duration', Setting::get('slider_transition_duration', 500), trans('ds.slider_transition_duration'), [ 'min' => 0 ]) }}

				</div>
                
                <!-- Dock -->
				<div role="tabpanel" class="tab-pane" id="dock">
					
                    {{ Form::bsCheckbox( 'dock_show', 1, trans('ds.show_dock'), Setting::get('dock_show', false) ) }}

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Dock background color -->
                            <div class="form-group">
                                {{ Form::label('dock_background_color', trans('base.background_color'), ['class' => 'control-label']) }}
                                <div class="input-group colorpicker-component">
                                    {{ Form::text('dock_background_color', Setting::get('dock_background_color', null), ['class' => 'form-control']) }} <span class="input-group-addon"><i></i></span>
                                </div>
                            </div>                         
                        </div>
                        <div class="col-md-6">
                            <!-- Dock foreground color -->
                            <div class="form-group">
                                {{ Form::label('dock_foreground_color', trans('base.foreground_color'), ['class' => 'control-label']) }}
                                <div class="input-group colorpicker-component">
                                    {{ Form::text('dock_foreground_color', Setting::get('dock_foreground_color', null), ['class' => 'form-control']) }} <span class="input-group-addon"><i></i></span>
                                </div>
                            </div>
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