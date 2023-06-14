@extends('front.templates.app')
@section('title', 'Modifier votre profil')
@section('content')
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center"
            data-background=  "{{ asset('assets/img/banner/img.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Modifier votre profil</h2>
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
                    <h2 class="contact-title">Modifier votre profil</h2>
                </div>
                <div class="col-lg-12">
                    @include('alert')
                    <form class="form" action="{{ route('user.update') }}" method="post">
                        @csrf
                        <div class="row">
                            {{-- <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
                                </div>
                            </div> --}}
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text"
                                        placeholder="Entrer votre nom" value="{{ $user->name }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input class="form-control" name="last_name" id="last_name" type="text"
                                        placeholder="Entrer votre post-nom" value="{{ $user->last_name }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input class="form-control" name="first_name" id="first_name" type="text"
                                        placeholder="Entrer votre prenom" value="{{ $user->first_name }}" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email"
                                        placeholder="Entrer votre adresse email" value="{{ $user->email }}" required>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <select class="form-select" name="sex" id="sex" required>
                                        <option value="M" @selected($user->sex == 'M')>Masculin</option>
                                        <option value="F" @selected($user->sex == 'F')>Feminin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" name="password" id="password" type="password"
                                        placeholder="Entrer votre mot de passe">
                                </div>
                            </div>

                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
