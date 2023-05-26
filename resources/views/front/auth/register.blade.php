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
                <div class="img" style="background-image: url( assets/auth/images/bg-human.jpg  );"></div>
                <div class="login-wrap p-4 p-md-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">S'enregistrer</h3>
                        </div>
                    </div>
                    @include('alert')
                    <form action="{{ route('register.post') }}" method="POST" class="signin-form">
                        @csrf
                        <input type="hidden" name="_target_path" value="{{ $_target_path }}">

                        <div class="form-group mt-3">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                            <label class="form-control-placeholder" for="name">Votre nom</label>
                            @error('name')
                                <div class="alert alert-danger text-center msg" id="error">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control" required>
                            <label class="form-control-placeholder" for="email">Email</label>
                            @error('email')
                                <div class="alert alert-danger text-center msg" id="error">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-field" name="password" type="password" class="form-control" required>
                            <label class="form-control-placeholder" for="password">Mot de passe</label>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @error('password')
                                <div class="alert alert-danger text-center msg" id="error">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-field" name="password_confirmation" type="password" class="form-control"
                                required>
                            <label class="form-control-placeholder" for="password_confirmation">Répéter le Mot de
                                passe</label>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
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
