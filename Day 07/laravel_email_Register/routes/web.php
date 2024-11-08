<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [UserController::class, 'showForm'])->name('register.form');
Route::post('/register', [UserController::class, 'store'])->name('register.store');
