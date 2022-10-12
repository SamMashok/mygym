<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


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

/* Route::get('/{user?}/{id?}', function ($name = 'Sam', $id = 23) {
    return "<h1>Hello {$name} {$id}</>";
})->name('try');
*/

Route::view('/login', 'auth.login');

Route::view('/register', 'auth.register');

Route::view('/dashboard', 'users.dashboard')->middleware("auth");

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/users', [UserController::class, 'index'])->middleware('auth');

Route::get('/{user}', [UserController::class, 'show'])->middleware("auth");

Route::get('delete/{user}', [UserController::class, 'destroy'])->middleware("auth");

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/register', [UserController::class, 'store']);

Route::post('/update/{user}', [UserController::class, 'update']);

