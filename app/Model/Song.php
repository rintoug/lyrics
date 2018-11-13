<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    /**
     * Get the user that owns the phone.
     */
    public function album()
    {
        return $this->belongsTo('App\Model\Album');
    }

    //Pivot table
    public function artists() {
        return $this->belongsToMany('App\Model\Artist','artist_song');
    }
}
