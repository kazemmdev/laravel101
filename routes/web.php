<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('main.home');
Route::view('/about', 'about')->name('main.about');

Route::get('/friends', Controllers\UserController::class)->name('user.friends');
