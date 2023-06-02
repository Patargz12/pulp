@extends('layouts.back-end.app')

@section('title', 'Edit Appointment | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">Edit Appointment Schedule</h1>

    <a class="btn btn-primary mb-4" href="{{ route('admin.appointments.index') }}" role="button"><i
            class="bi bi-caret-left-fill me-1"></i>Back</a>

    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-body shadow">
                    <div class="table-responsive">
                        <table class="table table-borderless" id="dataTables" width="100%" cellspacing="0">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Doctor</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <td>{{ $schedule->formatted_date }}</td>
                                        <td>{{ $schedule->day }}</td>
                                        <td>{{ $schedule->doctor->full_name }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('admin.appointments.schedule', [
                                                    'appointment' => $appointment->id,
                                                    'schedule' => $schedule->id,
                                                ]) }}"
                                                role="button"><i class="bi bi-calendar-check-fill"></i></a>
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
