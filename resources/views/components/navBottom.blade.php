<div class="nav-bottom">
    <div class="container" style="max-width: 1700px !important">
        <h3 class="title-menu d-flex d-lg-none">
            Menu
            <div class="close-menu"> <i class="flaticon-cross"></i></div>
        </h3>
        <ul class="nav page-navigation page-navigation-info bg-white">

            <li class="nav-item menu">
                <a class="nav-link" href="#">
                    <i class="link-icon icon-screen-desktop"></i>
                    <span class="menu-title">{{__('components/navBottom.beranda')}}</span>
                </a>
            </li>
            <li class="nav-item submenu" id="nav-mou">
                <a class="nav-link" href="#">
                    <i class="link-icon icon-docs"></i>
                    <span class="menu-title">{{__('components/navBottom.mou')}}</span>
                </a>
                <div class="navbar-dropdown animated fadeIn">
                    <ul>
                        <li>
                            <a href="{{url('mou')}}">{{__('components/navBottom.mou')}}</a>
                        </li>
                        <li>
                            <a href="{{url('mapMou')}}">{{__('components/navBottom.petaMou')}}</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item submenu" id="nav-moa">
                <a class="nav-link" href="#">
                    <i class="link-icon icon-docs"></i>
                    <span class="menu-title">{{__('components/navBottom.moa')}}</span>
                </a>
                <div class="navbar-dropdown animated fadeIn">
                    <ul>
                        <li>
                            <a href="{{url('moa')}}">{{__('components/navBottom.moa')}}</a>
                        </li>
                        <li>
                            <a href="{{url('mapMoa')}}">{{__('components/navBottom.petaMoa')}}</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item submenu" id="nav-ia">
                <a class="nav-link" href="#">
                    <i class="link-icon icon-docs"></i>
                    <span class="menu-title">{{__('components/navBottom.ia')}}</span>
                </a>
                <div class="navbar-dropdown animated fadeIn">
                    <ul>
                        <li>
                            <a href="{{url('ia')}}">{{__('components/navBottom.ia')}}</a>
                        </li>
                        <li>
                            <a href="{{url('mapIa')}}">{{__('components/navBottom.petaIa')}}</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item submenu" id="nav-berita">
                <a class="nav-link" href="#">
                    <i class="link-icon icon-book-open"></i>
                    <span class="menu-title">{{__('components/navBottom.berita')}}</span>
                </a>
                <div class="navbar-dropdown animated fadeIn">
                    <ul>
                        <li>
                            <a href="{{url('kelolaBerita')}}">{{__('components/navBottom.berita')}}</a>
                        </li>
                        <li>
                            <a href="{{url('kategoriBerita')}}">{{__('components/navBottom.kategoriBerita')}}</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item submenu" id="nav-master">
                <a class="nav-link" href="#">
                    <i class="link-icon icon-grid"></i>
                    <span class="menu-title">Master</span>
                </a>
                <div class="navbar-dropdown animated fadeIn">
                    <ul>
                        <li>
                            <a href="{{url('negara')}}">{{__('components/navBottom.negara')}}</a>
                        </li>
                        <li>
                            <a href="{{url('fakultas')}}">{{__('components/navBottom.fakultas')}}</a>
                        </li>
                        <li>
                            <a href="{{url('akun')}}">{{__('components/navBottom.akun')}}</a>
                        </li>
                        <li>
                            <a href="{{url('pengusul')}}">{{__('components/navBottom.pengusul')}}</a>
                        </li>
                    </ul>
                </div>

            </li>

        </ul>
    </div>
</div>
