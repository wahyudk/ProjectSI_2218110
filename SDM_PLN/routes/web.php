<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;

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
    return view('welcome');
});
Route::resource('/dashboard', dashboardController::class);
Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::resource('/post1', \App\Http\Controllers\Post1Controller::class);
Route::resource('/post3', \App\Http\Controllers\Post3Controller::class);
Route::get('posts/view/pdf', [\App\Http\Controllers\PostController::class, 'view_pdf']);
Route::get('post1/view/pdf', [\App\Http\Controllers\Post1Controller::class, 'view_pdf']);
Route::get('post3/view/pdf', [\App\Http\Controllers\Post3Controller::class, 'view_pdf']);