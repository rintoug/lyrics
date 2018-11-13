<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomepageController@index')->name('homepage');
Route::get('/lyrics/start-{letter}', 'LyricsController@withLetter')->name('with_letter');
Route::get('/lyrics/{slug}/', 'LyricsController@show')->name('show_lyrics');

Route::get('/album/{slug}/', 'AlbumController@show')->name('show_albums');
Route::get('/artist/{slug}/', 'ArtistController@show')->name('show_artist');

Route::get('/search/', 'LyricsController@search')->name('lyrics_search');

/*Sitemap*/
Route::get('/sitemap_index.xml', 'SitemapController@index');
Route::get('/sitemap_song.xml', 'SitemapController@lyrics');
Route::get('/sitemap_artist.xml', 'SitemapController@artist');
Route::get('/sitemap_album.xml', 'SitemapController@album');


Route::get('/submit-lyrics', 'SubmitController@submitForm')->name('submit_form');
Route::post('/submit-lyrics-post', 'SubmitController@submitFormPost')->name('submit_form_post');

Route::group(['prefix' => 'admin','middleware'=>array('auth','admin')], function () {
    Route::resource('products', 'Admin\ProductController');
    Route::resource('categories', 'Admin\CategoryController');
    Route::resource('gifts', 'Admin\GiftController');
    Route::resource('blog', 'Admin\BlogController');
    Route::get('images/rebuild', 'Admin\ImageController@rebuildImages');

    //New
    Route::resource('artists', 'Admin\ArtistController');
    Route::resource('albums', 'Admin\AlbumController');
    Route::resource('songs', 'Admin\SongController');
    Route::resource('submissions', 'Admin\SubmissionController');
    Route::get('images/rebuild', 'Admin\ImageController@rebuildImages');
    Route::get('search/index', 'Admin\IndexController@rebuildIndex');
});
