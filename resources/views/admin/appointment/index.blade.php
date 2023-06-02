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
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-evenly">
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('admin.appointments.show', $appointment->id) }}"
                                                    role="button"><i class="bi bi-info-circle-fill"></i></a>

                                                <a class="btn btn-secondary btn-sm"
                                                    href="{{ route('admin.appointments.edit', $appointment->id) }}"
                                                    role="button"><i class="bi bi-pen-fill"></i></a>

                                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#completeAppointmentModal{{ $appointment->id }}">
                                                    <i class="bi bi-check-lg"></i>
                                                </button>

                                                <div class="modal fade" id="completeAppointmentModal{{ $appointment->id }}"
                                                    tabindex="-1"
                                                    aria-labelledby="completeAppointmentModalLabel{{ $appointment->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5"
                                                                    id="completeAppointmentModalLabel{{ $appointment->id }}">
                                                                    Confirm Appointment
                                                                    Completion</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="text-start">Are you sure that the Appointment is
                                                                    completed?</p>
                                                                <form
                                                                    action="{{ route('admin.appointments.complete', $appointment->id) }}"
                                                                    method="POST"
                                                                    id="completeAppointmentForm{{ $appointment->id }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary"
                                                                    form="completeAppointmentForm{{ $appointment->id }}">Save
                                                                    changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#cancelAppointmentModal{{ $appointment->id }}">
                                                    <i class="bi bi-x-lg"></i>
                                                </button>

                                                <div class="modal fade" id="cancelAppointmentModal{{ $appointment->id }}"
                                                    tabindex="-1"
                                                    aria-labelledby="cancelAppointmentModalLabel{{ $appointment->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5"
                                                                    id="cancelAppointmentModalLabel{{ $appointment->id }}">
                                                                    Confirm Appointment Cancellation</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="text-start">Are you sure that the Appointment is
                                                                    cancelled?</p>
                                                                <form
                                                                    action="{{ route('admin.appointments.cancel', $appointment->id) }}"
                                                                    method="POST"
                                                                    id="cancelAppointmentForm{{ $appointment->id }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary"
                                                                    form="cancelAppointmentForm{{ $appointment->id }}">Save
                                                                    changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

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
