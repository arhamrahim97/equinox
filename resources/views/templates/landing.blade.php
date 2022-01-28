<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>SIMOU Ver. 2.0 | @yield('title-tab')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="ThemeZaa">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="description"
        content="Litho is a clean and modern design, BootStrap 5 responsive, business and portfolio multipurpose HTML5 template with 37+ ready homepage demos.">
    <!-- favicon icon -->
    <link rel="shortcut icon" href="{{asset('assets/logo')}}/untad.png">
    <!-- style sheets and font icons  -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/landing_page')}}/css/font-icons.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/landing_page')}}/css/theme-vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/landing_page')}}/css/style.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/landing_page')}}/css/responsive.css" />
    <!-- revolution slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/landing_page')}}/revolution/css/settings.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/landing_page')}}/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/landing_page')}}/revolution/css/navigation.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">

    <!-- Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

    @stack('style')

</head>

<body data-mobile-nav-style="classic">
    @include('components.landing.navBar')
    @yield('content')

    <!-- start footer -->
    <footer class="footer-furniture-shop footer-dark bg-extra-dark-gray position-relative overlap-gap-section-bottom">
        <div class="footer-bottom padding-40px-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="bg-transparent-white3 margin-40px-bottom w-100 h-1px"></div>
                    <div class="col-12 col-lg-6 text-center text-lg-start md-margin-20px-bottom">
                        <a href="index.html" class="footer-logo"><img
                                src="{{asset('assets/landing_page')}}/images/logo-simou-footer.png"
                                data-at2x="{{asset('assets/landing_page')}}/images/logo-simou-footer.png" alt=""></a>
                    </div>
                    <div
                        class="col-12 col-lg-6 col-md-6 text-center text-md-start text-lg-center last-paragraph-no-margin sm-margin-20px-bottom">
                        <p>&copy; 2021 Litho is Proudly Powered by <a href="https://www.themezaa.com/"
                                class="text-decoration-line-bottom" target="_blank">ThemeZaa</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- start scroll to top -->
    <a class="scroll-top-arrow" href="javascript:void(0);"><i class="feather icon-feather-arrow-up"></i></a>
    <!-- end scroll to top -->
    <!-- javascript -->
    <script type="text/javascript" src="{{asset('assets/landing_page')}}/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('assets/landing_page')}}/js/theme-vendors.min.js"></script>
    <script type="text/javascript" src="{{asset('assets/landing_page')}}/js/main.js"></script>

    <!-- revolution js files -->
    <script type="text/javascript" src="{{asset('assets/landing_page')}}/revolution/js/jquery.themepunch.tools.min.js">
    </script>
    <script type="text/javascript"
        src="{{asset('assets/landing_page')}}/revolution/js/jquery.themepunch.revolution.min.js"></script>

    <!-- slider revolution 5.0 extensions (load extensions only on local file systems ! the following part can be removed on server for on demand loading) -->
    <script type="text/javascript"
        src="{{asset('assets/landing_page')}}/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript"
        src="{{asset('assets/landing_page')}}/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript"
        src="{{asset('assets/landing_page')}}/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript"
        src="{{asset('assets/landing_page')}}/revolution/js/extensions/revolution.extension.layeranimation.min.js">
    </script>
    <script type="text/javascript"
        src="{{asset('assets/landing_page')}}/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript"
        src="{{asset('assets/landing_page')}}/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript"
        src="{{asset('assets/landing_page')}}/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript"
        src="{{asset('assets/landing_page')}}/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript"
        src="{{asset('assets/landing_page')}}/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.0.1/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.1/js/dataTables.fixedHeader.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>


    <script type="text/javascript">
        var revapi263,
                    tpj;
            (function () {
                if (!/loaded|interactive|complete/.test(document.readyState))
                    document.addEventListener("DOMContentLoaded", onLoad);
                else
                    onLoad();
                function onLoad() {
                    if (tpj === undefined) {
                        tpj = jQuery;
                        if ("off" == "on")
                            tpj.noConflict();
                    }
                    if (tpj("#rev_slider_34_1").revolution == undefined) {
                        revslider_showDoubleJqueryError("#rev_slider_34_1");
                    } else {
                        var revOffset = tpj(window).width() <= 991 ? '73px' : '';
                        revapi263 = tpj("#rev_slider_34_1").show().revolution({
                            sliderType: "standard",
                            jsFileLocation: "{{asset('assets/landing_page')}}/revolution/js/",
                            sliderLayout: "fullscreen",
                            dottedOverlay: "none",
                            delay: 9000,
                            navigation: {
                                keyboardNavigation: "on",
                                keyboard_direction: "horizontal",
                                mouseScrollNavigation: "off",
                                mouseScrollReverse: "default",
                                onHoverStop: "off",
                                touch: {
                                    touchenabled: "on",
                                    touchOnDesktop: "off",
                                    swipe_threshold: 75,
                                    swipe_min_touches: 1,
                                    swipe_direction: "horizontal",
                                    drag_block_vertical: false
                                },
                                bullets: {
                                    enable: true,
                                    hide_onmobile: false,
                                    style: "hermes",
                                    hide_onleave: false,
                                    direction: "horizontal",
                                    h_align: "center",
                                    v_align: "bottom",
                                    h_offset: 0,
                                    v_offset: 40,
                                    space: 12,
                                    tmp: ''
                                },
                                arrows: {

                                    enable: true,
                                    style: 'uranus',
                                    tmp: '',
                                    rtl: false,
                                    hide_onleave: false,
                                    hide_onmobile: true,
                                    hide_under: 767,
                                    hide_over: 9999,
                                    hide_delay: 200,
                                    hide_delay_mobile: 1200,
                                    left: {
                                        container: 'slider',
                                        h_align: 'left',
                                        v_align: 'center',
                                        h_offset: 64,
                                        v_offset: 0
                                    },
                                    right: {
                                        container: 'slider',
                                        h_align: 'right',
                                        v_align: 'center',
                                        h_offset: 64,
                                        v_offset: 0
                                    }

                                }
                            },
                            responsiveLevels: [1240, 1025, 778, 480],
                            visibilityLevels: [1240, 1024, 778, 480],
                            gridwidth: [1240, 1024, 778, 480],
                            gridheight: [868, 768, 960, 720],
                            lazyType: "none",
                            shadow: 0,
                            spinner: "spinner0",
                            stopLoop: "on",
                            stopAfterLoops: 0,
                            stopAtSlide: 1,
                            shuffle: "off",
                            autoHeight: "off",
                            fullScreenAutoWidth: "off",
                            fullScreenAlignForce: "off",
                            fullScreenOffsetContainer: "",
                            fullScreenOffset: revOffset,
                            disableProgressBar: "on",
                            hideThumbsOnMobile: "off",
                            hideSliderAtLimit: 0,
                            hideCaptionAtLimit: 0,
                            hideAllCaptionAtLilmit: 0,
                            debugMode: false,
                            fallbacks: {
                                simplifyAll: "off",
                                nextSlideOnWindowFocus: "off",
                                disableFocusListener: false,
                            }
                        });
                    }
                    ; /* END OF revapi call */
                }
                ; /* END OF ON LOAD FUNCTION */
            }());/* END OF WRAPPING FUNCTION */
    </script>

    @stack('script')
</body>

</html>
