<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'prices';

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function rare(){
        return $this->belongsTo('App\Rare', 'rare_id')->first();
    }

    public function status(){
        // 0 = decrease
        // 1 = stayed the same
        // 2 = increase
        if($this->direction == 0)
        {
            return '/img/dec.png';
        }

        if($this->direction == 1)
        {
            return '/img/eq.png';
        }

        if($this->direction == 2)
        {
            return '/img/inc.png';
        }
    }
}
