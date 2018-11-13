<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Redirect;
use Validator;
use Auth;


use App\Model\Submission;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $submissions = Submission::where('processed','=',0)->paginate(15);
        return view('admin.submissions.index', ['submissions' => $submissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.song.create', ['artists' => Artist::all(),'albums' => Album::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'txtname' => 'required',
            'lyrics' => 'required',
            'year' => 'required|integer|between:1900,2020',
            'artist' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }




        //Insert values
        $song = new Song;

        $song->name = $request->txtname;
        $song->slug = str_slug($request->txtname);
        $song->lyrics = $request->lyrics;
        $song->year = $request->year;
        $song->video_url = $request->video_url;
        $song->album_id = $request->album_id;
        $song->user_id = Auth::user()->id;
        $song->save();

        $song->artists()->attach($request->artist);

        return redirect('admin/songs')->with('status_success', 'Song saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.submissions.show', ['submission' => Submission::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $song = Song::find($id);

        $artists = array();
        if($song->artists->count()>0) {
            foreach($song->artists as $artist) {
                $artists[] = $artist->id;
            }
        }

        return view('admin.song.edit', [
            'artists' => Artist::all(),
            'song' => $song,
            'albums' => Album::all(),
            'song_artists' => $artists
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        //Insert values
        $submission = Submission::find($id);
        $submission->processed = 1;
        $submission->save();

        return redirect('admin/submissions')->with('status_success', 'Status saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
