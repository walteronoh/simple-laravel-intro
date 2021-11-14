<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
    //Read all files from a directory
    $posts = Post::all();
    return view('home', [
        "home" => $posts
    ]);
});

Route::get('/post/{p}', function ($slug) {
    //Use filesystem class to read a directory
    $filename = Post::find($slug);

    return view('post', [
        "post" => $filename
    ]);
})->where('p', '[A-z-]+');

Route::get('/first', function () {
    return view('first');
});

Route::get('/second', function () {
    return view('second');
});

Route::get('/third', function () {
    return view('third');
});
