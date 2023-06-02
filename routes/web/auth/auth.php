<?php

use App\Http\Controllers\Auth\LoginController;

Auth::routes();

Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
