@extends('layouts.backend')

@section('title', trans('ds.edit_slide'))

@section('content')
	<h2>@lang('ds.edit_slide')</h2>
	
	@include('components.messages.validation')

	{!! Form::model($slide, [  'method' => 'put', 'route' => ['backend.slides.update', $slide] ]) !!}
		<div class="row">
			<div class="col-md-8">
                
                <!-- Content -->
				{{ Form::bsText('name', null, trans('base.name')) }}
				{{ Form::bsTextarea('content', null, trans('base.content')) }}
               
			</div>
			<div class="col-md-4">

                <!-- Buttons -->
                <div class="panel panel-default">
					<div class="panel-body">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @lang('base.save')</button> 
                        <a href="{{ route('frontend.slide', [ $slide ] ) }}" target="_blank" class="btn btn-default"><i class="fa fa-eye"></i> @lang('ds.frontend_view')</a>
                        <a href="{{ route('backend.slides') }}" class="btn btn-default"><i class="fa fa-times"></i></a>
					</div>
				</div>
		
                <!-- Display options -->
				<div class="panel panel-default">
					<div class="panel-heading">@lang('ds.display_options')</div>
					<div class="panel-body">
						<div class="checkbox">
							{{ Form::checkbox('published', '1', null, [ 'id' => 'published', 'data-toggle' => 'toggle', 'data-size' => 'small' ]) }}
							<label for="published">@lang('ds.published')</label>						  
						</div>

                        <div class="checkbox">
							<input type="checkbox" data-toggle="toggle" data-size="small" name="weekday_selector_toggle" id="weekday-selector-toggle" value="1"  data-toggle-container="weekday-selector"> 
							<label>@lang('ds.only_show_on_selected_days')</label>
						</div>
						<div class="weekday-selector" id="weekday-selector">
							{{ Form::bsMultiCheckbox('show_on_selected_days[]', DateHelper::getLocalizedDays()) }}
						</div>

                        <div class="checkbox">
							<input type="checkbox" data-toggle="toggle" data-size="small" name="date_from_selector_toggle" id="date-from-selector-toggle" value="1" data-toggle-container="date-from-selector">
							<label>@lang('ds.not_show_before_date')</label>
						</div>
                        <div class="date-from-selector" id="date-from-selector">
                            {{ Form::bsText('date_from', null, trans('ds.date_and_time'), [ 'class' => 'form-control date-time-picker' ] ) }}
                        </div>

						<div class="checkbox">
							<input type="checkbox" data-toggle="toggle" data-size="small" name="date_to_selector_toggle" id="date-to-selector-toggle" value="1" data-toggle-container="date-to-selector">
							<label>@lang('ds.not_show_after_date')</label>
						</div>
                        <div class="date-to-selector" id="date-to-selector">
                            {{ Form::bsText('date_to', null, trans('ds.date_and_time'), [ 'class' => 'form-control date-time-picker' ] ) }}
                        </div>
                    </div>
				</div>

                <!-- Channels -->
				<div class="panel panel-default">
					<div class="panel-heading">@lang('ds.channels')</div>
					<div class="panel-body">
						{{ Form::bsMultiCheckbox('channels[]', $channels) }}
					</div>
				</div>

                <!-- Style -->
				<div class="panel panel-default">
					<div class="panel-heading">@lang('ds.style_options')</div>
					<div class="panel-body">
						<div class="form-group">
							{{ Form::label('background_color', trans('base.background_color'), ['class' => 'control-label']) }}
							<div class="input-group colorpicker-component">
								{{ Form::text('background_color', null, ['class' => 'form-control']) }} <span class="input-group-addon"><i></i></span>
							</div>
						</div>
						{{ Form::bsText('background_image', null, trans('base.background_image')) }}
					</div>
				</div>
                
			</div>
		</div>
	{!! Form::close() !!}
@endsection

@section('script')
	$(document).ready(function(){

		if ($('#weekday-selector').find('input[type="checkbox"]:checked').length == 0) {
			$('#weekday-selector').hide();
		} else {
			$('#weekday-selector-toggle').prop('checked', true).change();
		}

		if (!$('#date-from-selector').find('input[type="text"]').val()) {
			$('#date-from-selector').hide();
		} else {
			$('#date-from-selector-toggle').prop('checked', true).change();
		}

		if (!$('#date-to-selector').find('input[type="text"]').val()) {
			$('#date-to-selector').hide();
		} else {
			$('#date-to-selector-toggle').prop('checked', true).change();
		}

        $('.date-time-picker').datetimepicker({
            format: 'Y-m-d H:i'
        });

        $('input[data-toggle-container]').change(function() {
            var container = $( '#' + $(this).attr('data-toggle-container') );
			if ($(this).prop('checked')) {
				container.fadeIn();
			} else {
				container.fadeOut();
			}
		});

		$('.colorpicker-component').colorpicker({
			 colorSelectors: { 'black': '#000000', 'white': '#ffffff', 'red': '#FF0000', 'default': '#777777', 'primary': '#337ab7', 'success': '#5cb85c', 'info': '#5bc0de', 'warning': '#f0ad4e', 'danger': '#d9534f' }
		});

		tinymce.init({ selector:'textarea',
			menubar: false,
			height: 400,
			plugins: [
			  'link image lists media emoticons textcolor'
			],
			toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | media fullpage | forecolor backcolor'
		});
	});
@endsection