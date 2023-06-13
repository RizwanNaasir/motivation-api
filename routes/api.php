<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\ResetPasswordController;
use App\Http\Controllers\Api\Auth\SocialLoginController;
use App\Http\Controllers\Api\Auth\VerificationController;
use App\Http\Controllers\Api\QuoteController;
use App\Http\Middleware\Authenticate;
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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', LoginController::class)->name('api.login');
    Route::post('register', RegisterController::class)->name('api.register');
    Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:sanctum')->name('api.logout');
    Route::post('update', [LoginController::class, 'update'])->name('api.update');
});
Route::post('user/send/reset/mail', [ResetPasswordController::class, 'send'])->name('api.user.send.reset.mail');

Route::post('user/send/verification/mail', [VerificationController::class, 'send'])
    ->name('api.user.send.verification.mail')
    ->middleware('auth:sanctum');

Route::middleware([
    Authenticate::using(guard: 'sanctum'),
])->as('api')->group(function () {
    Route::group(['prefix' => 'quote','as' => 'quote'], function () {

        Route::get('list', [QuoteController::class, 'index'])->name('list');
        Route::post('refresh', [QuoteController::class, 'fetchAndSaveQuotes'])->name('quote');
        Route::post('like/{quote}', [QuoteController::class, 'like'])->name('like');
    });

    Route::group(['prefix' => 'favourite','as' => 'favourite'], function () {

        Route::get('list-quotes', [QuoteController::class, 'listFavouriteQuotes'])->name('quote.list');
    });
});
