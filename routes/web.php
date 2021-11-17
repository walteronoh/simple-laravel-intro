<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

//Using middlewares
Route::get('/mw/{age}', function () {
    return view('first');
})->middleware('age');

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

//Example of a Route::group which is used to apply configurations to several routes
//Using prefixes to provide a common url structure
Route::group([ 'prefix' => 'pfx'], function () {
    Route::get('/first', function () {
        return view('first');
    });
    
    Route::get('/second', function () {
        return view('second');
    });
    
    Route::get('/third', function () {
        return view('third');
    });
});

//Using controllers
Route::group([ 'prefix' => 'ctr'], function () {
    //Accessing controller using routes and passing data
    Route::get('/example/{id}', [PostController::class, 'index']);
});

