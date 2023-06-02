<?php

use App\Http\Controllers\Doctor\DashboardController as DoctorDashboardController;
use App\Http\Controllers\Doctor\ScheduleController;
use App\Http\Controllers\Doctor\AppointmentController;
use App\Http\Controllers\Doctor\UserController;
use App\Http\Controllers\Doctor\MedicalHistoryController;

Route::prefix('doctor')->middleware(['auth', 'role:doctor'])->group(function () {
    Route::get('/', [DoctorDashboardController::class, 'index'])->name('doctor.dasboard');
    Route::get('/profile', [DoctorDashboardController::class, 'profile'])->name('doctor.profile');

    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('doctor.users.edit');
    Route::put('/users/{user}/update', [UserController::class, 'update'])->name('doctor.users.update');
    Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->name('doctor.users.destroy');

    Route::get('/schedules', [ScheduleController::class, 'index'])->name('doctor.schedules.index');
    Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('doctor.schedules.create');
    Route::post('/schedules', [ScheduleController::class, 'store'])->name('doctor.schedules.store');
    Route::get('/schedules/{schedule}', [ScheduleController::class, 'show'])->name('doctor.schedules.show');
    Route::get('/schedules/{schedule}/edit', [ScheduleController::class, 'edit'])->name('doctor.schedules.edit');
    Route::put('/schedules/{schedule}/update', [ScheduleController::class, 'update'])->name('doctor.schedules.update');
    Route::delete('/schedules/{schedule}/destroy', [ScheduleController::class, 'destroy'])->name('doctor.schedules.destroy');

    Route::get('/appointments', [AppointmentController::class, 'index'])->name('doctor.appointments.index');
    Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])->name('doctor.appointments.show');

    Route::get('/patients/medical-histories', [MedicalHistoryController::class, 'index'])->name('doctor.medical-history.index');
    Route::get('/patients/{patient}/medical-histories/create', [MedicalHistoryController::class, 'create'])->name('doctor.medical-history.create');
    Route::post('/patients/{patient}/medical-histories', [MedicalHistoryController::class, 'store'])->name('doctor.medical-history.store');
    Route::get('/patients/{patient}/medical-histories/{medicalHistory}', [MedicalHistoryController::class, 'show'])->name('doctor.medical-history.show');
    Route::get('/patients/{patient}/medical-histories/{medicalHistory}/edit', [MedicalHistoryController::class, 'edit'])->name('doctor.medical-history.edit');
    Route::put('/patients/{patient}/medical-history/{medicalHistory}', [MedicalHistoryController::class, 'update'])
        ->name('doctor.medical-history.update');
});
