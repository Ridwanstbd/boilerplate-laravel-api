<?php

use App\Http\Controllers\JWTAuthController;
use App\Http\Middleware\JWTMiddleware;
use Illuminate\Support\Facades\Route;

Route::post('register',[JWTAuthController::class,'register']);
Route::post('login',[JWTAuthController::class,'login']);
Route::post('forgot-password',[JWTAuthController::class, 'forgotPassword'])->name('password.forgot');
Route::post('reset-password',[JWTAuthController::class, 'resetPassword'])->name('password.reset');

Route::middleware(JWTMiddleware::class)->group(function(){
    Route::post('logout',[JWTAuthController::class,'logout']);
    Route::post('refresh',[JWTAuthController::class,'refresh']);
    Route::get('me',[JWTAuthController::class,'me']);
});