@extends('front.templates.app')
@section('title', 'Compléter votre profil')
@section('content')
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center"
            data-background=  "{{ asset('assets/img/banner/img.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Compléter votre profil</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Compléter votre profil</h2>
                </div>
                <div class="col-lg-12">
                    @include('alert')
                    <form class="form" action="{{ route('candidate.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="skills">Vos compétences</label>
                                    <textarea class="form-control w-100" name="skills" id="skills" cols="30" rows="9"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Listez vos compétences séparées par une virgule'"
                                        placeholder="Listez vos compétences séparées par une virgule"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="skills">Quelle est votre niveau scolaire ?</label>
                                    <select class="form-select" name="school" id="school" required>
                                        <option>Universitaire</option>
                                        <option>École secondaire</option>
                                        <option>École Primaire</option>
                                        <option>Je n'ai pas de diplôme</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
