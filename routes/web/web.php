<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('pages.index');
    });

    Route::get('/services', function () {
        return view('pages.services');
    });
});

require __DIR__ . '/admin/admin.php';
require __DIR__ . '/auth/auth.php';
require __DIR__ . '/patient/patient.php';
require __DIR__ . '/doctor/doctor.php';
