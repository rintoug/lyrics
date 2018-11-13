<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //Pivot table
    public function songs() {
        return $this->hasMany('App\Model\Song');
    }
}
