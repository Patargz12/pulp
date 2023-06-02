@extends('layouts.back-end.app')

@section('title', 'Edit Profile | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">Edit Profile</h1>

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
        <div class="col">
            <div class="card mb-4">
                <div class="card-body shadow">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" id="editAdminForm"
                        onkeydown="return (event.keyCode!=13);" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Avatar</label>
                                    <input class="form-control" type="file" id="formFile" name="avatar">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">{{ __('First Name') }}</label>

                                    <input id="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                        value="{{ $user->first_name }}">

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">{{ __('Last Name') }}</label>

                                    <input id="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                        value="{{ $user->last_name }}">

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>

                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $user->email }}">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="contact_number" class="form-label">{{ __('Contact Number') }}</label>

                                    <input id="contact_number" type="text"
                                        class="form-control @error('contact_number') is-invalid @enderror"
                                        name="contact_number" value="{{ $user->contact_number }}">

                                    @error('contact_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="birthday" class="form-label">{{ __('Birthday') }}</label>
                                    <input type="date" class="form-control @error('birthday') is-invalid @enderror"
                                        id="birthday" name="birthday" value="{{ $user->admin->birthday }}"
                                        min="1950-01-01" max="2007-12-31">

                                    @error('birthday')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gender" class="form-label">{{ __('Gender') }}</label>
                                    <select class="form-select @error('gender') is-invalid @enderror" id="gender"
                                        name="gender" form="editAdminForm">
                                        <option selected disabled>Select
                                            Gender
                                        </option>
                                        <option value="male" {{ $user->admin->gender == 'male' ? 'selected' : '' }}>
                                            Male
                                        </option>
                                        <option value="female" {{ $user->admin->gender == 'female' ? 'selected' : '' }}>
                                            Female
                                        </option>
                                        <option value="nonbinary"
                                            {{ $user->admin->gender == 'nonbinary' ? 'selected' : '' }}>
                                            Non-binary
                                        </option>
                                        <option value="transgender"
                                            {{ $user->admin->gender == 'transgender' ? 'selected' : '' }}>
                                            Transgender
                                        </option>
                                    </select>

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="address" class="form-label">{{ __('Address') }}</label>

                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ $user->admin->address }}">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="username" class="form-label">{{ __('Username') }}</label>

                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ $user->username }}">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex">

                            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                data-bs-target="#confirmEditAdminModal">
                                Edit Profile
                            </button>

                            <a class="btn btn-secondary w-100" href="{{ route('admin.profile') }}"
                                role="button">Cancel</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmEditAdminModal" tabindex="-1" aria-labelledby="confirmEditAdminModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="confirmEditAdminModalLabel">Confirm Edit Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to edit Profile?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="editAdminForm">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
