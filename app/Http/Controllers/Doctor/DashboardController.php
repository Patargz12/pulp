<?php

namespace App\Http\Controllers\Doctor;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('doctor_id', auth()->user()->doctor->id)->get();

        $appointmentTotal = Appointment::where('doctor_id', auth()->user()->doctor->id)->count();

        $ongoingAppointments = Appointment::where('doctor_id', auth()->user()->doctor->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->count();

        $completedAppointments = Appointment::where('doctor_id', auth()->user()->doctor->id)
            ->where('status', 'completed')->count();

        $cancelledAppointments = Appointment::where('doctor_id', auth()->user()->doctor->id)
            ->where('status', 'cancelled')->count();

        return view('doctor.dashboard', [
            'appointments' => $appointments,
            'appointmentTotal' => $appointmentTotal,
            'ongoingAppointments' => $ongoingAppointments,
            'completedAppointments' => $completedAppointments,
            'cancelledAppointments' => $cancelledAppointments
        ]);
    }

    public function profile()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('doctor.profile', [
            'user' => $user
        ]);
    }
}
