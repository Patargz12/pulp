@extends('layouts.back-end.app')

@section('title', 'Admin Management | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">Admin Management</h1>

    <a href="{{ route('admin.admins.create') }}" class="btn btn-primary mb-4" role="button"><i
            class="bi bi-person-fill-add me-1"></i>Add Admin</a>

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
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->id }}</td>
                                        <td>
                                            @if ($admin->user->avatar)
                                                <img src="{{ asset($admin->user->avatar_formatted) }}" alt="avatar"
                                                    class="table-img img-fluid rounded-circle">
                                            @else
                                                <img src="{{ asset('images/avatar.jpg') }}" alt="avatar"
                                                    class="table-img img-fluid rounded-circle">
                                            @endif
                                        </td>
                                        <td>{{ $admin->full_name }}</td>
                                        <td>{{ $admin->formatted_gender }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->contact_number }}</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-evenly">
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('admin.admins.show', $admin->id) }}" role="button"><i
                                                        class="bi bi-info-circle-fill"></i></a>

                                                @if ($admin->id === Auth::user()->admin->id)
                                                    <a class="btn btn-secondary btn-sm"
                                                        href="{{ route('admin.admins.edit', $admin->id) }}"
                                                        role="button"><i class="bi bi-pen-fill"></i></a>
                                                @endif
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
