<div class="form-group">
	{{ Form::label($name, null, ['class' => 'control-label']) }}
	{{ Form::select($name, $items, $value, array_merge(['class' => 'form-control', 'multiple' => true], $attributes)) }}
</div>
