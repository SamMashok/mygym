<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserSubscriptionController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\PayAzaPaymentController;
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

//Route::middleware('guest')->group(function () {
//    Route::post('/login',       [AuthController::class, 'login'])->name('login');
//    Route::post('/register',    [RegisterController::class, 'store'])->name('register.store');
//});

//Route::middleware('auth')->group(function () {
//    Route::resource('users', UserController::class)->only(['store', 'update', 'destroy']);
//    Route::resource('users.subscriptions', UserSubscriptionController::class)->only('store');
//    Route::post('/subscriptions/{subscription}', [SubscriptionController::class, 'show'])->name('subscriptions.show');
//});

Route::get('/virtual-accounts/{id}',     [PayAzaPaymentController::class, 'getVirtualAccountDetails']);
Route::post('/virtual-accounts',         [PayAzaPaymentController::class, 'createVirtualAccount']);
Route::post('/reserved-accounts',     [PayAzaPaymentController::class, 'createReservedAccount']);
Route::get('/reserved-accounts-history/{id}',         [PayAzaPaymentController::class, 'getReservedTransactionHistory']);

