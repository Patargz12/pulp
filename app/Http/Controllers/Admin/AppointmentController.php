<?php

namespace App\Http\Controllers\Admin;

use App\Models\Schedule;
use Carbon\CarbonInterval;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::whereIn('status', ['pending', 'confirmed'])->get();
        return view('admin.appointment.index', [
            'appointments' => $appointments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('admin.appointment.show', [
            'appointment' => $appointment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $appointment = Appointment::findOrFail($id);
        $schedules = Schedule::where('status', 'active')->get();
        return view('admin.appointment.edit', [
            'appointment' => $appointment,
            'schedules' => $schedules
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        $validatedData = request()->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'doctor_id' => 'required|exists:doctors,id',
            'title' => 'required|max:255',
            'time' => 'required',
            'type' => 'required|in:tooth-extraction,orthondontics,veeners,whitening-dental,filling',
            'notes' => 'nullable|max:1000',
        ]);

        $appointment = Appointment::findOrFail($id);

        $appointment->schedule_id = $validatedData['schedule_id'];
        $appointment->doctor_id = $validatedData['doctor_id'];
        $appointment->title = $validatedData['title'];
        $appointment->time = $validatedData['time'];
        $appointment->type = $validatedData['type'];
        $appointment->notes = $validatedData['notes'];

        $appointment->save();

        if ($appointment->wasChanged()) {
            return redirect()->route('admin.appointments.index')->with('success', 'Appointment updated successfully.');
        } else {
            return back()->with('info', 'Nothing has changed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function schedule($appointment, $schedule)
    {
        $appointment = Appointment::findOrFail($appointment);

        $schedule = Schedule::findOrFail($schedule);

        $availableTimeSlots = [];

        $start = Carbon::parse($schedule->start_time);
        $end = Carbon::parse($schedule->end_time);
        $interval = CarbonInterval::minutes(60);
        $slots = [];
        for ($slot = $start; $slot->lte($end); $slot->add($interval)) {
            $slots[] = $slot->format('H:i:s');
        }
        $availableTimeSlots[$schedule->id] = $slots;

        return view('admin.appointment.schedule', [
            'appointment' => $appointment,
            'schedule' => $schedule,
            'availableTimeSlots' => $availableTimeSlots
        ]);
    }

    public function complete(Appointment $appointment)
    {
        $appointment->status = 'completed';
        $appointment->save();
        return redirect()
            ->route('admin.appointments.index')
            ->with('success', 'Appointment was completed successfully.');
    }

    public function cancel(Appointment $appointment)
    {
        $appointment->status = 'cancelled';
        $appointment->save();
        return redirect()
            ->route('admin.appointments.index')
            ->with('success', 'Appointment was cancelled successfully.');
    }

    public function completed()
    {
        $appointments = Appointment::where('status', 'completed')->get();

        return view('admin.appointment.completed', [
            'appointments' => $appointments
        ]);
    }

    public function cancelled()
    {
        $appointments = Appointment::where('status', 'cancelled')->get();

        return view('admin.appointment.cancelled', [
            'appointments' => $appointments
        ]);
    }
}
