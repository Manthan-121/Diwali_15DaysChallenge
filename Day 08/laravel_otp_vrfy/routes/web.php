<?php

use App\Http\Controllers\OtpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [OtpController::class, 'index'])->name('register.index');
Route::post('/register', [OtpController::class, 'store'])->name('register.store');

Route::get('/verify-otp', [OtpController::class, 'showVerifyOtpForm'])->name('verify-otp.form');
Route::post('/verify-otp', [OtpController::class, 'verifyOtp'])->name('verify-otp');


Route::get('/Success',[OtpController::class,'successMSG'])->name('success-rot');

