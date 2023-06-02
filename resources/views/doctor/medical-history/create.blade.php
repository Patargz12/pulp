@extends('layouts.back-end.app')

@section('title', 'Patient Medical History | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">Patient Medical History</h1>

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body shadow">
                    <form action="{{ route('doctor.medical-history.store', $patient->id) }}" method="POST"
                        id="addMedicalHistoryForm">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="medical_condition" class="form-label">Medical Condition</label>
                                    <input type="text"
                                        class="form-control @error('medical_condition') is-invalid @enderror"
                                        name="medical_condition" id="medical_condition">

                                    @error('medical_condition')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="medications" class="form-label">Medications</label>
                                    <textarea class="form-control @error('medications') is-invalid @enderror" name="medications" id="medications"
                                        rows="3"></textarea>

                                    @error('medications')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="allergies" class="form-label">Allergies</label>
                                    <textarea class="form-control @error('allergies') is-invalid @enderror" name="allergies" id="allergies" rows="3"></textarea>

                                    @error('allergies')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="surgeries" class="form-label">Surgeries</label>
                                    <textarea class="form-control @error('surgeries') is-invalid @enderror" name="surgeries" id="surgeries" rows="3"></textarea>

                                    @error('surgeries')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="family_history" class="form-label">Family History</label>
                                    <textarea class="form-control @error('family_history') is-invalid @enderror" name="family_history" id="family_history"
                                        rows="3"></textarea>

                                    @error('family_history')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="dental_history" class="form-label">Dental History</label>
                                    <textarea class="form-control @error('dental_history') is-invalid @enderror" name="dental_history" id="dental_history"
                                        rows="3"></textarea>

                                    @error('dental_history')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="patient_id" value="{{ $patient->id }}">

                        <div class="d-grid gap-2 d-md-flex">
                            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                data-bs-target="#addMedicalRecord">
                                Add Medical Record
                            </button>

                            <a href="{{ route('doctor.medical-history.index') }}" class="btn btn-secondary w-100"
                                role="button">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addMedicalRecord" tabindex="-1" aria-labelledby="addMedicalRecordLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addMedicalRecordLabel">Confirm Add Medical Record</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to add the medical record?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="addMedicalHistoryForm">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
