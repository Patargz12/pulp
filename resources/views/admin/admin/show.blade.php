@extends('layouts.back-end.app')

@section('title', 'Admin Information | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">Admin Information</h1>

    <a class="btn btn-primary mb-4" href="{{ route('admin.admins.index') }}" role="button"><i
            class="bi bi-caret-left-fill me-1"></i>Back</a>

    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body shadow text-center">
                    @if ($admin->user->avatar)
                    @else
                        <img src="{{ asset('images/avatar.jpg') }}" alt="avatar" class="img-fluid rounded-circle mb-3"
                            width="200">
                    @endif

                    <h4 class="mb-3 text-primary">{{ $admin->full_name }}</h4>
                    <p class="lead mb-3">{{ $admin->role }}</p>
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
                            <p class="text-muted mb-0">{{ $admin->full_name }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $admin->email }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Contact</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $admin->contact_number }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Gender</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $admin->formatted_gender }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Birthday</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $admin->formatted_birthday }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Address</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $admin->address }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
