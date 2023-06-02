<nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
    <a class="navbar-brand ps-3" href="{{ route('home') }}">
        <img src="{{ asset('images/pulp-light.png') }}" alt="logo" height="32"> Pulp Dental Clinic</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
        <i class="bi bi-list fs-5"></i>
    </button>

    <ul class="navbar-nav ms-auto me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill fs-5"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                @if (Auth::user()->hasRole('admin'))
                    <li><a class="dropdown-item" href="{{ route('admin.profile') }}">Profile</a></li>
                @elseif (Auth::user()->hasRole('doctor'))
                    <li><a class="dropdown-item" href="{{ route('doctor.profile') }}">Profile</a></li>
                @elseif (Auth::user()->hasRole('patient'))
                    <li><a class="dropdown-item" href="{{ route('patient.profile') }}">Profile</a></li>
                @endif

                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    Logout
                </li>
            </ul>
        </li>
    </ul>
</nav>

<div class="modal fade" id="logoutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="logoutModalLabel">Confirm Logout</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="{{ route('logout') }}" role="button" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
</div>
