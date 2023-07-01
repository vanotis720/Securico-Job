@extends('front.templates.app')
@section('title', 'Trouvez les emplois les plus excitants')
@section('content')

    <section class="featured-job-area">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Offres d'emploi</span>
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
                                    <a href="{{ route('offer.show', $offer->id) }}">
                                        <img class="img-fluid" width="100px"
                                            src="{{ asset('assets/img/icon/' . $offer->picture) }}"
                                            alt="enterprise logo"></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="{{ route('offer.show', $offer->id) }}">
                                        <h4>{{ $offer->title }}</h4>
                                    </a>
                                    <ul>
                                        <li>{{ $offer->user->recruiter && $offer->user->recruiter->enterprise }}</li>
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            {{ $offer->category->title }}
                                        </li>
                                    </ul>
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
        </div>
    </section>

@endsection
