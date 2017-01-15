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
			  <li role="presentation"><a href="#layout" aria-controls="layout" role="tab" data-toggle="tab">Layout</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="slider">
					{{ Form::bsNumber('slide_display_duration', '3000') }}
					{{ Form::bsNumber('slide_transition_duration', '500') }}
				</div>
				<div role="tabpanel" class="tab-pane" id="layout">
					TODO
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
	});
@endsection