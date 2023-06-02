<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <div class="sb-sidenav-menu-heading">Menu</div>

                <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-speedometer fs-5"></i></div>
                    Dashboard
                </a>

                @if (Auth::user()->hasRole('admin'))
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseAppointments" aria-expanded="false"
                        aria-controls="collapseAppointments">
                        <div class="sb-nav-link-icon"><i class="bi bi-calendar2-week-fill fs-5"></i></div>
                        Appointments
                        <div class="sb-sidenav-collapse-arrow"><i class="bi bi-caret-down-fill"></i></div>
                    </a>
                    <div class="collapse" id="collapseAppointments" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('admin.appointments.index') }}">Ongoing Appointments</a>
                            <a class="nav-link" href="{{ route('admin.appointments.completed') }}">Completed
                                Appointments</a>
                            <a class="nav-link" href="{{ route('admin.appointments.cancelled') }}">Cancelled
                                Appointments</a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                        <div class="sb-nav-link-icon"><i class="bi bi-people-fill fs-5"></i></div>
                        Users
                        <div class="sb-sidenav-collapse-arrow"><i class="bi bi-caret-down-fill"></i></div>
                    </a>
                    <div class="collapse" id="collapseUsers" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('admin.patients.index') }}">Patients</a>
                            <a class="nav-link" href="{{ route('admin.doctors.index') }}">Doctors</a>
                            <a class="nav-link" href="{{ route('admin.admins.index') }}">Admins</a>
                        </nav>
                    </div>
                @elseif (Auth::user()->hasRole('doctor'))
                    <a class="nav-link" href="{{ route('doctor.appointments.index') }}">
                        <div class="sb-nav-link-icon"><i class="bi bi-calendar2-date-fill fs-5"></i></div>
                        Appointments
                    </a>

                    <a class="nav-link" href="{{ route('doctor.schedules.index') }}">
                        <div class="sb-nav-link-icon"><i class="bi bi-calendar2-week-fill fs-5"></i></div>
                        Schedules
                    </a>

                    <a class="nav-link" href="{{ route('doctor.medical-history.index') }}">
                        <div class="sb-nav-link-icon"><i class="bi bi-clipboard2-pulse-fill fs-5"></i></div>
                        Medical Records
                    </a>
                @elseif(Auth::user()->hasRole('patient'))
                    <a class="nav-link" href="{{ route('patient.appointments.index') }}">
                        <div class="sb-nav-link-icon"><i class="bi bi-calendar2-date-fill fs-5"></i></div>
                        Appointment
                    </a>
                @endif
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
        </div>
    </nav>
</div>
