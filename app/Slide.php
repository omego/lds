<?php

namespace App;

use Qwildz\LocalizedEloquentDate\LocalizedEloquent as Model;

class Slide extends Model
{
    /**
     * The channels that belong to the user.
     */
    public function channels()
    {
        return $this->belongsToMany('App\Channel')
			->withTimestamps();
    }
	
    public function getShowOnSelectedDaysAttribute($value)
    {
        return !empty($value) ? json_decode($value) : array();
    }

	public function setShowOnSelectedDaysAttribute($value)
    {
		$this->attributes['show_on_selected_days'] = !empty($value) ? json_encode(is_array($value) ? $value : array($value)) : null;
    }

	public function getStyleArg() {
		$styles = [];
		if (!empty($this->background_color)) {
			$styles[ 'background-color' ] = $this->background_color;
		}
		if (!empty($this->background_image)) {
			$styles[ 'background-image' ] = 'url(\''.$this->background_image . '\')';
		}
		if (count($styles) > 0) {
			return ' style="' . implode('; ', array_map(
					function ($k, $v) { return $k . ': ' . $v; },
					array_keys($styles),
					array_values($styles)
			)) . '"';
		}
		return '';
	}
}
