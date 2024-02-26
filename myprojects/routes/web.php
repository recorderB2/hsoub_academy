<?php

use App\Http\Controllers\ProfielController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

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
    return view('welcome');
});

Route::get('/test', function () {
    $v = 2;
    return view('test' , compact("v"));
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource("/projects", ProjectController::class);

Route::post("/projects/{project}/tasks", [TaskController::class, "store"]);

Route::delete("/tasks/{task}", [TaskController::class, "destroy"]);

Route::patch("/tasks/{task}", [TaskController::class, "update"]);

Route::get("/profile", [ProfielController::class, "index"])->name('profile');

Route::patch("/profile", [ProfielController::class, "update"]);
