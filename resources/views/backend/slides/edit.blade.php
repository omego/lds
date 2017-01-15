@extends('layouts.backend')

@section('title', trans('ds.edit_slide'))

@section('content')
	<h2>@lang('ds.edit_slide')</h2>
	{!! Form::model($slide, ['route' => ['backend.slides.update', $slide]]) !!}
		{{ Form::bsText('name') }}
		{{ Form::bsTextarea('content') }}
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