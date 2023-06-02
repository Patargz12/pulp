<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\UserController;

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dasboard');
    Route::get('/profile', [AdminDashboardController::class, 'profile'])->name('admin.profile');

    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users{user}/update', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/patients', [PatientController::class, 'index'])->name('admin.patients.index');
    Route::get('/patients/create', [PatientController::class, 'create'])->name('admin.patients.create');
    Route::post('/patients', [PatientController::class, 'store'])->name('admin.patients.store');
    Route::get('/patients/{patient}', [PatientController::class, 'show'])->name('admin.patients.show');
    Route::get('/patients/{patient}/edit', [PatientController::class, 'edit'])->name('admin.patients.edit');
    Route::put('/patients/{patient}/update', [PatientController::class, 'update'])->name('admin.patients.update');
    Route::delete('/patients/{patient}/destroy', [PatientController::class, 'destroy'])->name('admin.patients.destroy');

    Route::get('/doctors', [DoctorController::class, 'index'])->name('admin.doctors.index');
    Route::get('/doctors/create', [DoctorController::class, 'create'])->name('admin.doctors.create');
    Route::post('/doctors', [DoctorController::class, 'store'])->name('admin.doctors.store');
    Route::get('/doctors/{doctor}', [DoctorController::class, 'show'])->name('admin.doctors.show');
    Route::get('/doctors/{doctor}/edit', [DoctorController::class, 'edit'])->name('admin.doctors.edit');
    Route::put('/doctors/{doctor}/update', [DoctorController::class, 'update'])->name('admin.doctors.update');
    Route::delete('/doctors/{doctor}/destroy', [DoctorController::class, 'destroy'])->name('admin.doctors.destroy');

    Route::get('/appointments', [AppointmentController::class, 'index'])->name('admin.appointments.index');
    Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])->name('admin.appointments.show');
    Route::get('/appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('admin.appointments.edit');
    Route::get('/appointments/{appointment}/edit/schedules/{schedule}', [AppointmentController::class, 'schedule'])->name('admin.appointments.schedule');
    Route::put('/appointments/{appointment}/update', [AppointmentController::class, 'update'])->name('admin.appointments.update');
    Route::put('/appointments/{appointment}/complete', [AppointmentController::class, 'complete'])->name('admin.appointments.complete');
    Route::put('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])->name('admin.appointments.cancel');
    Route::get('/appointments-completed', [AppointmentController::class, 'completed'])->name('admin.appointments.completed');
    Route::get('/appointments-cancelled', [AppointmentController::class, 'cancelled'])->name('admin.appointments.cancelled');

    Route::get('/admins', [AdminController::class, 'index'])->name('admin.admins.index');
    Route::get('/admins/create', [AdminController::class, 'create'])->name('admin.admins.create');
    Route::post('/admins', [AdminController::class, 'store'])->name('admin.admins.store');
    Route::get('/admins/{admin}', [AdminController::class, 'show'])->name('admin.admins.show');
    Route::get('/admins/{admin}/edit', [AdminController::class, 'edit'])->name('admin.admins.edit');
    Route::put('/admins/{admin}/update', [AdminController::class, 'update'])->name('admin.admins.update');
});
