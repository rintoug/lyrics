<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Song;
use App\Model\Search;

class LyricsController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('public.homepage');
    }

    /*
     * Show the lyrics with starting letter
     * @return \Illuminate\Http\Response
     */

    public function withLetter($letter) {

        $letterCount = strlen($letter);
        if($letterCount>1) {
            print "Unexpected input, quitting";exit;
        }
        $songs = Song::where('name', 'like',  $letter . '%')->get();

        return view('public.letter',['songs' => $songs]);
    }

    public function show($slug) {


        $song = Song::where('slug', '=',  $slug)->first();

        if(empty($song)) {
            abort(404);
        }

        return view('public.show',['song' => $song]);
    }

    public function search(Request $request) {


        /*$keyword = $request->get('q');

        $data = Search::whereRaw('match (data_index) against (? in boolean mode)', [$keyword])->paginate(15)->pluck('song_id');

        $ids = array();

        foreach ($data as $value) {
            $ids[]  = $value;
        }

        $results = Song::whereIn('id', $ids)->get();*/



        $results= array();

        return view('public.search',['results' => $results]);
    }
}
