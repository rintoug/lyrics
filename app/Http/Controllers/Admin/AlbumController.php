<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Redirect;
use Validator;

use App\Model\Album;

use Intervention\Image\ImageManagerStatic as Image;

class AlbumController extends Controller
{

    public function __construct()
    {
        $this->thumbnail = 'media/album/thumbnail/';
        $this->orginal = 'media/album/original/';

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::paginate(15);
        return view('admin.album.index', ['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.album.create', []);
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
        if($request->hasFile('cover')) {

            $cover       = $request->file('cover');
            $filename    = implode(".",array(str_slug($request->name,'_'),$cover->getClientOriginalExtension()));

            //Fullsize
            $cover->move(public_path($this->orginal),$filename);

            $image_resize = Image::make(public_path($this->orginal).$filename);
            $image_resize->fit(300, 300);
            $image_resize->save(public_path($this->thumbnail .$filename));



        }

        //Insert values
        $album = new Album;

        $album->name = $request->name;
        $album->slug = str_slug($request->name, "-");
        $album->cover = $filename;
        $album->save();

        return redirect('admin/albums')->with('status_success', 'Album saved!');
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
        $album    = Album::find($id);


        return view('admin.album.edit', ['album' => $album]);
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
        if($request->hasFile('cover')) {

            $cover       = $request->file('cover');
            $filename    = implode(".",array(str_slug($request->name,'_'),$cover->getClientOriginalExtension()));

            //Fullsize
            $cover->move(public_path($this->orginal),$filename);

            $image_resize = Image::make(public_path($this->orginal).$filename);
            $image_resize->fit(300, 300);
            $image_resize->save(public_path($this->thumbnail .$filename));



        }

        //Insert values
        $album = Album::find($id);

        $album->name = $request->name;
        $album->slug = str_slug($request->name, "-");
        if($request->hasFile('cover')) {
            $album->cover = $filename;
        }
        $album->save();

        return redirect('admin/albums')->with('status_success', 'Album saved!');
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
