@extends('layouts.back-end.app')

@section('title', 'Schedule Management | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">Schedule Management</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @elseif(session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif

    <a class="btn btn-primary mb-4" href="{{ route('doctor.schedules.create') }}" role="button"><i
            class="bi bi-calendar-plus-fill me-1"></i>Add Schedule</a>

    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-body shadow">
                    <div class="table-responsive">
                        <table class="table table-borderless" id="dataTables" width="100%" cellspacing="0">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <td>{{ $schedule->id }}</td>
                                        <td>{{ $schedule->formatted_date }}</td>
                                        <td>{{ $schedule->day }}</td>
                                        <td>{{ $schedule->formatted_start_time }}</td>
                                        <td>{{ $schedule->formatted_end_time }}</td>
                                        <td>
                                            @if ($schedule->status == 'active')
                                                <span class="badge rounded-pill text-bg-success">Active</span>
                                            @elseif ($schedule->status == 'inactive')
                                                <span class="badge rounded-pill text-bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-success btn-sm"
                                                href="{{ route('doctor.schedules.edit', $schedule->id) }}" role="button"><i
                                                    class="bi bi-pen-fill"></i></a>

                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteScheduleModal{{ $schedule->id }}">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>

                                            <div class="modal fade" id="deleteScheduleModal{{ $schedule->id }}"
                                                tabindex="-1"
                                                aria-labelledby="deleteScheduleModalLabel{{ $schedule->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5"
                                                                id="deleteScheduleModalLabel{{ $schedule->id }}">
                                                                Confirm Delete Schedule
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-start">Are you sure you want to delete the
                                                                Schedule?</p>
                                                            <form
                                                                action="{{ route('doctor.schedules.destroy', $schedule->id) }}"
                                                                method="POST" id="deleteScheduleForm{{ $schedule->id }}">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                form="deleteScheduleForm{{ $schedule->id }}">Save
                                                                changes</button>
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
