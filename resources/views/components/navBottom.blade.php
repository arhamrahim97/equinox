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
            {{-- @if (Auth::user()->role == 'Admin') --}}
                <li class="nav-item menu">
                    <a class="nav-link" href="/mou">
                        <i class="link-icon icon-docs"></i>
                        <span class="menu-title">MOU</span>
                    </a>              
                </li>
            {{-- @endif             --}}
            {{-- @if (in_array(Auth::user()->role, array('Admin', 'Fakultas'))) --}}
                <li class="nav-item menu">
                    <a class="nav-link" href="/moa">
                        <i class="link-icon icon-docs"></i>
                        <span class="menu-title">MOA</span>
                    </a>                  
                </li>
            {{-- @endif             --}}
            {{-- @if (in_array(Auth::user()->role, array('Admin', 'Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM', 'Prodi', 'Unit Kerja'))) --}}
                <li class="nav-item menu">
                    <a class="nav-link" href="/ia">
                        <i class="link-icon icon-docs"></i>
                        <span class="menu-title">IA</span>
                    </a>               
                </li>
            {{-- @endif --}}

            @if (Auth::user()->role == 'Admin')
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
                                <a href="projects.html">Pengusul</a>
                            </li>

                        </ul>
                    </div>
                </li>                
            @endif

        </ul>
    </div>
</div>
