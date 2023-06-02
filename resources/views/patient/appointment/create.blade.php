@extends('layouts.back-end.app')

@section('title', 'Select Schedule | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">Available Schedules</h1>

    <a class="btn btn-primary mb-4" href="{{ route('patient.appointments.index') }}" role="button"><i
            class="bi bi-caret-left-fill me-1"></i>Back</a>
    <div class="row row-cols-4">
        @foreach ($schedules as $schedule)
            <div class="col">
                <div class="card mb-4">
                    <div class="card-body shadow">
                        <div class="d-flex justify-content-center">
                            @if ($schedule->doctor->user->avatar)
                                <img src="{{ asset($schedule->doctor->user->avatar_formatted) }}" alt="avatar"
                                    class="img-fluid rounded-circle avatar-md mb-4">
                            @else
                                <img src="{{ asset('images/avatar.jpg') }}" alt="avatar"
                                    class="img-fluid rounded-circle avatar-md mb-4">
                            @endif
                        </div>

                        <h5 class="text-primary text-center">{{ $schedule->doctor->full_name }}</h5>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="mb-0 text-primary">Date:</p>
                            </div>
                            <div class="col-sm-8">
                                <p class="text-muted mb-0">{{ $schedule->formatted_date }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <p class="mb-0 text-primary">Day:</p>
                            </div>
                            <div class="col-sm-8">
                                <p class="text-muted mb-0">{{ $schedule->day }}</p>
                            </div>
                        </div>

                        <div class="d-grid">
                            <a class="btn btn-primary" href="{{ route('patient.appointments.book', $schedule->id) }}"
                                role="button"><i class="bi bi-bookmark-plus-fill me-1"></i>Select
                                Schedule</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-12">
            {{ $schedules->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
