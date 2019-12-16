<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectableRelease extends Model
{
    protected $table = 'collectable_releases';

    public function rare(){
        return $this->belongsTo('App\Rare', 'rare_id');
    }
}
