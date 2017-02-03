	@include('components.messages.validation')
	
	{!! Form::model($user, [ 'method' => $form_method, 'route' => $form_route ]) !!}
		{{ Form::bsText('name', null, trans('base.name') ) }}
		{{ Form::bsText('email', null, trans('base.email') ) }}
		{{ Form::bsPassword('newPassword', trans('auth.password') ) }}
		{{ Form::bsPassword('newPassword_confirmation', trans('auth.confirm_password') ) }}
		<p>
			<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @lang('base.save')</button> 
			<a href="{{ route('backend.users') }}" class="btn btn-default"><i class="fa fa-times"></i> @lang('base.cancel')</a>
		</p>
	{!! Form::close() !!}

@section('script')
	$(function(){
		if ($('#name').val()) {
			$('#name').select();
		} else {
			$('#name').focus();
		}
	});
@endsection