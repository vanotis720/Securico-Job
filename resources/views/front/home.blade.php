@extends('front.templates.app')
@section('title', 'Trouvez les emplois les plus excitants')
@section('content')
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/bg-human.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-9 col-md-10">
                            <div class="hero__caption">
                                <h1>Trouvez les emplois les plus excitants</h1>
                                @include('alert')
                            </div>
                        </div>
                    </div>
                    <!-- Search Box -->
                    <div class="row">
                        <div class="col-xl-8">
                            <!-- form -->
                            <form action="#" class="search-box">
                                <div class="input-form">
                                    <input type="text" placeholder="Intitulé du poste ou mot-clé">
                                </div>
                                <div class="search-form">
                                    <a href="#">Chercher</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!-- Our Services Start -->
    <div class="our-services section-pad-t30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Catégories</span>
                        <h2>Parcourir les meilleures catégories</h2>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-contnet-center">
                @foreach ($categories as $category)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <img src="assets/img/icon/{{ $category->icon }}" height="100" width="100"
                                    class="img-fluid" alt="{{ $category->icon }}">
                            </div>
                            <div class="services-cap">
                                <h5><a href="{{ route('category.show', $category->id) }}">{{ $category->title }}</a></h5>
                                <span>({{ $category->offers->count() }})</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="browse-btn2 text-center mt-50">
                        <a href="/" class="border-btn2">Tout parcourir</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    @guest
        <!-- Online CV Area Start -->
        <div class="online-cv cv-bg section-overly pt-90 pb-120" data-background="assets/auth/images/bg-human.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="cv-caption text-center">
                            <p class="pera1">Profil en ligne</p>
                            <p class="pera2"> Faites la différence avec votre CV en ligne!</p>
                            <a href="{{ route('submitCv') }}" class="border-btn2 border-btn4">Télécharger votre CV</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Online CV Area End-->
    @endguest
    <!-- Featured_job_start -->
    <section class="featured-job-area feature-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Offre d'emploi récente</span>
                        <h2>Offres d'emploi</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    @foreach ($offers as $offer)
                        <div class="single-job-items mb-30">
                            <div class="job-items">
                                <div class="company-img">
                                    <a href="{{ route('offer.show', $offer->id) }}"><img
                                            src=" assets/img/icon/job-list1.png" alt="enterprise logo"></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="{{ route('offer.show', $offer->id) }}">
                                        <h4>{{ $offer->title }}</h4>
                                    </a>
                                    {{-- <ul>
                                        <li>Creative Agency</li>
                                        <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                        <li>$3500 - $4000</li>
                                    </ul> --}}
                                </div>
                            </div>
                            <div class="items-link f-right">
                                <a href="{{ route('offer.show', $offer->id) }}">Voir les détails</a>
                                <span>{{ $offer->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="browse-btn2 text-center mt-50">
                        <a href="/" class="border-btn2">Tout parcourir</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <!-- Featured_job_end -->
    <!-- How  Apply Process Start-->
    <div class="apply-process-area apply-bg pt-150 pb-150" data-background=" assets/img/gallery/how-applybg.png  ">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle white-text text-center">
                        <span>Processus de candidature</span>
                        <h2>Comment ça marche ?</h2>
                    </div>
                </div>
            </div>
            <!-- Apply Process Caption -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-search"></span>
                        </div>
                        <div class="process-cap">
                            <h5>1. Rechercher un emploi</h5>
                            <p>Commencez par rechercher votre offre dans la liste ou la barre de recherche.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-curriculum-vitae"></span>
                        </div>
                        <div class="process-cap">
                            <h5>2. Postuler pour un poste</h5>
                            <p>Une fois que vous avez trouvé l'offre qui vous convient, vous pouvez candidater.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-tour"></span>
                        </div>
                        <div class="process-cap">
                            <h5>3. Obtenez votre travail</h5>
                            <p>Si votre profil correspond aux attentes du recruteur, alors vous serez recontacté.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- How  Apply Process End-->

    <!-- Support Company Start-->
    {{-- <div class="support-company-area support-padding fix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="right-caption">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2">
                            <span>Ce que nous faisons</span>
                            <h2>24k Talented people are getting Jobs</h2>
                        </div>
                        <div class="support-caption">
                            <p class="pera-top">Mollit anim laborum duis au dolor in voluptate velit ess cillum
                                dolore eu lore dsu quality mollit anim laborumuis au dolor in voluptate velit
                                cillum.</p>
                            <p>Mollit anim laborum.Duis aute irufg dhjkolohr in re voluptate velit esscillumlore eu
                                quife nrulla parihatur. Excghcepteur signjnt occa cupidatat non inulpadeserunt
                                mollit aboru. temnthp incididbnt ut labore mollit anim laborum suis aute.</p>
                            <a href="about.html" class="btn post-btn">Post a job</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="support-location-img">
                        <img src=" assets/img/service/support-img.jpg  " alt="">
                        <div class="support-img-cap text-center">
                            <p>Since</p>
                            <span>1994</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Support Company End-->
@endsection
