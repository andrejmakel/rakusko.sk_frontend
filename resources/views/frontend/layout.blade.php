<!DOCTYPE html>
<html lang="{{ trans('frontend.langShortcut') }}">
<head>
    {!! SEO::generate() !!}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if (Cookie::get('laravel_cookie_consent'))
        {{--  Google tag (gtag.js)  --}}
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('panel.measurement_ID') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ config('panel.measurement_ID') }}');
        </script>
        {{-- Hotjar Tracking Code for https://www.rakusko.sk --}}
        <script>
            (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:3926284,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
        </script>
    @endif
    {{-- Styles --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css">
    <link href="{{ asset('css/scpop.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
    @include('cookie-consent::index')
    <header>
        <nav class="menuBar navbar navbar-expand-md sticky-top bg-white  navbar-light shadow-sm rounded">
            <div class="container">
                <a class="navbar-brand d-sm-none w-75" href="/">
                    <img src={{ asset('img/' . trans('frontend.menuLogo')) }} alt="{{trans('frontend.footerText')}}" class="w-75">
                </a>
                <a class="navbar-brand d-none d-sm-block" href="/">
                    <img src={{ asset('img/' . trans('frontend.menuLogo')) }} alt="{{trans('frontend.footerText')}}" class="w-75">
                </a>
                <button class="navbar-toggler shadow-sm" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navigaciaID" aria-controls="navigaciaID" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse pt-1" id="navigaciaID">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link text-black me-4" aria-current="page" href="/shopping"><strong
                                    class="redHover">{{ trans('frontend.shopping') }}</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black pe-4" href="/places"><strong
                                    class="redHover">{{ trans('frontend.places') }}</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black pe-4" href="/activity"><strong
                                    class="redHover">{{ trans('frontend.activity') }}</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="/info"><strong
                                    class="redHover">{{ trans('frontend.info') }}</strong></a>
                        </li>
                    </ul>
                    @if (config('panel.change_lang'))
                        <div class="dropdown me-5">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Sprache
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @foreach (config('panel.available_languages') as $langLocale => $langName)
                                    <li><a class="dropdown-item"
                                            href="{{ url()->current() }}?change_language={{ $langLocale }}">
                                            {{ strtoupper($langLocale) }} ({{ $langName }})</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="search pb-3 pb-md-0">
                        <input placeholder="{{ trans('frontend.search') }}" required=""
                            class="input rounded-pill shadow" name="text" type="text">
                        <div class="icon">
                            <svg viewBox="0 0 512 512" class="ionicon" xmlns="http://www.w3.org/2000/svg">
                                <title>Search</title>
                                <path stroke-width="32" stroke-miterlimit="10" stroke="currentColor" fill="none"
                                    d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"></path>
                                <path d="M338.29 338.29L448 448" stroke-width="32" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke="currentColor" fill="none"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="d-flex flex-column min-vh-100">
        @yield('content')
    </main>
    <footer>
        <div class="text-center p-3" style="background-color:rgb(0,4,36); color:rgb(227, 227, 227); margin-top:auto;">
            <div class="container">
                <div>
                    <p class="mb-0 text-center text-muted py-3 py-md-1">Copyright ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> {{ trans('frontend.footerText') }}
                    </p>
                </div>
            </div>
        </div>
    </footer>
    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scpop.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('scripts')
</body>
</html>
