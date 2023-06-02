@extends('layouts.back-end.app')

@section('title', 'Profile | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">Profile</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body shadow text-center">
                    @if ($user->avatar)
                        <img src="{{ asset($user->avatar_formatted) }}" alt="avatar" class="img-fluid rounded-circle mb-3"
                            width="200">
                    @else
                        <img src="{{ asset('images/avatar.jpg') }}" alt="avatar" class="img-fluid rounded-circle mb-3"
                            width="200">
                    @endif
                    <h4 class="mb-3 text-primary">{{ $user->full_name }}</h4>
                    <p class="lead mb-3">{{ $user->role }}</p>
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
                            <p class="text-muted mb-0">{{ $user->full_name }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $user->email }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Contact</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $user->contact_number }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Gender</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $user->patient->formatted_gender }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Birthday</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $user->patient->formatted_birthday }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-primary">Address</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $user->patient->address }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('patient.users.edit', $user->id) }}" role="button"
                                    class="btn btn-primary"><i class="bi bi-pen-fill me-1"></i>Edit
                                    Profile</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteAccountModal">
                                    <i class="bi bi-trash-fill me-1"></i>Delete
                                    Account
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteAccountModalLabel">Confirm Delete Account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.users.destroy', $user->id) }}" id="deleteAccountForm" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                    <p>Are you sure you want to delete your account?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="deleteAccountForm">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection
