<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Redirect;
use Validator;
use App\Model\Artist;
use App\Model\Album;

use Intervention\Image\ImageManagerStatic as Image;

class ImageController extends Controller
{

    public function __construct()
    {
        $this->artist_thumbnail = 'media/artist/thumbnail/';
        $this->artist_orginal = 'media/artist/original/';

        $this->album_thumbnail = 'media/album/thumbnail/';
        $this->album_orginal = 'media/album/original/';

    }

    public function rebuildImages() {
        $artists = Artist::all();
        foreach ($artists as $artist) {
            $filename = $artist->photo;
            $originalImage = public_path($this->artist_orginal).$filename;
            if(file_exists($originalImage)) {
                $image_resize = Image::make(public_path($this->artist_orginal).$filename);
                $image_resize->fit(400, 300);
                $image_resize->save(public_path($this->artist_thumbnail .$filename));

            }
        }

        $albums = Album::all();
        foreach ($albums as $album) {
            $filename = $album->cover;
            $originalImage = public_path($this->album_orginal).$filename;
            if(file_exists($originalImage)) {
                $image_resize = Image::make(public_path($this->album_orginal).$filename);
                $image_resize->fit(400, 300);
                $image_resize->save(public_path($this->album_thumbnail .$filename));

            }
        }

        print "Done";
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
            'affiliate_link' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }


        $filename='';
        if($request->hasFile('image')) {

            $image       = $request->file('image');
            $filename    = implode(".",array(str_slug($request->name),$image->getClientOriginalExtension()));

            //Fullsize
            $image->move(public_path($this->orginal),$filename);

            $image_resize = Image::make(public_path($this->orginal).$filename);
            $image_resize->fit(300, 300);
            $image_resize->save(public_path($this->thumbnail .$filename));

            $image_resize = Image::make(public_path($this->orginal).$filename);
            $image_resize->fit(700, 700);
            $image_resize->save(public_path($this->medium .$filename));

        }

        //Insert values
        $product = new Product;

        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->affiliate_link = $request->affiliate_link;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->asin = $request->asin;
        $product->image = $filename;
        $product->save();
        $productId = $product->id;


        $product->categories()->attach($request->category);


        return redirect('admin/products/'.$productId.'/edit')->with('status_success', 'Product updated!');
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
        $product    = Product::find($id);
        //$categories = Category::all();
        $categories = Category::with('children', 'parent')->get();

        $cats = array();
        if($product->categories->count()>0) {
            foreach($product->categories as $category) {
                $cats[] = $category->id;
            }
        }

        //echo "<pre>";
        //print_r($categories);

        return view('admin.products.edit', ['categories' => $categories, 'product' => $product, 'curr_cat' => $cats]);
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
            'affiliate_link' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }




        $filename='';
        if($request->hasFile('image')) {

            $image       = $request->file('image');
            $filename    = implode(".",array(str_slug($request->name),$image->getClientOriginalExtension()));

            //Fullsize
            $image->move(public_path($this->orginal),$filename);

            $image_resize = Image::make(public_path($this->orginal).$filename);
            $image_resize->fit(300, 300);
            $image_resize->save(public_path($this->thumbnail .$filename));

            $image_resize = Image::make(public_path($this->orginal).$filename);
            $image_resize->fit(700, 700);
            $image_resize->save(public_path($this->medium .$filename));

        }


        //Insert values
        $product = Product::find(1);


        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->affiliate_link = $request->affiliate_link;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->asin = $request->asin;
        if($filename)
        $product->image = $filename;
        $product->save();
        $productId = $product->id;

        //Category manipulation
        //get current category
        $cats = array();
        if($product->categories->count()>0) {
            foreach($product->categories as $category) {
                $cats[] = $category->id;
            }
        }
        //Remove and insert categories

        if($cats != $request->category) {
            //Remove and add
            $product->categories()->detach($cats);
            $product->categories()->attach($request->category);

        }




        return redirect('admin/products/'.$productId.'/edit')->with('success', 'Product updated!');
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
