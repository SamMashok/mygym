<?php

use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPhotoController;
use App\Http\Controllers\UserSubscriptionController;
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

/* Route::get('/{user?}/{id?}', function ($name = 'Sam', $id = 23) {
    return "<h1>Hello {$name} {$id}</>";
})->name('try');
*/


Route::redirect('/', 'dashboard');

Route::middleware('guest')->group(function () {
    Route::view('/login',       'auth.login')->name('login');
    Route::view('/register',    'auth.register')->name('register.create');
});

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'users.dashboard')->name('dashboard');

    Route::resource('users',                UserController::class)->only(['index', 'show']);
    Route::resource('subscriptions',        SubscriptionController::class)->only(['index', 'show']);
    Route::resource('users.subscriptions',  UserSubscriptionController::class)->only('index');

    Route::controller(UserPhotoController::class)->group(function () {
        Route::put('/photos/{user}', 'update')    ->name('photos.update');
        Route::delete('/photos/{user}', 'destroy')->name('photos.destroy');
    });

    Route::get('/logout',  LogoutController::class)->name('logout');
});




