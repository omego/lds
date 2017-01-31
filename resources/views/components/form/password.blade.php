<div class="form-group">
	{{ Form::label($name, $label, ['class' => 'control-label']) }}
	{{ Form::password($name, array_merge(['class' => 'form-control'], $attributes)) }}
	@if (!empty($help))<span class="help-block">{{ $help }}</span>@endif
</div>
