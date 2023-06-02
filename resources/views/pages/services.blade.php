@extends('layouts.front-end.app')

@section('title', 'Services | Pulp Dental Clinic')

@section('style')

@endsection

@section('navbar')
    @include('layouts.front-end.partials.navbar-transparent')
@endsection

@section('content')
    <section class="hero">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4 mt-5" src="{{ asset('/images/pulp-light.png') }}" alt="" width="100">
            <h1 class="display-1 fw-bold lh-1 mb-3 text-light">SERVICES</h1>
            <div class="col-lg-6 px-5 mx-auto">
                <p class="lead text-light">Here are the services that we offer for you</p>
            </div>
        </div>
    </section>

    <section>
        <div class="container col-xxl-8 col-xl-10 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('images/extraction_image.jpg') }}"
                        class="d-block mx-lg-auto img-fluid rounded shadow" alt="tooth extraction" width="500"
                        loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3 text-primary">Tooth Extraction</h1>
                    <p class="lead">The removal of teeth from the dental alveolus in the alveolar bone is known as a
                        dental
                        extraction. One of the most prevalent uses for extractions is to remove teeth that have gotten
                        impacted.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-primary">
        <div class="container col-xxl-8 col-xl-10 px-4 py-5">
            <div class="row flex-lg-row align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('images/orthodontics.jpg') }}" class="d-block mx-lg-auto img-fluid rounded shadow"
                        alt="orthodontics" width="500" loading="lazy">
                </div>
                <div class="col-lg-6 text-light">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Orthodontics</h1>
                    <p class="lead">The dental speciality that deals with the diagnosis, prevention, interception,
                        guidance,
                        and correction of poor bites is known formally as orthodontics and dentofacial orthopedics. A
                        healthy
                        bite is achieved through orthodontic treatment, which results in straight teeth that properly
                        contact
                        opposing teeth in the opposing jaw.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container col-xxl-8 col-xl-10 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('images/veneers.jpg') }}" class="d-block mx-lg-auto img-fluid rounded shadow"
                        alt="veneers" width="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3 text-primary">Veeners</h1>
                    <p class="lead">Custom-made covers for your teeth's front surfaces are called dental veneers. They
                        cover up stains, chips, cracks, and other visual flaws. One of the most popular cosmetic
                        dentistry
                        procedures is veneer placement. Several veneer varieties are available, based on your unique
                        objectives.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-primary">
        <div class="container col-xxl-8 col-xl-10 px-4 py-5">
            <div class="row flex-lg-row align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('images/whitening.jpg') }}" class="d-block mx-lg-auto img-fluid rounded shadow"
                        alt="tooth whitening" width="500" loading="lazy">
                </div>
                <div class="col-lg-6 text-light">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Whitening</h1>
                    <p class="lead">The technique of lightening the shade of a person's teeth is known as tooth
                        whitening
                        or
                        tooth bleaching. When teeth turn yellow over time for a variety of causes, whitening is
                        frequently
                        desired. Whitening can be accomplished by altering the intrinsic or extrinsic color of the tooth
                        enamel.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container col-xxl-8 col-xl-10 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('images/dentalfilling.jpg') }}" class="d-block mx-lg-auto img-fluid rounded shadow"
                        alt="dental filling" width="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3 text-primary">Dental Filling</h1>
                    <p class="lead">Dental restoration, dental fillings, or simply fillings are procedures used to
                        replace
                        missing tooth
                        structure supported by dental implants as well as to restore the function, integrity, and
                        morphology
                        of missing tooth structure caused by caries or external injuries.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('layouts.front-end.partials.footer')
@endsection
