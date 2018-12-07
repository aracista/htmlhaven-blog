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

Route::get('/', function () {
	$posts = App\Post::all();
	$tags = App\Tag::orderBy('id','desc')->paginate(5);
	$categories = App\Category::orderBy('id','desc')->paginate(5);
    return view('welcome',compact('posts','tags','categories'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('post', 'PostController');
Route::resource('category', 'CategoryController');
Route::resource('tag', 'TagController');

Route::post('comment/create/{post}', 'CommentController@buatKomentar')->name('buatKomentar.store');

Route::post('search', 'SearchController@search')->name('search');