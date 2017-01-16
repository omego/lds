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
		return $this->slides()
                ->where('published', 1)
                ->where(function($query){
                    $query->where('date_from', null);
                    $query->orWhere('date_from', '<', time());
                })
                ->where(function($query){
                    $query->where('date_to', null);
                    $query->orWhere('date_to', '>', time());
                })
                ->get();		
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

	public static function getSelectorArray() {
		return self::orderBy('name', 'asc')->get()
				->keyBy('id')
				->map(function($element){
					return $element->name;
				});
	}
}
