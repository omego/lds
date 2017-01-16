@extends('layouts.backend')

@section('title', trans('ds.create_channel'))

@section('content')
	<h2>@lang('ds.create_channel')</h2>

	@include('components.messages.validation')
	
	{!! Form::model(null, ['route' => ['backend.channels.store']]) !!}
		{{ Form::bsText('name', null, trans('base.name') ) }}
		<p>
			<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @lang('base.save')</button> 
			<a href="{{ route('backend.channels') }}" class="btn btn-default"><i class="fa fa-times"></i> @lang('base.cancel')</a>
		</p>
	{!! Form::close() !!}
@endsection

@section('script')
	$(function(){
		$('#name').focus();
	});
@endsection