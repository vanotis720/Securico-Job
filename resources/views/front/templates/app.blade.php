<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', ' | securico job')</title>

    <base href="/">

    <meta name="description" content="Trouvez les emplois les plus excitants zvec securico job">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">

    @include('front.templates.styles')

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src=" assets/img/logo/logo-circle.png  " alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    @include('front.templates.header')
    <main>

        @yield('content')

    </main>
    @include('front.templates.footer')

    @include('front.templates.scripts')

</body>

</html>
