@extends('front.templates.auth')
@section('title', 'Inscription | authentification')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Securico Job</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
            <div class="wrap">
                {{-- <div class="img" style="background-image: url('assets/auth/images/bg-human.jpg');"></div> --}}
                <div class="login-wrap p-4 p-md-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">S'enregistrer</h3>
                        </div>
                    </div>
                    @include('alert')
                    <form action="{{ route('register.post') }}" method="POST" class="signin-form">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="name">
                                Votre nom @include('required')
                            </label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                            @error('name')
                                <div class="alert alert-danger text-center msg" id="error">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="last_name"> Votre Post-nom </label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control">
                            @error('last_name')
                                <div class="alert alert-danger text-center msg" id="error">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="first_name">Votre Prenom @include('required') </label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control"
                                required>
                            @error('first_name')
                                <div class="alert alert-danger text-center msg" id="error">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="sex">Genre @include('required')</label>
                            <select class="form-control" name="sex" id="sex" required>
                                <option value="M">Masculin</option>
                                <option value="F">Feminin</option>
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label for="type">Je suis @include('required')</label>
                            <select class="form-control" name="type" id="type" required>
                                <option value="Candidate">En recherche d'emploi</option>
                                <option value="Recruiter">Un Recruteur</option>
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label for="email">Email @include('required')</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                            @error('email')
                                <div class="alert alert-danger text-center msg" id="error">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="phone">Numéro de téléphone @include('required')</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control" required>
                            @error('phone')
                                <div class="alert alert-danger text-center msg" id="error">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe @include('required')</label>
                            <input id="password-field" name="password" type="password" class="form-control" required>
                            <br>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @error('password')
                                <div class="alert alert-danger text-center msg" id="error">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="password_confirmation">Répéter le Mot de
                                passe @include('required')</label>
                            <input id="password-field" name="password_confirmation" type="password" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Je
                                m'inscris</button>
                        </div>
                    </form>
                    <p class="text-center">Vous êtes déjà membre ? <a href="{{ route('login') }}">Identifiez-vous</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
