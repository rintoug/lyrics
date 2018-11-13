<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Artist;

class ArtistController extends Controller
{


    public function show($slug) {


        $artist = Artist::where('slug', '=',  $slug)->first();

        if(empty($artist)) {
            abort(404);
        }

        return view('public.artist',['artist' => $artist]);
    }
}
