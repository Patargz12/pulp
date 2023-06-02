<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\MedicalHistory;
use App\Http\Controllers\Controller;

class MedicalHistoryController extends Controller
{
    public function index()
    {
        $patientIds = Appointment::pluck('patient_id')->unique();
        $patients = Patient::whereIn('id', $patientIds)->with('medicalHistory')->get();

        return view('doctor.medical-history.index', [
            'patients' => $patients,
        ]);
    }

    public function create(string $id)
    {
        $patient = Patient::find($id);
        return view('doctor.medical-history.create', [
            'patient' => $patient
        ]);
    }

    public function store(Request $request, MedicalHistory $medicalHistory)
    {
        $validatedData = $request->validate([
            'medical_condition' => 'required',
            'medications' => 'required',
            'allergies' => 'required',
            'surgeries' => 'required',
            'family_history' => 'required',
            'dental_history' => 'required',
            'patient_id' => 'required'
        ]);

        $medicalHistory->create([
            'patient_id' =>  $validatedData['patient_id'],
            'medical_condition' => $validatedData['medical_condition'],
            'medications' => $validatedData['medications'],
            'allergies' => $validatedData['allergies'],
            'surgeries' => $validatedData['surgeries'],
            'family_history' => $validatedData['family_history'],
            'dental_history' => $validatedData['dental_history'],
        ]);

        if (!$medicalHistory) {
            return redirect()->route('doctor.medical-history.index')->with('danger', 'Something went wrong.');
        } else {
            return redirect()->route('doctor.medical-history.index')->with('success', 'Medical Record successfully created.');
        }
    }

    public function show(Patient $patient, $medicalHistoryId)
    {
        $medicalHistory = MedicalHistory::findOrFail($medicalHistoryId);

        if ($medicalHistory->patient_id !== $patient->id) {
            abort(404);
        }
        return view('doctor.medical-history.show', compact('patient', 'medicalHistory'));
    }

    public function edit(Patient $patient, $medicalHistoryId)
    {
        $medicalHistory = MedicalHistory::findOrFail($medicalHistoryId);

        if ($medicalHistory->patient_id !== $patient->id) {
            abort(404);
        }
        return view('doctor.medical-history.edit', compact('patient', 'medicalHistory'));
    }

    public function update(Request $request, Patient $patient, $medicalHistoryId)
    {
        $medicalHistory = MedicalHistory::where('id', $medicalHistoryId)
            ->where('patient_id', $patient->id)
            ->firstOrFail();

        $validatedData = $request->validate([
            'medical_condition' => 'required',
            'medications' => 'required',
            'allergies' => 'required',
            'surgeries' => 'required',
            'family_history' => 'required',
            'dental_history' => 'required',
        ]);

        $medicalHistory->update($validatedData);
        if ($medicalHistory->wasChanged()) {
            return redirect()->route('doctor.medical-history.index')->with('success', 'Medical history updated successfully.');
        } else {
            return back()->with('info', 'Nothing has changed.');
        }
    }
}
