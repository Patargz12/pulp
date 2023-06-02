<?php

use App\Http\Controllers\Patient\UserController;
use App\Http\Controllers\Patient\DashboardController as PatientDashboardController;
use App\Http\Controllers\Patient\AppointmentController;

Route::prefix('patient')->middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/', [PatientDashboardController::class, 'index'])->name('patient.dasboard');
    Route::get('/profile', [PatientDashboardController::class, 'profile'])->name('patient.profile');

    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('patient.users.edit');
    Route::put('/users/{user}/update', [UserController::class, 'update'])->name('patient.users.update');
    Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->name('patient.users.destroy');

    Route::get('/appointments', [AppointmentController::class, 'index'])->name('patient.appointments.index');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('patient.appointments.create');
    Route::get('/appointments/book/{schedule}', [AppointmentController::class, 'book'])->name('patient.appointments.book');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('patient.appointments.store');
    Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])->name('patient.appointments.show');
    Route::get('appointments/confirm/{token}', [AppointmentController::class, 'confirm'])->name('patient.appointments.confirm');
});
