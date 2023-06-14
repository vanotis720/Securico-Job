@extends('front.templates.app')
@section('title', 'Trouvez les emplois les plus excitants')
@section('content')
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center"
            data-background=  "{{ asset('assets/img/hero/bg-human.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>
                                Vous pouvez
                                <i class="fa fa-arrow-down"></i>
                            </h2>
                            <div class="button-group-area mt-5">
                                <a href="tel:+243808516611" class="btn head-btn1">
                                    nous contacter au 
                                    +243 808 516 611
                                </a>
                                <a href="{{ route('register') }}" class="btn head-btn2">Créer votre profil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
@endsection
