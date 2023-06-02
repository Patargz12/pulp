@extends('layouts.back-end.app')

@section('title', 'Doctor Information | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">Doctor Information</h1>

    <a class="btn btn-primary mb-4" href="{{ route('admin.doctors.index') }}" role="button"><i
            class="bi bi-caret-left-fill me-1"></i>Back</a>

    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body shadow text-center">
                    @if ($doctor->user->avatar)
                    @else
                        <img src="{{ asset('images/avatar.jpg') }}" alt="avatar" class="img-fluid rounded-circle mb-3"
                            width="200">
                    @endif

                    <h4 class="mb-3 text-primary">{{ $doctor->full_name }}</h4>
                    <p class="lead mb-3">{{ $doctor->role }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body shadow">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Full Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $doctor->full_name }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $doctor->email }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Contact</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $doctor->contact_number }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Gender</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $doctor->formatted_gender }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Birthday</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $doctor->formatted_birthday }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Address</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $doctor->address }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
