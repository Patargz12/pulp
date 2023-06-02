<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navbarTransparent">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/" id="navbar-brand">
            <img src="{{ asset('images/pulp-light.png') }}" alt="logo" height="32" id="navbar-brand-img-top">
            <img src="{{ asset('images/pulp.png') }}" alt="logo" height="32" id="navbar-brand-img-scroll">
            Pulp Dental Clinic
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/"><i
                            class="bi bi-house me-2"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('services') ? 'active' : '' }}" href="/services"><i
                            class="bi bi-hospital me-2"></i>Services</a>
                </li>
            </ul>

            <ul class="navbar-nav mb-2 mb-lg-0">
                <a href="{{ route('login') }}">
                    <button class="btn btn-outline-light" type="button" id="buttonOutline">Request an
                        appointment</button>
                </a>
            </ul>
        </div>
    </div>
</nav>
