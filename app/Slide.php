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
}
