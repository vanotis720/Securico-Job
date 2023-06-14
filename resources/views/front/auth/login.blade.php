@extends('front.templates.auth')
@section('title', 'Se connecter | authentification')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Securico Job</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
            <div class="wrap">
                <div class="img" style="background-image: url('{{ asset("assets/auth/images/bg-human.jpg")}}');"></div>
                <div class="login-wrap p-4 p-md-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">S'identifier</h3>
                        </div>
                    </div>
                    @include('alert')
                    <form action="{{ route('login.post') }}" method="POST" class="signin-form">
                        @csrf
                        <div class="form-group mt-3">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                            <label class="form-control-placeholder" for="email">Email</label>
                        </div>
                        <div class="form-group">
                            <input id="password-field" name="password" type="password" class="form-control" required>
                            <label class="form-control-placeholder" for="password">Mot de passe</label>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit"
                                class="form-control btn btn-primary rounded submit px-3">S'identifier</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50 text-left">
                                <label class="checkbox-wrap checkbox-primary mb-0">Rappelez-vous de moi
                                    <input type="checkbox" name="_remember_me" checked>
                                    <span class="checkmark"></span>
                                </label>
                                {{-- </div>
                            <div class="w-50 text-md-right">
                                <a href="#">Forgot Password</a>
                            </div> --}}
                            </div>
                    </form>
                    <p class="text-center">Vous n'êtes pas membre ? <a href="{{ route('register') }}">Inscrivez-vous</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
