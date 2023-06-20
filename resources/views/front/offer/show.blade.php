@extends('front.templates.app')
@section('title', $offer->title)
@section('content')
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center"
            data-background=  "{{ asset('assets/img/hero/bg-human.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>{{ $offer->title }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- job post company Start -->
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="#">
                                    <img class="img-fluid" width="150px" src="{{ asset('assets/img/icon/' . $offer->picture) }}" alt="">
                                </a>
                            </div>
                            <div class="job-tittle">
                                <a href="#">
                                    <h4>{{ $offer->title }}</h4>
                                </a>
                                <ul>
                                    <li>{{ $offer->user->recruiter->enterprise }}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>
                                        {{ $offer->category->title }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->

                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Description du poste</h4>
                            </div>
                            <p>
                                {!! $offer->description !!}
                            </p>
                        </div>
                        <div class="post-details2  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Connaissances, compétences et capacités requises</h4>
                            </div>
                            <ul>
                                @foreach (explode(' ', $offer->skills) as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="post-details2  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Formation</h4>
                            </div>
                            <ul>
                                <li>{{ $offer->school }}</li>
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Aperçu du poste</h4>
                        </div>
                        <ul>
                            <li>Date de publication : <span>{{ $offer->created_at->format('d-m-Y') }}</span></li>
                            {{-- <li>Location : <span>New York</span></li>
                            <li>Vacancy : <span>02</span></li>
                            <li>Job nature : <span>Full time</span></li>
                            <li>Salary : <span>$7,800 yearly</span></li> --}}
                            <li>Date de fin des candidatures : <span>{{ $offer->end_at }}</span></li>
                        </ul>
                        <div class="apply-btn2">
                            <a href="{{ route('offer.candidate', $offer->id) }}" class="btn">Postulez maintenant</a>
                        </div>
                    </div>
                    <div class="post-details4  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Informations sur la société</h4>
                        </div>
                        <span>Securico</span>
                        <p>
                            Contactez Securico pour plus des détails sur l'entreprise qui a soumis ce poste
                        </p>
                        <ul>
                            <li>Email: <span>info@securicosarl.net</span></li>
                            <li>Phone: <span>+243 808 516 611</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->
@endsection
