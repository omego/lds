<div class="form-group">
	@if ($label)
		{{ Form::label(null, $label, ['class' => 'control-label']) }}
	@endif
	@foreach($elements as $k => $v)
		{{ Form::bsCheckbox($name, $k, $v) }}
	@endforeach
</div>