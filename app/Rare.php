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
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function price(){
        return $this->hasOne('App\Price', 'rare_id')->latest()->first();
    }

    public function currentPrice(){
        return $this->hasOne('App\Price', 'rare_id')->latest();
    }

    public function releasePrice(){
        return $this->hasOne('App\Price', 'rare_id');
    }

    public function priceHistory(){
        return $this->hasMany('App\Price', 'rare_id')->latest();
    }

    public function release(){
        return $this->hasOne('App\RareRelease', 'rare_id');
    }

    public function collectableRelease(){
        return $this->hasOne('App\CollectableRelease', 'rare_id');
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
