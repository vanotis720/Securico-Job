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
                                        <li><a href="job_listing.html">Trouver un emploi</a></li>
                                        <li><a href="about.html">À propos</a></li>
                                        {{-- <li><a href="#">Page</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Blog Details</a></li>
                                                <li><a href="elements.html">Elements</a></li>
                                                <li><a href="job_details.html">job Details</a></li>
                                            </ul>
                                        </li> --}}
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            <div class="header-btn d-none f-right d-lg-block">
                                @auth
                                    <a href="#" class="btn head-btn1">Mon profil</a>
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
