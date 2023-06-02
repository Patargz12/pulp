@extends('layouts.front-end.app')

@section('title', 'Home | Pulp Dental Clinic')

@section('navbar')
    @include('layouts.front-end.partials.navbar-transparent')
@endsection

@section('content')
    <section class="parallax-hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="text-light">
                    <h2 class="fw-bold lh-1 mb-3">Welcome to</h2>
                    <h1 class="display-1 fw-bold lh-1 mb-3">Pulp Dental Clinic</h1>
                    <h2 class="fw-bold lh-1 mb-3">Your Trusted Dental Care Provider!</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="container col-xxl-8 col-xl-10 px-4 py-5 mb-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{ asset('images/clinic_pic.jpg') }}" class="img-fluid rounded shadow"
                    alt="A picture of a dentist treating a patient" width="500">
            </div>
            <div class="col-lg-6">
                <h3 class="display-5 fw-bold lh-1 mb-3 text-primary">Hello! This is</h3>
                <h2 class="mb-4 display-3 fw-bold lh-1 mb-3 text-primary">PULP Dental Clinic</h2>
                <p class="lead">
                    Our Liberty dentist office was built for people of all ages and celebrates the joy of a happy,
                    healthy
                    smile. We combine cutting-edge dentistry with a team who treats you like family, a relaxing
                    environment,
                    and amenities that delight. Enjoy personalized appointments and all-encompassing dental care
                    from
                    top-rated
                    professionals.
                </p>
                <p class="lead">
                    Everything you need, plus a little extra.
                </p>
            </div>
        </div>
    </section>

    <section class="bg-primary">
        <div class="container col-xxl-8 col-xl-10 px-4 py-5 mb-5">
            <h2 class="display-3 pb-2 text-center text-light fw-bold lh-1 mb-3">How could we help you?</h2>
            <div class="row">
                <div class="col mx-auto">
                    <div class="accordion py-5" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h3 class="text-primary fw-bold lh-1 mb-3">
                                        Time for a checkup?
                                    </h3>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="lead">We've got you covered with personalized cleanings, painless
                                        fillings,
                                        crowns,
                                        dentures, and
                                        bridges.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h3 class="text-primary fw-bold lh-1 mb-3">
                                        Fix damaged teeth
                                    </h3>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="lead">Expert surgical care from the team you know and trust. Implants,
                                        canals,
                                        extractions and
                                        more.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h3 class="text-primary fw-bold lh-1 mb-3">
                                        Improve your smile
                                    </h3>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="lead">We'll help you understand high-tech cosmetic options, like
                                        Invisalign,
                                        veneers, teeth
                                        whitening, and Botox.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <h3 class="text-primary fw-bold lh-1 mb-3">
                                        Get to know us
                                    </h3>
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="lead">Led by Dr. Raul Arganza, our team is proud to offer a fresh take on
                                        going to
                                        the dentist in
                                        Liberty.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container col-xxl-8 col-xl-10 px-4 py-5">
            <h2 class="display-3 pb-2 text-center text-primary fw-bold lh-1 mb-3">Contact Us</h2>
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d482.5171857146846!2d120.97749234328602!3d14.648135961354658!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b5d216479c83%3A0x88363864dfa38a05!2sDr.%20Raul%20C.%20Arganza!5e0!3m2!1sen!2sph!4v1678076673814!5m2!1sen!2sph"
                        width="613" height="450" style="border:0;" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" class="ratio ratio-1x1 rounded shadow"></iframe>
                </div>

                <div class="col-lg-6">
                    <h2 class="mb-4 display-3 fw-bold lh-1 mb-3 text-primary">Location</h2>
                    <h3 class="fw-bold lh-1 mb-3 text-primary">249 Yakal St. 8th Avenue</h3>
                    <h3 class="fw-bold lh-1 mb-3 text-primary">Caloocan City</h3>
                    <p class="lead mb-3">
                        PULP Dental Clinic is conveniently located right off of Yakal Street. Enjoy our spa-like
                        atmosphere
                        and
                        family-friendly approach. We look forward to seeing you!
                    </p>
                    <p class="lead mb-3">
                        Everything you need, plus a little extra.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="bg-primary">
        <section class="container col-xxl-8 col-xl-10 px-4 py-5 text-light">
            <div class="row g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <h2 class="mb-4 display-3 fw-bold lh-1 mb-3">Phone</h2>
                    <p class="lead mb-3">
                        Thank you for your interest in Pulp Dental Clinic. Please use the following contact information
                        to
                        get in touch with us:
                    </p>
                    <h3 class="fw-bold lh-1 mb-3"><i class="bi bi-phone-fill me-3"></i>+639 2744 84584</h3>
                    <h3 class="fw-bold lh-1 mb-3"><i class="bi bi-telephone-fill me-3"></i>3660878</h3>
                    <h3 class="fw-bold lh-1 mb-3"><i class="bi bi-envelope-fill me-3"></i>rauljessie2190@gmail.com</h3>
                </div>
                <div class="col-lg-6">
                    <h2 class="mb-4 display-3 fw-bold lh-1 mb-3">Hours</h2>
                    <p class="lead mb-3">Please note that these operating hours may be subject to change during holidays
                        or
                        special events.</p>
                    <ul class="list-group">
                        <li class="list-group-item lead">Monday: 10:00 AM - 6:00 PM</li>
                        <li class="list-group-item lead">Tuesday: 10:00 AM - 6:00 PM</li>
                        <li class="list-group-item lead">Thursday: 10:00 AM - 6:00 PM</li>
                        <li class="list-group-item lead">Sunday: 10:00 AM - 6:00 PM</li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('footer')
    @include('layouts.front-end.partials.footer')
@endsection
