<?php

use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserPhotoController;
use App\Http\Controllers\UserSubscriptionController;
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


Route::redirect('/', 'dashboard');

Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')                       ->name('login');

    Route::view('/register', 'auth.register')                 ->name('register');

    Route::post('/login', [AuthController::class, 'authenticate']) ->name('login.authenticate');

    Route::post('/register', [UserController::class, 'store'])     ->name('users.store');

});

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'users.dashboard')->name('dashboard');

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')             ->name('users.index');
        Route::get('/users/{user}', 'show')       ->name('users.show');
        Route::put('/users/{user}', 'update')     ->name('users.update');
        Route::delete('/users/{user}', 'destroy') ->name('users.destroy');
    });

    Route::controller(SubscriptionController::class)->group(function () {
        Route::get('/subscriptions', 'index')->name('subscriptions.index');
    });

    Route::controller(UserSubscriptionController::class)->group(function () {
        Route::get('/users/{user}/subscriptions', 'index')                ->name('users.subscriptions.index');
        Route::get('/users/{user}/subscriptions/{subscription}', 'show')  ->name('users.subscriptions.show');
        Route::post('/users/{user}/subscriptions', 'store') ->name('users.subscriptions.store');

    });

    Route::controller(UserPhotoController::class)->group(function () {
        Route::put('/photos/{user}', 'update')     ->name('photos.update');
        Route::delete('/photos/{user}', 'destroy') ->name('photos.destroy');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});




