<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="/"><img src="{{ asset('assets/img/logo/logo.png') }}" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="/">Accueil</a></li>
                                        <li><a href="{{ route('submitCv') }}">Trouver un emploi</a></li>
                                        <li><a href="#">À propos</a></li>
                                        @auth
                                            <li class="d-block d-lg-none"><a href="{{ route('applications') }}">Mes
                                                    candidatures</a></li>
                                            <li class="d-block d-lg-none"><a href="{{ route('logout') }}">Déconnexion</a>
                                            </li>
                                        @else
                                            <li class="d-block d-lg-none"><a href="{{ route('register') }}">S'inscrire</a>
                                            </li>
                                            <li class="d-block d-lg-none"><a href="{{ route('login') }}">Se connecter</a>
                                            </li>
                                        @endauth
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            <div class="header-btn d-none f-right d-lg-block">
                                @auth
                                    <a href="{{ route('applications') }}" class="btn head-btn1">Mes candidatures</a>
                                    <a href="{{ route('logout') }}" class="btn head-btn2">Déconnexion</a>
                                @else
                                    <a href="{{ route('register') }}" class="btn head-btn1">S'inscrire</a>
                                    <a href="{{ route('login') }}" class="btn head-btn2">Se connecter</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
