<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login',       [AuthController::class, 'login'])->name('login');
Route::post('/register',    [RegisterController::class, 'store'])->name('register.store');

Route::middleware('auth')->group(function () {
    //
});
