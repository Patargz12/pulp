@extends('layouts.back-end.app')

@section('title', 'Add Schedule | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">Add Schedule</h1>

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body shadow">
                    <form action="{{ route('doctor.schedules.store') }}" method="POST" id="addScheduleForm"
                        onkeydown="return (event.keyCode!=13);">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="date" class="form-label">Schedule Date</label>
                                    <input type="date" name="date"
                                        class="form-control @error('date') is-invalid @enderror" id="date"
                                        min="{{ date('Y-m-d', strtotime(now())) }}">

                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="start_time" class="form-label">Start Time</label>
                                    <input type="time" name="start_time"
                                        class="form-control @error('start_time') is-invalid @enderror" id="start_time"
                                        min="8:00" max="17:00">

                                    @error('start_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="end_time" class="form-label">End Time</label>
                                    <input type="time" name="end_time"
                                        class="form-control @error('end_time') is-invalid @enderror" id="end_time"
                                        min="8:00" max="17:00">

                                    @error('end_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex">
                            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                data-bs-target="#addScheduleModal">
                                Add Schedule
                            </button>
                            <a class="btn btn-secondary w-100" href="{{ route('doctor.schedules.index') }}"
                                role="button">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addScheduleModal" tabindex="-1" aria-labelledby="addScheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addScheduleModalLabel">Confirm Add Schedule</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to add schedule?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="addScheduleForm">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
