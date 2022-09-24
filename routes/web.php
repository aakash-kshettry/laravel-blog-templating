<?php

use App\Http\Controllers\CategoriesController;
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

Route::get('/admin', function () {
    return view('backend.master');
});

Route::get('/admin/user-form', function () {
    return view('backend.user-form');
});

Route::get('/admin/user-table', function () {
    return view('backend.user-table');
});
Route::get('/admin/post-form', function () {
    return view('backend.post-form');
});

Route::get('/admin/post-table', function () {
    return view('backend.post-table');
});

Route::get('/admin/comment-form', function () {
    return view('backend.comment-form');
});

Route::get('/admin/comment-table', function () {
    return view('backend.comment-table');
});


Route::get('/admin/category-form', function () {
    return view('backend.category-form');
});
Route::get('/admin/categories', [CategoriesController::class,'index']);
Route::get('/admin/categories/form', [CategoriesController::class,'create']);
Route::post('/admin/categories', [CategoriesController::class,'store']);
Route::get('/admin/categories/{id}', [CategoriesController::class,'edit']);
Route::put('/admin/categories/{id}', [CategoriesController::class,'update']);
Route::delete('/admin/categories/{id}', [CategoriesController::class,'destroy']);


// Route::get('/admin/category-table', function () {
//     return view('backend.category-table');
// });
