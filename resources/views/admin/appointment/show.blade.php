@extends('layouts.back-end.app')

@section('title', 'Appointment Information | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">Appointment Information</h1>

    <a href="{{ route('admin.appointments.index') }}" class="btn btn-primary mb-4"><i
            class="bi bi-caret-left-fill me-1"></i>Back</a>

    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header text-primary">Patient</div>
                <div class="card-body shadow">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Name:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $appointment->patient->full_name }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Email:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $appointment->patient->email }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Contact:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $appointment->patient->contact_number }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Gender:</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $appointment->patient->formatted_gender }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header text-primary">Doctor</div>
                <div class="card-body shadow">
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
    </div>

    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header text-primary">Appointment</div>
                <div class="card-body shadow">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Day</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Notes</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $appointment->schedule->formatted_date }}</td>
                                    <td>{{ $appointment->schedule->day }}</td>
                                    <td>{{ $appointment->formatted_time }}</td>
                                    <td>{{ $appointment->formatted_type }}</td>
                                    <td>{{ $appointment->title }}</td>
                                    <td>{{ $appointment->notes }}</td>
                                    <td>{{ $appointment->formatted_status }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
