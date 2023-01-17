<!-- start header -->
<header>
    <!-- start navigation -->
    <nav
        class="navbar navbar-expand-lg navbar-boxed navbar-light bg-transparent header-light fixed-top header-reverse-scroll">
        <div class="container-fluid nav-header-container">
            <div class="col-auto col-sm-6 col-lg-2 me-auto ps-lg-0">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('assets/landing_page') }}/images/logo-simou.png"
                        data-at2x="{{ asset('assets/landing_page') }}/images/logo-simou.png" alt=""
                        class="default-logo">
                    <img src="{{ asset('assets/landing_page') }}/images/logo-simou.png"
                        data-at2x="{{ asset('assets/landing_page') }}/images/logo-simou.png" alt=""
                        class="alt-logo">
                    <img src="{{ asset('assets/landing_page') }}/images/logo-simou.png"
                        data-at2x="{{ asset('assets/landing_page') }}/images/logo-simou.png" class="mobile-logo"
                        alt="">
                </a>
            </div>
            <div class="col-auto menu-order px-lg-0">
                <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav alt-font">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link">{{ __('pages/landing/landing.title') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/daftarMou') }}"
                                class="nav-link">{{ __('pages/landing/landing.mou') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/daftarMoa') }}"
                                class="nav-link">{{ __('pages/landing/landing.moa') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/daftarIa') }}" class="nav-link">{{ __('pages/landing/landing.ia') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/daftarBerita') }}"
                                class="nav-link">{{ __('pages/landing/landing.berita') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/tentang') }}"
                                class="nav-link">{{ __('pages/landing/landing.tentang') }}</a>
                        </li>
                        <li class="nav-item dropdown simple-dropdown">
                            <a href="#" class="nav-link">{{ __('pages/landing/landing.unduh_template') }}</a>
                            <i class="fa fa-angle-down dropdown-toggle" data-bs-toggle="dropdown"
                                aria-hidden="true"></i>
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown"><a
                                        href="{{ asset('assets/documents') }}/Draft_Kesepahaman_Bersama_MoU.pdf"
                                        target="_blank"><i class="far fa-file"></i><span class="mx-2">
                                            {{ __('pages/landing/landing.mou') }}</span>
                                    </a></li>
                                <li class="dropdown"><a
                                        href="{{ asset('assets/documents') }}/Draft_Perjanjian_Kerja_Sama_MoA.pdf"
                                        target="_blank"><i class="far fa-file"></i>
                                        <span class="mx-2">{{ __('pages/landing/landing.moa') }}</span></a>
                                </li>
                                <li class="dropdown"><a
                                        href="{{ asset('assets/documents') }}/Draft_Kontrak_Implementasi_Kerja_Sama_IA.pdf"
                                        target="_blank"><i class="far fa-file"></i>
                                        <span class="mx-2">{{ __('pages/landing/landing.ia') }}</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('assets/file/Panduan.pdf') }}"
                                class="nav-link">{{ __('pages/landing/landing.panduan') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Auth::user())
                                <a href="{{ url('/dashboard') }}"
                                    class="nav-link">{{ __('pages/landing/landing.dashboard') }}</a>
                            @else
                                <a href="{{ url('/login') }}"
                                    class="nav-link">{{ __('pages/landing/landing.masuk') }}</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-auto text-end pe-0 font-size-0">
                <div class="header-language dropdown d-lg-inline-block">
                    <a href="javascript:void(0);"><i class="feather icon-feather-globe"></i></a>
                    <ul class="dropdown-menu alt-font">
                        <li><a href="/lang/id" title="Indonesia"><span class="icon-country"><img
                                        src="{{ asset('assets/landing_page') }}/images/country-flag-16X16/Indonesia.png"
                                        alt=""></span>Indonesia</a>
                        </li>
                        <li><a href="/lang/en" title="English"><span class="icon-country"><img
                                        src="{{ asset('assets/landing_page') }}/images/country-flag-16X16/usa.png"
                                        alt=""></span>English</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- end header -->
