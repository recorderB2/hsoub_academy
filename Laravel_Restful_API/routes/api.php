<?php

use App\Http\Controllers\API\LessonController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\RelationshipController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => '/v1'], function () {
    Route::apiResource('lessons', LessonController::class);
    Route::apiResource('tags', TagController::class);
    Route::apiResource('users', UserController::class);
    Route::get('users/{id}/lessons', [RelationshipController::class, 'userLessons']);
    Route::get('lessons/{id}/tags', [RelationshipController::class, 'lessontags']);
    Route::get('tags/{id}/lessons', [RelationshipController::class, 'tagLessons']);
    Route::any('lesson', function () {
        $msg = "Did You Mean 'lessons' ?";
        return Response::json([
            'data' => $msg,
            'link' => "errpage.com",
        ], 404);
    });
    Route::get('login', [LoginController::class, 'login'])->name('login');
});
