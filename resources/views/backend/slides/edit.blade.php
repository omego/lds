@extends('layouts.backend')

@section('title', trans('ds.edit_slide'))

@section('content')
	<h2>@lang('ds.edit_slide')</h2>
	{!! Form::model($slide, ['route' => ['backend.slides.update', $slide]]) !!}
		<div class="row">
			<div class="col-md-8">
				{{ Form::bsText('name') }}
				{{ Form::bsTextarea('content') }}
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
			</div>
		</div>
		<p>
			<button type="submit" class="btn btn-primary">@lang('base.save')</button> 
			<a href="{{ route('backend.slides') }}" class="btn btn-default">@lang('base.cancel')</a>
		</p>
	{!! Form::close() !!}
@endsection

@section('script')
	$(document).ready(function(){
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