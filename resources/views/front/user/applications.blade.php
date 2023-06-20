@extends('front.templates.app')
@section('title', 'Mes candidatures')
@section('content')

    <section class="featured-job-area">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Mes candidatures</span>
                        <h2>Mes candidatures</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    @foreach ($applications as $application)
                        <div class="single-job-items mb-30">
                            <div class="job-items">
                                <div class="company-img">
                                    <a href="{{ route('offer.show', $application->offer_id) }}">
                                        <img class="img-fluid" width="100px"
                                            src="{{ asset('assets/img/icon/' . $application->offer->picture) }}"
                                            alt="enterprise logo"></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="{{ route('offer.show', $application->offer_id) }}">
                                        <h4>{{ $application->title }}</h4>
                                    </a>
                                    <ul>
                                        <li>{{ $application->offer->user->recruiter->enterprise }}</li>
                                        <li><i class="fas fa-map-marker-alt"></i>
                                            {{ $application->offer->category->title }}
                                        </li>
                                    </ul>
                                    <ul class="mt-3">
                                        <li>
                                            <h4> Statut: 
                                                @if ($application->state == 'accepted')
                                                    <span class="badge badge-success">Acceptée</span>
                                                @elseif ($application->state == 'rejected')
                                                    <span class="badge badge-danger">Rejetée</span>
                                                @else
                                                    <span class="badge badge-info">En attente</span>
                                                @endif
                                            </h4>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="items-link f-right">
                                <a href="{{ route('offer.show', $application->offer_id) }}">Voir les détails</a>
                                <span>{{ $application->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
