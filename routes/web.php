<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LocaleController;

Route::view('/', 'home')->name('home');

Route::post('/locale', LocaleController::class)->name('locale.store');

Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('tasks', TaskController::class);
    Route::post('logout', LogoutController::class)->name('logout');
});
