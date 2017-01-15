@if (count($errors) > 0)
	<div class="alert alert-danger" role="alert"><strong><i class="fa fa-times"></i> @lang('base.invalid_input')</strong>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

