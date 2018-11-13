<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Redirect;
use Validator;

use App\Model\Artist;

use Intervention\Image\ImageManagerStatic as Image;

class ArtistController extends Controller
{

    public function __construct()
    {
        $this->thumbnail = 'media/artist/thumbnail/';
        $this->orginal = 'media/artist/original/';

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::paginate(15);
        return view('admin.artist.index', ['artists' => $artists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artist.create', []);
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
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }


        $filename='';
        if($request->hasFile('photo')) {

            $photo       = $request->file('photo');
            $filename    = implode(".",array(str_slug($request->name),$photo->getClientOriginalExtension()));

            //Fullsize
            $photo->move(public_path($this->orginal),$filename);

            $image_resize = Image::make(public_path($this->orginal).$filename);
            $image_resize->fit(300, 300);
            $image_resize->save(public_path($this->thumbnail .$filename));



        }

        //Insert values
        $artist = new Artist;

        $artist->name = $request->name;
        $artist->slug = str_slug($request->name,'-');
        $artist->photo = $filename;
        $artist->bio = $request->bio;
        $artist->save();

        return redirect('admin/artists')->with('status_success', 'Artist saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artist    = Artist::find($id);


        return view('admin.artist.edit', ['artist' => $artist]);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }


        $filename='';
        if($request->hasFile('photo')) {

            $photo       = $request->file('photo');
            $filename    = implode(".",array(str_slug($request->name),$photo->getClientOriginalExtension()));

            //Fullsize
            $photo->move(public_path($this->orginal),$filename);

            $image_resize = Image::make(public_path($this->orginal).$filename);
            $image_resize->fit(300, 300);
            $image_resize->save(public_path($this->thumbnail .$filename));



        }

        //Insert values
        $artist = Artist::find($id);

        $artist->name = $request->name;
        $artist->slug = str_slug($request->name,'-');
        if($request->hasFile('photo')) {
            $artist->photo = $filename;
        }
        $artist->bio = $request->bio;
        $artist->save();

        return redirect('admin/artists')->with('status_success', 'Artist saved!');
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
