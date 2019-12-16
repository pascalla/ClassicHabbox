<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RareRelease extends Model
{
    protected $table = 'rare_releases';

    public function rare(){
        return $this->belongsTo('App\Rare', 'rare_id');
    }
}
