<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
