<div class="form-group">
	{{ Form::label($name, $label, ['class' => 'control-label']) }}
	{{ Form::select($name, $items, $value, array_merge(['class' => 'form-control'], $attributes)) }}
</div>
