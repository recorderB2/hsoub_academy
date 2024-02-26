<?php

use App\Helpers\helper;
use App\Http\Controllers\AdController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\SendMailController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('ads', AdController::class);
Route::get('ads/{userId}/index', [AdController::class, 'getByUser']);
Route::get('{id}/{slug}', [AdController::class, 'getByCategory']);
Route::post('ads/search', [AdController::class, 'search']);
Route::post('ads/{id}/favorite', [FavoriteController::class, 'store']);
Route::post('ads/{id}/unfavorite', [FavoriteController::class, 'destroy']);
Route::get('favorites', [FavoriteController::class, 'index']);

Route::resource('comments', CommentController::class);
Route::post('comments/reply', [CommentController::class, 'reply']);
Route::post('send', [SendMailController::class, 'sendMail']);
