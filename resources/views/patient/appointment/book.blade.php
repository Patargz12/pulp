@extends('layouts.back-end.app')

@section('title', 'Book Appointment | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">Book Appointment</h1>

    <a class="btn btn-primary mb-4" href="{{ route('patient.appointments.create') }}" role="button"><i
            class="bi bi-caret-left-fill me-1"></i>Back</a>

    <div class="row mb-4 flex-sm-row-reverse">

        <div class="col-md-4">
            <div class="card">
                <div class="card-body shadow">
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        @if ($schedule->doctor->user->avatar)
                            <img src="{{ asset($schedule->doctor->user->avatar_formatted) }}" alt="avatar"
                                class="img-fluid rounded-circle avatar mb-3">
                        @else
                            <img src="{{ asset('images/avatar.jpg') }}" alt="avatar"
                                class="img-fluid rounded-circle avatar mb-3">
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <p class="mb-0 text-primary">Name:</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-muted mb-0">{{ $schedule->doctor->full_name }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="mb-0 text-primary">Email:</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-muted mb-0">{{ $schedule->doctor->email }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="mb-0 text-primary">Contact:</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-muted mb-0">{{ $schedule->doctor->contact_number }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body shadow">
                    <form action="{{ route('patient.appointments.store') }}" method="POST" id="addAppointmentForm">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="time" class="form-label">Choose a time slot:</label>
                            <select class="form-select @error('time') is-invalid @enderror" name="time" id="time">
                                <option selected disabled>Select a time slot</option>
                                @foreach ($availableTimeSlots as $scheduleId => $slots)
                                    @foreach ($slots as $slot)
                                        @if (!isBooked($scheduleId, $slot))
                                            <option value="{{ $slot }}">{{ date('h:i A', strtotime($slot)) }}
                                            </option>
                                        @else
                                            <option value="{{ $slot }}" disabled>
                                                {{ date('h:i A', strtotime($slot)) }} (Booked)</option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>

                            @error('time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-select @error('type') is-invalid @enderror"
                                aria-label="Default select example" name="type" id="type" form="addAppointmentForm">
                                <option selected>Select a service type</option>
                                <option value="tooth-extraction">Tooth Extraction</option>
                                <option value="orthondontics">Orthodontics</option>
                                <option value="veeners">Veeners</option>
                                <option value="whitening-dental">Whitening Dental</option>
                                <option value="filling">Filling</option>
                            </select>

                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="floatingTextarea" class="form-label">Notes</label>
                            <textarea class="form-control @error('notes') is-invalid @enderror" placeholder="Leave a note here"
                                id="floatingTextarea" style="height: 100px" name="notes"></textarea>

                            @error('notes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                        <input type="hidden" name="doctor_id" value="{{ $schedule->doctor_id }}">

                        <div class="d-grid">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addAppointmentModal">
                                <i class="bi bi-bookmark-plus-fill me-1"></i>Book Appointment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addAppointmentModal" tabindex="-1" aria-labelledby="addAppointmentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addAppointmentModalLabel">Confirm Book Appoinment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to book the Appointment on the given schedule?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="addAppointmentForm">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
