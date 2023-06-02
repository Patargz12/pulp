@extends('layouts.back-end.app')

@section('title', 'Appointment Management | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">Appointment Management</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @elseif(session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @endif

    <div class="row">
        <div class="col">
            <div class="card mb-4">
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
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-evenly">
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('admin.appointments.show', $appointment->id) }}"
                                                    role="button"><i class="bi bi-info-circle-fill"></i></a>
                                            </div>
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
