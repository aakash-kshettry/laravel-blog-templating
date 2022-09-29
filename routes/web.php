<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;

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

Route::get('/admin', function () {
    return view('backend.master');
});

Route::get('/', [HomeController::class,'index']);

Route::prefix('/')->group( function () {
    Route::resources([
        'post'=>PostsController::class,
        'user'=>UsersController::class,
        'category'=>CategoriesController::class
    ]);
});


Route::prefix('/admin')->group( function () {
    Route::resources([
        'post'=>PostsController::class,
        'user'=>UsersController::class,
        'category'=>CategoriesController::class
    ]);
});