<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Redirect;
use Validator;
use App\Model\Search;
use App\model\Song;

use Intervention\Image\ImageManagerStatic as Image;

class IndexController extends Controller
{


    public function rebuildIndex() {

        Search::truncate();


        $songs = Song::all();
        foreach ($songs as $song) {
            $lyrics = $song->lyrics;
            $artist = array();
            $artists = $song->artists;
            foreach ($artists as $value) {
                $artist[] = $value->name;
            }
            if (count($artist) > 0) {
                $artistTxt = implode(" ", $artist);
            }

            $album = array();
            try{
                $album = $song->album->name;
            }
            catch(\Exception $e){
                $album ='';
             }

            $fulltext = strip_tags($lyrics). " ".$artistTxt. " ".$album;

            $search = new Search;

            $search->song_id = $song->id;
            $search->data_index = $fulltext;
            $search->save();
        }


        print "Done";
    }
}
