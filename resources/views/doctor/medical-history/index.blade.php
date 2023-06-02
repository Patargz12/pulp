@extends('layouts.back-end.app')

@section('title', 'Patient Records | Pulp Dental Clinic')

@section('content')
    <h1 class="my-4 text-primary">Patient Records</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
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
                    <div class="table-responsive">
                        <table class="table table-borderless" id="dataTables" width="100%" cellspacing="0">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Gender</th>
                                    <th>Birthday</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($patients as $patient)
                                    <tr>
                                        <td>{{ $patient->id }}</td>
                                        <td>{{ $patient->full_name }}</td>
                                        <td>{{ $patient->formatted_gender }}</td>
                                        <td>{{ $patient->formatted_birthday }}</td>
                                        <td>{{ $patient->email }}</td>
                                        <td>{{ $patient->contact_number }}</td>
                                        <td>
                                            @if ($patient->medicalHistory->isNotEmpty())
                                                @foreach ($patient->medicalHistory as $medicalHistory)
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('doctor.medical-history.show', ['patient' => $patient->id, 'medicalHistory' => $medicalHistory->id]) }}"
                                                        role="button"><i class="bi bi-info-circle-fill"></i></a>
                                                @endforeach

                                                @foreach ($patient->medicalHistory as $medicalHistory)
                                                    <a class="btn btn-success btn-sm"
                                                        href="{{ route('doctor.medical-history.edit', ['patient' => $patient->id, 'medicalHistory' => $medicalHistory->id]) }}"
                                                        role="button"><i class="bi bi-clipboard2-pulse-fill"></i></a>
                                                @endforeach
                                            @else
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('doctor.medical-history.create', $patient->id) }}"
                                                    role="button"><i class="bi bi-clipboard-plus-fill"></i></a>
                                            @endif
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
