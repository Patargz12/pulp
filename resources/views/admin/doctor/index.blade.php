@extends('layouts.back-end.app')

@section('title', 'Doctor Management | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">Doctor Management</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @endif

    <a class="btn btn-primary mb-4" href="{{ route('admin.doctors.create') }}" role="button"><i
            class="bi bi-person-fill-add me-1"></i>Add Doctor</a>

    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-body shadow">
                    <div class="table-responsive">
                        <table class="table table-borderless" id="dataTables" width="100%" cellspacing="0">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $doctor->id }}</td>
                                        <td>
                                            @if ($doctor->user->avatar)
                                                <img src="{{ asset($doctor->user->avatar_formatted) }}" alt="avatar"
                                                    class="table-img img-fluid rounded-circle">
                                            @else
                                                <img src="{{ asset('images/avatar.jpg') }}" alt="avatar"
                                                    class="table-img img-fluid rounded-circle">
                                            @endif
                                        </td>
                                        <td>{{ $doctor->full_name }}</td>
                                        <td>{{ $doctor->formatted_gender }}</td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>{{ $doctor->contact_number }}</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-evenly">
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('admin.doctors.show', $doctor->id) }}" role="button"><i
                                                        class="bi bi-info-circle-fill"></i></a>

                                                <a class="btn btn-secondary btn-sm"
                                                    href="{{ route('admin.doctors.edit', $doctor->id) }}" role="button"><i
                                                        class="bi bi-pen-fill"></i></a>

                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#deleteDoctorModal{{ $doctor->id }}">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>

                                                <div class="modal fade" id="deleteDoctorModal{{ $doctor->id }}"
                                                    tabindex="-1"
                                                    aria-labelledby="deleteDoctorModalLabel{{ $doctor->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5"
                                                                    id="deleteDoctorModalLabel{{ $doctor->id }}">Confirm
                                                                    Delete Doctor</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="text-start">Are you sure you want to delete
                                                                    Doctor?</p>

                                                                <form method="POST"
                                                                    action="{{ route('admin.doctors.destroy', $doctor->id) }}"
                                                                    id="deleteDoctorForm{{ $doctor->id }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary"
                                                                    form="deleteDoctorForm{{ $doctor->id }}">Save
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
