<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $table = 'songs_fulltext_search';
    public $timestamps = false;
}
