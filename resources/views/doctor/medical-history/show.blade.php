@extends('layouts.back-end.app')

@section('title', 'Patient Medical Record | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">Patient Medical Record</h1>

    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body shadow text-center">
                    @if ($patient->user->avatar)
                    @else
                        <img src="{{ asset('images/avatar.jpg') }}" alt="avatar" class="img-fluid rounded-circle mb-3"
                            width="200">
                    @endif

                    <h4 class="mb-3 text-primary">{{ $patient->full_name }}</h4>
                    <p class="lead mb-3">{{ $patient->role }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body shadow">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Medical Condition</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $medicalHistory->medical_condition }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Medications</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $medicalHistory->medications }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Allergies</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $medicalHistory->allergies }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Surgeries</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $medicalHistory->surgeries }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Family History</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $medicalHistory->family_history }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Dental History</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $medicalHistory->dental_history }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
