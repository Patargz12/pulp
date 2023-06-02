<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::where('doctor_id', auth()->user()->doctor->id)->get();

        return view('doctor.schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctor.schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $validatedData = request()->validate([
            'date' => 'required|date|unique:schedules,date',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $doctor = Auth::user()->doctor;

        $schedule = $doctor->schedules()->create([
            'date' => $validatedData['date'],
            'day' => Carbon::parse($validatedData['date'])->format('l'),
            'start_time' => $validatedData['start_time'],
            'end_time' => $validatedData['end_time'],
            'status' => 'active',
        ]);

        return redirect()->route('doctor.schedules.index')->with('success', 'Schedule created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $schedule = Schedule::findOrFail($id);

        return view('doctor.schedule.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Schedule $schedule, Request $request)
    {
        $validatedData = request()->validate([
            'date' => 'required|date|unique:schedules,date,' . $schedule->id,
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required'
        ]);

        if ($request->input('id') == $schedule->id) {
            $schedule->update([
                'date' => $validatedData['date'],
                'day' => Carbon::parse($validatedData['date'])->format('l'),
                'start_time' => $validatedData['start_time'],
                'end_time' => $validatedData['end_time'],
                'status' => $validatedData['status'],
            ]);

            if ($schedule->wasChanged()) {
                return redirect()->route('doctor.schedules.index')->with('success', 'Schedule updated successfully.');
            } else {
                return back()->with('info', 'Nothing has changed.');
            }
        } else {
            return back()->with('danger', 'The date has already been taken.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $doctor_id = Auth::user()->doctor->id;

        if ($schedule->doctor_id == $doctor_id) {
            $schedule->delete();
        } else {
            return redirect()->route('doctor.schedules.index')->with('danger', 'Schedule unsuccessfully deleted');
        }

        return redirect()->route('doctor.schedules.index')->with('success', 'Schedule deleted successfully');
    }
}
