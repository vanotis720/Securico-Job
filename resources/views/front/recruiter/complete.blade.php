@extends('front.templates.app')
@section('title', 'Compléter votre profil')
@section('content')
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center"
            data-background="assets/img/banner/img.png">
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
                    <form class="form" action="{{ route('recruiter.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="enterprise">Nom entreprise @include('required')</label>
                                    <input type="text" class="form-control" name="enterprise" id="enterprise" 
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre entreprise'"
                                        placeholder="Votre entreprise">
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="logo">Logo de votre entreprise</label>
                                    <input type="file" class="form-control" name="logo" id="logo"
                                        placeholder="Votre entreprise">
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
