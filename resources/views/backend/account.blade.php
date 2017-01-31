@extends('layouts.backend')

@section('title', trans('base.user_account'))

@section('content')
	<h2>@lang('base.user_account')</h2>
	
	@include('components.messages.validation')
	@include('components.messages.success')
    
	{!! Form::model($user, ['route' => 'backend.account.update']) !!}
    
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('base.user_data')</div>
                    <div class="panel-body">
                        {{ Form::bsText('name', null, trans('base.name')) }}
                        {{ Form::bsText('email', null, trans('base.email')) }}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('base.change_password')</div>
                    <div class="panel-body">
                        {{ Form::bsPassword('currentPassword', trans('base.current_password')) }}
                        {{ Form::bsPassword('newPassword', trans('base.new_password')) }}
                        {{ Form::bsPassword('newPassword_confirmation', trans('base.repeat_new_password')) }}
                    </div>
                </div>
            </div>
        </div>

		<p>
			<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> @lang('base.save')</button> 
		</p>
	{!! Form::close() !!}
@endsection
