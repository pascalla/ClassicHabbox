<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Rare extends Model
{
    use HasSlug;

    protected $table = 'rares';

    public function category(){
        return $this->belongsTo('App\Category', 'category_id')->first();
    }

    public function price(){
        return $this->hasMany('App\Price', 'rare_id')->latest()->first();
    }

    public function releasePrice(){
        return $this->hasMany('App\Price', 'rare_id')->first();
    }

    public function priceHistory(){
        return $this->hasMany('App\Price', 'rare_id')->latest();
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
