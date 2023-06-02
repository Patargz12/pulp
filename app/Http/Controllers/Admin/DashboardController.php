<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $patientCount = User::whereHas('roles', function ($query) {
            $query->where('name', 'patient');
        })->count();
        $ongoingAppointments = Appointment::whereIn('status', ['pending', 'confirmed'])->count();
        $completedAppointments = Appointment::where('status', 'completed')->count();
        $cancelledAppointments = Appointment::where('status', 'cancelled')->count();
        $appointments = Appointment::all();

        return view('admin.dashboard', [
            'patientCount' => $patientCount,
            'ongoingAppointments' => $ongoingAppointments,
            'completedAppointments' => $completedAppointments,
            'cancelledAppointments' => $cancelledAppointments,
            'appointments' => $appointments
        ]);
    }

    public function profile()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('admin.profile', [
            'user' => $user
        ]);
    }
}
