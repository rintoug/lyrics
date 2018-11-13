<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Album;

class HomepageController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::orderBy('id', 'desc')->take(15)->get();
        return view('public.homepage',[
            'albums' => $albums
        ]);
    }
}
