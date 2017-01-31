<div class="form-group">
	{{ Form::label($name, $label, ['class' => 'control-label']) }}
    <div class="input-group colorpicker-component">
        {{ Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) }} <span class="input-group-addon"><i></i></span>
    </div>
	@if (!empty($help))<span class="help-block">{{ $help }}</span>@endif
</div>
