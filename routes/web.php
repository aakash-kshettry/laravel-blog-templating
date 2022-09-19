<?php

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
    return view('front-end.master');
});

Route::get('/about', function () {
    return view('front-end.about');
});

Route::get('/category', function () {
    return view('front-end.category');
});

Route::get('/contact', function () {
    return view('front-end.contact');
});

Route::get('/search-result', function () {
    return view('front-end.search-result');
});

Route::get('/single-post', function () {
    return view('front-end.single-post');
});