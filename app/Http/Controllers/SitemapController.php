<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Song;
use App\Model\Artist;
use App\Model\Album;

class SitemapController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $song = Song::orderBy('updated_at', 'desc')->first();
        $artist = Artist::orderBy('updated_at', 'desc')->first();
        $album = Album::orderBy('updated_at', 'desc')->first();

        return response()->view('public.sitemap.index', [
            'song' => $song,
            'artist' => $artist,
            'album' => $album,
        ])->header('Content-Type', 'text/xml');
    }

    public function album()
    {
        $albums = Album::all();

        return response()->view('public.sitemap.album', [
            'albums' => $albums,
        ])->header('Content-Type', 'text/xml');
    }

    public function artist()
    {
        $artists = Artist::all();

        return response()->view('public.sitemap.artist', [
            'artists' => $artists,
        ])->header('Content-Type', 'text/xml');
    }

    public function lyrics()
    {
        $songs = Song::all();

        return response()->view('public.sitemap.lyrics', [
            'songs' => $songs,
        ])->header('Content-Type', 'text/xml');
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
