<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Qwildz\LocalizedEloquentDate\LocalizedEloquent as Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Channel extends Model
{
	use Sluggable;
	use SluggableScopeHelpers;
	
    /**
     * The slides that belong to the user.
     */
    public function slides()
    {
        return $this->belongsToMany('App\Slide')
			->withTimestamps();
    }
	
	public function publishedSlides() {
		return $this->slides()->where('published', 1)->get();		
	}

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return $this->getSlugKeyName();
    }

}
