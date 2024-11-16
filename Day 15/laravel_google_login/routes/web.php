<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleAuthController;

Route::get('auth/redirect/google', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
Route::get('auth/callback/google', [GoogleAuthController::class, 'callback'])->name('google.callback');


Route::get('/', function () {
    return view('welcome');
});
