@extends('layouts.back-end.app')

@section('title', 'Admin Dashboard | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">Admin Dashboard</h1>

    <div class="row mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 mx-auto my-auto">
                            <i class="bi bi-people-fill display-2"></i>
                        </div>
                        <div class="col-8 mx-auto my-auto">
                            <h1 class="mb-0">{{ $patientCount }}</h1>
                            <p class="lead mb-0">Total Number of Patients</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-secondary text-white h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 mx-auto my-auto">
                            <i class="bi bi-calendar-fill display-2"></i>
                        </div>
                        <div class="col-8 mx-auto my-auto">
                            <h1 class="mb-0">{{ $ongoingAppointments }}</h1>
                            <p class="lead mb-0">Ongoing Appointments</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 mx-auto my-auto">
                            <i class="bi bi-calendar2-check-fill display-2"></i>
                        </div>
                        <div class="col-8 mx-auto my-auto">
                            <h1 class="mb-0">{{ $completedAppointments }}</h1>
                            <p class="lead mb-0">Completed Appointments</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 mx-auto my-auto">
                            <i class="bi bi-calendar2-x-fill display-2"></i>
                        </div>
                        <div class="col-8 mx-auto my-auto">
                            <h1 class="mb-0">{{ $cancelledAppointments }}</h1>
                            <p class="lead mb-0">Cancelled Appointments</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header text-primary">
                    Appointments History
                </div>
                <div class="card-body shadow">
                    <div class="table-responsive">
                        <table class="table table-borderless" id="dataTables" width="100%" cellspacing="0">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Day</th>
                                    <th>Patient</th>
                                    <th>Doctor</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->schedule->formatted_date }}</td>
                                        <td>{{ $appointment->formatted_time }}</td>
                                        <td>{{ $appointment->schedule->day }}</td>
                                        <td>{{ $appointment->patient->full_name }}</td>
                                        <td>{{ $appointment->doctor->full_name }}</td>
                                        <td>
                                            @if ($appointment->status == 'pending')
                                                <span class="badge rounded-pill text-bg-secondary">
                                                    {{ $appointment->formatted_status }}</span>
                                            @elseif($appointment->status == 'confirmed')
                                                <span class="badge rounded-pill text-bg-primary">
                                                    {{ $appointment->formatted_status }}</span>
                                            @elseif($appointment->status == 'completed')
                                                <span class="badge rounded-pill text-bg-success">
                                                    {{ $appointment->formatted_status }}</span>
                                            @elseif($appointment->status == 'cancelled')
                                                <span class="badge rounded-pill text-bg-danger">
                                                    {{ $appointment->formatted_status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('admin.appointments.show', $appointment->id) }}"
                                                role="button"><i class="bi bi-info-circle-fill"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
