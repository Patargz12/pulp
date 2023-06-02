@extends('layouts.back-end.app')

@section('title', 'Appointment Information | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">Appointment Information</h1>

    <a class="btn btn-primary mb-4" href="{{ route('patient.appointments.index') }}" role="button"><i
            class="bi bi-caret-left-fill me-1"></i>Back</a>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body shadow">
                    <div class="d-flex justify-content-center">
                        @if ($appointment->doctor->user->avatar)
                            <img src="{{ asset($appointment->doctor->user->avatar_formatted) }}" alt="avatar"
                                class="img-fluid rounded-circle mb-3" width="200">
                        @else
                            <img src="{{ asset('images/avatar.jpg') }}" alt="avatar" class="img-fluid rounded-circle mb-3"
                                width="200">
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Name:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $appointment->doctor->full_name }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Email:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $appointment->doctor->email }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Contact:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $appointment->doctor->contact_number }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Gender:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $appointment->doctor->formatted_gender }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body shadow">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Date:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $appointment->schedule->formatted_date }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Day:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $appointment->schedule->day }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Time:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $appointment->formatted_time }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Type:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $appointment->formatted_type }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Title:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $appointment->title }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Notes:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $appointment->notes }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Status:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $appointment->formatted_status }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
