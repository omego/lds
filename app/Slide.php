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

}
