@extends('front.templates.app')
@section('title', 'Catégorie ' . $category->title)
@section('content')
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center"
            data-background=  "{{ asset('assets/img/hero/bg-human.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Catégorie {{ $category->title }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="job-listing-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <section class="featured-job-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="count-job mb-35">
                                        <span>{{ $offers->count() }} emplois trouvés</span>
                                    </div>
                                </div>
                            </div>
                            @foreach ($offers as $offer)
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="{{ route('offer.show', $offer->id) }}"><img
                                                    src="{{ asset('assets/img/icon/job-list1.png') }}" alt="enterprise logo"></a>
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
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
