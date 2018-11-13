<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Submission;

use Redirect;
use Validator;

class SubmitController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function submitForm()
    {
        return view('public.submit_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submitFormPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'txtname' => 'required',
            'artist' => 'required',
            'album' => 'required',
            'year' => 'required',
            'lyrics' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }




        //Insert values
        $submission = new Submission;

        $submission->name = $request->txtname;
        $submission->lyrics = $request->lyrics;
        $submission->year = $request->year;
        $submission->video_url = $request->video_url;
        $submission->artist = $request->artist;
        $submission->album = $request->album;

        $submission->save();

        return redirect('submit-lyrics')->with('status_success', 'Request Submitted');
    }
}
