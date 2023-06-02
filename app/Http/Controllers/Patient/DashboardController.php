<?php

namespace App\Http\Controllers\Patient;

use App\Models\User;
use App\Models\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('patient_id', auth()->user()->patient->id)->get();
        $appointmentTotal = Appointment::where('patient_id', auth()->user()->patient->id)->count();
        $ongoingAppointments = Appointment::where('patient_id', auth()->user()->patient->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->count();
        $completedAppointments = Appointment::where('patient_id', auth()->user()->patient->id)
            ->where('status', 'completed')->count();
        $cancelledAppointments = Appointment::where('patient_id', auth()->user()->patient->id)
            ->where('status', 'cancelled')->count();
        return view('patient.dashboard', [
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
        return view('patient.profile', [
            'user' => $user
        ]);
    }
}
