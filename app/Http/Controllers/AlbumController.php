<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Album;

class AlbumController extends Controller
{



    public function show($slug) {


        $album = Album::where('slug', '=',  $slug)->first();

        if(empty($album)) {
            abort(404);
        }

        return view('public.album',['album' => $album]);
    }
}
