@extends('layouts.backend')

@section('title', trans('ds.edit_slide'))

@section('content')
	<h2>@lang('ds.edit_slide')</h2>
	
	@include('components.messages.validation')

	{!! Form::model($slide, ['route' => ['backend.slides.update', $slide]]) !!}
		<div class="row">
			<div class="col-md-8">
				{{ Form::bsText('name', null, trans('base.name')) }}
				{{ Form::bsTextarea('content', null, trans('base.content')) }}
			</div>
			<div class="col-md-4">
				
				<div class="panel panel-default">
					<div class="panel-heading">@lang('ds.display_options')</div>
					<div class="panel-body">
						<div class="checkbox">
							{{ Form::checkbox('published', '1', null, ['data-toggle' => 'toggle', 'data-size' => 'small' ]) }}
							<label>@lang('ds.published')</label>						  
						</div>
						<!--
						<div class="checkbox">
							<input type="checkbox" data-toggle="toggle" data-size="small"> &nbsp;
							<label>Only show on certain days</label>
						</div>
						<div class="checkbox">
							<input type="checkbox" data-toggle="toggle" data-size="small"> &nbsp;
							<label>Do not show before specified date</label>
						</div>
						<div class="checkbox">
							<input type="checkbox" data-toggle="toggle" data-size="small"> &nbsp;
							<label>Hide after specified date</label>
						</div>
						-->
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">@lang('ds.channels')</div>
					<div class="panel-body">
						{{ Form::bsMultiCheckbox('channels[]', $channels) }}
					</div>
				</div>

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
		<p>
			<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @lang('base.save')</button> 
			<a href="{{ route('frontend.slide', [ $slide ] ) }}" target="_blank" class="btn btn-default"><i class="fa fa-eye"></i> @lang('ds.frontend_view')</a>
			<a href="{{ route('backend.slides') }}" class="btn btn-default"><i class="fa fa-times"></i> @lang('base.cancel')</a>
		</p>
	{!! Form::close() !!}
@endsection

@section('script')
	$(document).ready(function(){
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