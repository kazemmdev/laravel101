<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('/about', 'about');

Route::get('/friends', Controllers\UserController::class)
    ->name('user.friends');
