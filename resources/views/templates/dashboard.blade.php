<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SIMOU @yield('title-tab')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{asset('assets/dashboard')}}/img/icon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/4.1.5/css/flag-icons.css"
        integrity="sha512-Sq1qdqbXHnQ3rmftdNCVwU83vZtDzIWc0HVPj6D358xGpXAiFL0/U3KS9KE3bQdxL4Ndk4GEdIsBGOwvqWmikw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts and icons -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{asset('assets/dashboard')}}/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/dashboard')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/dashboard')}}/css/atlantis2.css">
    <style>
        .btn{
            color: white !important
        }
    </style>
    @stack('style')

</head>

<body>
    <div class="wrapper horizontal-layout-2">

        <div class="main-header" data-background-color="light-blue2">
            @include('components.navTop')
            @include('components.navBottom')
        </div>

        <div class="main-panel" style="max-width: 1700px !important">
            <div class="container" style="max-width: 1700px !important">
                <div class="page-inner">
                    <div class="page-header" >
                        <h4 class="page-title">@yield('title')</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="/">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a>@yield('subTitle')</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a>@yield('title')</a>
                            </li>
                        </ul>
                    </div>
                    <div class="page-category">@yield('content')</div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <nav class="pull-left">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="http://www.themekita.com">
                                ThemeKita
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Help
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright ml-auto">
                    2018, made with <i class="fa fa-heart heart text-danger"></i> by <a
                        href="http://www.themekita.com">ThemeKita</a>
                </div>
            </div>
        </footer>
    </div>
    <!--   Core JS Files   -->
    <script src="{{asset('assets/dashboard')}}/js/core/jquery.3.2.1.min.js"></script>
    <script src="{{asset('assets/dashboard')}}/js/core/popper.min.js"></script>
    <script src="{{asset('assets/dashboard')}}/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="{{asset('assets/dashboard')}}/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Moment JS -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/moment/moment.min.js"></script>

    <!-- Chart JS -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- Bootstrap Toggle -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{asset('assets/dashboard')}}/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

    <!-- Google Maps Plugin -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/gmaps/gmaps.js"></script>

    <!-- Dropzone -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/dropzone/dropzone.min.js"></script>

    <!-- Fullcalendar -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/fullcalendar/fullcalendar.min.js"></script>

    <!-- DateTimePicker -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

    <!-- Bootstrap Tagsinput -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

    <!-- Bootstrap Wizard -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/bootstrap-wizard/bootstrapwizard.js"></script>

    <!-- jQuery Validation -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/jquery.validate/jquery.validate.min.js"></script>

    <!-- jQuery Mask -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/jquery.mask/jquery.mask.min.js"></script>

    <!-- Summernote -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/summernote/summernote-bs4.min.js"></script>

    <!-- Select2 -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/select2/select2.full.min.js"></script>

    <!-- Sweet Alert -->
    <script src="{{asset('assets/dashboard')}}/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Atlantis JS -->
    <script src="{{asset('assets/dashboard')}}/js/atlantis2.min.js"></script>

    <script>
        $('.select2').select2({
            theme: "bootstrap"
        })
    </script>
    @stack('script')
</body>

</html>
