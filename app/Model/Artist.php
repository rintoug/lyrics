<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    //Pivot table
    public function songs() {
        return $this->belongsToMany('App\Model\Song','artist_song');
    }
}
