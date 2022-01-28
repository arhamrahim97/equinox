@extends('templates/landing')

@section('title-tab')
{{__('pages/landing/landing.title')}}
@endsection

@push('style')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<style>
    #peta {
        height: 450px;
    }

    .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        min-width: 100vw;
        background-color: #ffffff;
    }

    .card-loading {
        display: flex;
        padding: 24px;
        min-height: 300px;
        min-width: 400px;
        background-color: transparent;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .loader {
        border-radius: 50%;
        position: relative;
        margin: 50px;
        display: inline-block;
        height: 0px;
        width: 0px;
    }

    .loader span {
        position: absolute;
        display: block;
        background: #ddd;
        height: 20px;
        width: 20px;
        border-radius: 50%;
        top: -20px;
        perspective: 100000px;
    }

    .loader span:nth-child(1) {
        left: 60px;
        animation: bounce2 1s cubic-bezier(0.04, 0.35, 0, 1) infinite;
        animation-delay: 0s;
        background: #ff756f;
    }

    .loader span:nth-child(2) {
        left: 20px;
        animation: bounce2 1s cubic-bezier(0.04, 0.35, 0, 1) infinite;
        animation-delay: .2s;
        background: #ffde6f;
    }

    .loader span:nth-child(3) {
        left: -20px;
        animation: bounce2 1s cubic-bezier(0.04, 0.35, 0, 1) infinite;
        animation-delay: .4s;
        background: #01de6f;
    }

    .loader span:nth-child(4) {
        left: -60px;
        animation: bounce2 1s cubic-bezier(0.04, 0.35, 0, 1) infinite;
        animation-delay: .6s;
        background: #6f75ff;
    }

    .leaflet-popup-content p {
        font-size: 12px;
    }

    .leaflet-popup-content span {
        font-size: 11px;
    }

    .leaflet-popup-content a {
        font-size: 11px;
        padding: 5px 10px !important;
    }

    .leaflet-popup-content .title {
        font-size: 13px !important;
    }

    .leaflet-popup-content hr {
        margin-top: 9px;
        margin-bottom: 9px;
    }

    @keyframes bounce2 {

        0%,
        75%,
        100% {
            transform: translateY(0px);
        }

        25% {
            transform: translateY(-30px);
        }
    }

    @media only screen and (max-width: 600px) {
        .tp-caption {
            text-align: center !important;
        }
    }

    .legend {
        padding: 5px 20px;
        font: 14px, Arial, Helvetica, sans-serif;
        font-family: 'Poppins';
        background: white;
        background: rgba(255, 255, 255);
        /*box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);*/
        /*border-radius: 5px;*/
        line-height: 24px;
        color: #555;
    }

    .legend h4 {
        text-align: center;
        font-weight: bold;
        font-size: 16px;
        margin: 15px 3px;
        padding: 0px;
        color: #777;
        line-height: 0px;
    }

    .legend span {
        position: relative;
        bottom: 3px;
    }

    .legend i {
        width: 18px;
        height: 18px;
        float: left;
        margin: 0 8px 0 0;
        opacity: 0.7;
    }

    .legend i.icon {
        background-size: 18px;
        background-color: rgba(255, 255, 255, 1);
    }

    .legend hr {
        margin: 8px 0px;
    }

    .leaflet-bottom .leaflet-control {
        margin-bottom: 0px;
    }

    .legend img {
        margin-right: 10px !important;
    }
</style>
@endpush

@section('content')
<!-- SLIDER EXAMPLE -->
<section class="p-0 home-furniture-shop">
    <article class="content">
        <div id="rev_slider_34_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="mask-showcase"
            data-source="gallery" style="background:#ffffff;padding:0px;">
            <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
            <div id="rev_slider_34_1" class="rev_slider fullscreenbanner tiny_bullet_slider" style="display:none;"
                data-version="5.4.1">
                <ul>
                    <!-- SLIDE  -->
                    <li data-index="rs-73" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                        data-thumb="http://works.themepunch.com/revolution_5_3/wp-content/" data-rotate="0"
                        data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3=""
                        data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                        data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('assets/landing_page')}}/images/shop-slide-01.jpg" alt=""
                            data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                            data-bgparallax="off" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme rs-parallaxlevel-10"
                            data-x="['center','center','center','center']" data-hoffset="['980','800','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['200','220','900','850']"
                            data-width="1500" data-height="1500" data-whitespace="nowrap" data-type="shape"
                            data-responsive_offset="on"
                            data-frames='[{"delay":300,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 5;background:linear-gradient(180deg, rgb(255, 124, 124) 0%, rgb(255, 234, 113) 100%);border-radius:100%;">
                            <div class="rs-looped rs-wave" data-speed="10" data-angle="0" data-radius="10px"
                                data-origin="50% 50%"> </div>
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption tp-resizeme alt-font text-extra-dark-gray font-weight-500 md:text-center"
                            data-x="['left','left','center','center']" data-hoffset="['0','102','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['-185','-120','-410','-300']"
                            data-width="none" data-height="none" data-whitespace="nowrap" data-type="text"
                            data-responsive_offset="on"
                            data-frames='[{"delay":600,"speed":1000,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:[-100%];y:0px;s:inherit;e:inherit;","to":"o:0.7;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]"
                            data-paddingright="[20,20,20,20]" data-paddingbottom="[10,10,10,10]"
                            data-paddingleft="[20,20,20,20]"
                            style="z-index: 7; text-transform: uppercase; letter-spacing: 2px;">
                            {!!__('pages/landing/landing.aplikasi')!!}</div>

                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption alt-font text-extra-dark-gray" data-x="['left','left','center','center']"
                            data-hoffset="['0','100','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['-40','-10','-290','-220']" data-fontsize="['100','70','70','50']"
                            data-lineheight="['90','70','70','50']" data-width="auto" data-height="none"
                            data-whitespace="nowrap" data-type="text" data-responsive="on" data-responsive_offset="on"
                            data-frames='[{"delay":900,"speed":1000,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:[-100%];y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['left','left','center','center']" data-paddingtop="[20,20,20,20]"
                            data-paddingright="[20,20,20,20]" data-paddingbottom="[30,30,30,30]"
                            data-paddingleft="[20,20,20,20]" style="z-index: 8;letter-spacing: -3px;">
                            <strong>SIMOU <span style="font-size: 20px;letter-spacing:-1px;">Ver. 2.0</span> </strong>
                        </div>

                        <!-- LAYER NR. 1 -->
                        @if (!Auth::user())
                        <a class="tp-caption tp-resizeme btn btn-medium btn-white btn-box-shadow lg-margin-15px-bottom md-no-margin-bottom md-margin-auto-lr fw-bold"
                            href="{{url('/login')}}" data-x="['left','left','center','center']"
                            data-hoffset="['24','122','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['115','120','-160','-110']" data-width="none" data-height="none"
                            data-fontsize="['14','14','14','13']" data-whitespace="nowrap" data-type="button"
                            data-responsive_offset="on" data-responsive="on"
                            data-frames='[{"delay":1200,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[11,10,10,10]"
                            data-paddingright="[27,25,25,22]" data-paddingbottom="[11,10,10,10]"
                            data-paddingleft="[27,25,25,22]"
                            style="z-index: 6;box-shadow: 0 0 15px rgba(0,0,0,.2);">{{__('pages/landing/landing.masuk')}}</a>
                        @else
                        <a class="tp-caption tp-resizeme btn btn-medium btn-white btn-box-shadow lg-margin-15px-bottom md-no-margin-bottom md-margin-auto-lr fw-bold"
                            href="{{url('/dashboard')}}" data-x="['left','left','center','center']"
                            data-hoffset="['24','122','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['115','120','-160','-110']" data-width="none" data-height="none"
                            data-fontsize="['14','14','14','13']" data-whitespace="nowrap" data-type="button"
                            data-responsive_offset="on" data-responsive="on"
                            data-frames='[{"delay":1200,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[11,10,10,10]"
                            data-paddingright="[27,25,25,22]" data-paddingbottom="[11,10,10,10]"
                            data-paddingleft="[27,25,25,22]"
                            style="z-index: 6;box-shadow: 0 0 15px rgba(0,0,0,.2);">{{__('pages/landing/landing.dashboard')}}</a>
                        @endif


                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme rs-parallaxlevel-10"
                            data-x="['center','center','center','center']" data-hoffset="['300','190','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','20','150','150']"
                            data-width="['670','600','540','430']" data-height="['670','600','540','430']"
                            data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
                            data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 5;background: rgba(173,157,148,0.1);border-radius:100%;">
                            <div class="rs-looped rs-wave" data-speed="10" data-angle="0" data-radius="10px"
                                data-origin="50% 50%"> </div>
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption tp-resizeme rs-parallaxlevel-2"
                            data-x="['center','center','center','center']" data-hoffset="['300','200','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['-20','20','180','150']"
                            data-width="none" data-height="none" data-whitespace="nowrap" data-type="image"
                            data-responsive_offset="on"
                            data-frames='[{"delay":1800,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 6;"><img src="{{asset('storage/upload/slider/' . $slider[0]->foto)}}" alt=""
                                data-ww="['800px','420px','420px','290px']" data-hh="['auto','auto','auto','auto']"
                                width="1000" height="1000" data-no-retina></div>

                    </li>

                    <li data-index="rs-74" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                        data-thumb="http://works.themepunch.com/revolution_5_3/wp-content/" data-rotate="0"
                        data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3=""
                        data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                        data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('assets/landing_page')}}/images/shop-slide-01.jpg" alt=""
                            data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                            data-bgparallax="off" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme rs-parallaxlevel-10"
                            data-x="['center','center','center','center']" data-hoffset="['980','800','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['200','220','900','850']"
                            data-width="1500" data-height="1500" data-whitespace="nowrap" data-type="shape"
                            data-responsive_offset="on"
                            data-frames='[{"delay":300,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 5;background:linear-gradient(180deg, rgb(117, 234, 255) 0%, rgb(15, 43, 255) 100%);border-radius:100%;">
                            <div class="rs-looped rs-wave" data-speed="10" data-angle="0" data-radius="10px"
                                data-origin="50% 50%"> </div>
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption tp-resizeme alt-font text-extra-dark-gray font-weight-500"
                            data-x="['left','left','center','center']" data-hoffset="['0','102','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['-185','-120','-410','-300']"
                            data-width="none" data-height="none" data-whitespace="nowrap" data-type="text"
                            data-responsive_offset="on"
                            data-frames='[{"delay":600,"speed":1000,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:[-100%];y:0px;s:inherit;e:inherit;","to":"o:0.7;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]"
                            data-paddingright="[20,20,20,20]" data-paddingbottom="[10,10,10,10]"
                            data-paddingleft="[20,20,20,20]"
                            style="z-index: 7; text-transform: uppercase; letter-spacing: 2px;">Memorandum Of
                            Understanding</div>

                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption alt-font text-extra-dark-gray" data-x="['left','left','center','center']"
                            data-hoffset="['0','100','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['-40','-10','-290','-220']" data-fontsize="['100','70','70','50']"
                            data-lineheight="['90','70','70','50']" data-width="auto" data-height="none"
                            data-whitespace="nowrap" data-type="text" data-responsive="on" data-responsive_offset="on"
                            data-frames='[{"delay":900,"speed":1000,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:[-100%];y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['left','left','center','center']" data-paddingtop="[20,20,20,20]"
                            data-paddingright="[20,20,20,20]" data-paddingbottom="[30,30,30,30]"
                            data-paddingleft="[20,20,20,20]" style="z-index: 8;letter-spacing: -3px;">
                            <strong>MOU</strong>
                        </div>

                        <!-- LAYER NR. 1 -->
                        <a class="tp-caption tp-resizeme btn btn-medium btn-white btn-box-shadow lg-margin-15px-bottom md-no-margin-bottom md-margin-auto-lr fw-bold"
                            href="{{url('/daftarMou')}}" data-x="['left','left','center','center']"
                            data-hoffset="['24','122','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['115','120','-160','-110']" data-width="none" data-height="none"
                            data-fontsize="['14','14','14','13']" data-whitespace="nowrap" data-type="button"
                            data-responsive_offset="on" data-responsive="on"
                            data-frames='[{"delay":1200,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[11,10,10,10]"
                            data-paddingright="[27,25,25,22]" data-paddingbottom="[11,10,10,10]"
                            data-paddingleft="[27,25,25,22]"
                            style="z-index: 6;box-shadow: 0 0 15px rgba(0,0,0,.2);">{{__('pages/landing/landing.daftar_mou')}}</a>

                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme rs-parallaxlevel-10"
                            data-x="['center','center','center','center']" data-hoffset="['300','190','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','20','150','150']"
                            data-width="['670','600','540','430']" data-height="['670','600','540','430']"
                            data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
                            data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 5;background: rgba(173,157,148,0.1);border-radius:100%;">
                            <div class="rs-looped rs-wave" data-speed="10" data-angle="0" data-radius="10px"
                                data-origin="50% 50%"> </div>
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption tp-resizeme rs-parallaxlevel-2"
                            data-x="['center','center','center','center']" data-hoffset="['300','200','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['-20','20','180','150']"
                            data-width="none" data-height="none" data-whitespace="nowrap" data-type="image"
                            data-responsive_offset="on"
                            data-frames='[{"delay":1800,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 6;"><img src="{{asset('storage/upload/slider/' . $slider[1]->foto)}}" alt=""
                                data-ww="['800px','420px','420px','290px']" data-hh="['auto','auto','auto','auto']"
                                width="1000" height="1000" data-no-retina></div>

                    </li>

                    <li data-index="rs-75" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                        data-thumb="http://works.themepunch.com/revolution_5_3/wp-content/" data-rotate="0"
                        data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3=""
                        data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                        data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('assets/landing_page')}}/images/shop-slide-01.jpg" alt=""
                            data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                            data-bgparallax="off" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme rs-parallaxlevel-10"
                            data-x="['center','center','center','center']" data-hoffset="['980','800','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['200','220','900','850']"
                            data-width="1500" data-height="1500" data-whitespace="nowrap" data-type="shape"
                            data-responsive_offset="on"
                            data-frames='[{"delay":300,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 5;background:linear-gradient(180deg, rgb(255, 250, 174) 0%, rgb(255, 204, 0) 100%);border-radius:100%;">
                            <div class="rs-looped rs-wave" data-speed="10" data-angle="0" data-radius="10px"
                                data-origin="50% 50%"> </div>
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption tp-resizeme alt-font text-extra-dark-gray font-weight-500"
                            data-x="['left','left','center','center']" data-hoffset="['0','102','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['-185','-120','-410','-300']"
                            data-width="none" data-height="none" data-whitespace="nowrap" data-type="text"
                            data-responsive_offset="on"
                            data-frames='[{"delay":600,"speed":1000,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:[-100%];y:0px;s:inherit;e:inherit;","to":"o:0.7;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]"
                            data-paddingright="[20,20,20,20]" data-paddingbottom="[10,10,10,10]"
                            data-paddingleft="[20,20,20,20]"
                            style="z-index: 7; text-transform: uppercase; letter-spacing: 2px;">Memorandum of Agreement
                        </div>

                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption alt-font text-extra-dark-gray" data-x="['left','left','center','center']"
                            data-hoffset="['0','100','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['-40','-10','-290','-220']" data-fontsize="['100','70','70','50']"
                            data-lineheight="['90','70','70','50']" data-width="auto" data-height="none"
                            data-whitespace="nowrap" data-type="text" data-responsive="on" data-responsive_offset="on"
                            data-frames='[{"delay":900,"speed":1000,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:[-100%];y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['left','left','center','center']" data-paddingtop="[20,20,20,20]"
                            data-paddingright="[20,20,20,20]" data-paddingbottom="[30,30,30,30]"
                            data-paddingleft="[20,20,20,20]" style="z-index: 8;letter-spacing: -3px;">
                            <strong>MOA</strong>
                        </div>

                        <!-- LAYER NR. 1 -->
                        <a class="tp-caption tp-resizeme btn btn-medium btn-white btn-box-shadow lg-margin-15px-bottom md-no-margin-bottom md-margin-auto-lr fw-bold"
                            href="{{url('/daftarMoa')}}" data-x="['left','left','center','center']"
                            data-hoffset="['24','122','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['115','120','-160','-110']" data-width="none" data-height="none"
                            data-fontsize="['14','14','14','13']" data-whitespace="nowrap" data-type="button"
                            data-responsive_offset="on" data-responsive="on"
                            data-frames='[{"delay":1200,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[11,10,10,10]"
                            data-paddingright="[27,25,25,22]" data-paddingbottom="[11,10,10,10]"
                            data-paddingleft="[27,25,25,22]"
                            style="z-index: 6;box-shadow: 0 0 15px rgba(0,0,0,.2);">{{__('pages/landing/landing.daftar_moa')}}</a>

                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme rs-parallaxlevel-10"
                            data-x="['center','center','center','center']" data-hoffset="['300','190','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','20','150','150']"
                            data-width="['670','600','540','430']" data-height="['670','600','540','430']"
                            data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
                            data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 5;background: rgba(173,157,148,0.1);border-radius:100%;">
                            <div class="rs-looped rs-wave" data-speed="10" data-angle="0" data-radius="10px"
                                data-origin="50% 50%"> </div>
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption tp-resizeme rs-parallaxlevel-2"
                            data-x="['center','center','center','center']" data-hoffset="['300','200','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['-20','20','180','150']"
                            data-width="none" data-height="none" data-whitespace="nowrap" data-type="image"
                            data-responsive_offset="on"
                            data-frames='[{"delay":1800,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 6;"><img src="{{asset('storage/upload/slider/' . $slider[2]->foto)}}" alt=""
                                data-ww="['800px','420px','420px','290px']" data-hh="['auto','auto','auto','auto']"
                                width="1000" height="1000" data-no-retina></div>

                    </li>

                    <li data-index="rs-76" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                        data-thumb="http://works.themepunch.com/revolution_5_3/wp-content/" data-rotate="0"
                        data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3=""
                        data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                        data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('assets/landing_page')}}/images/shop-slide-01.jpg" alt=""
                            data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                            data-bgparallax="off" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme rs-parallaxlevel-10"
                            data-x="['center','center','center','center']" data-hoffset="['980','800','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['200','220','900','850']"
                            data-width="1500" data-height="1500" data-whitespace="nowrap" data-type="shape"
                            data-responsive_offset="on"
                            data-frames='[{"delay":300,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 5;background:linear-gradient(180deg, rgb(171, 255, 166) 0%, rgb(72, 255, 0) 100%);border-radius:100%;">
                            <div class="rs-looped rs-wave" data-speed="10" data-angle="0" data-radius="10px"
                                data-origin="50% 50%"> </div>
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption tp-resizeme alt-font text-extra-dark-gray font-weight-500"
                            data-x="['left','left','center','center']" data-hoffset="['0','102','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['-185','-120','-410','-300']"
                            data-width="none" data-height="none" data-whitespace="nowrap" data-type="text"
                            data-responsive_offset="on"
                            data-frames='[{"delay":600,"speed":1000,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:[-100%];y:0px;s:inherit;e:inherit;","to":"o:0.7;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]"
                            data-paddingright="[20,20,20,20]" data-paddingbottom="[10,10,10,10]"
                            data-paddingleft="[20,20,20,20]"
                            style="z-index: 7; text-transform: uppercase; letter-spacing: 2px;">Implementation Agreement
                        </div>

                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption alt-font text-extra-dark-gray" data-x="['left','left','center','center']"
                            data-hoffset="['0','100','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['-40','-10','-290','-220']" data-fontsize="['100','70','70','50']"
                            data-lineheight="['90','70','70','50']" data-width="auto" data-height="none"
                            data-whitespace="nowrap" data-type="text" data-responsive="on" data-responsive_offset="on"
                            data-frames='[{"delay":900,"speed":1000,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:[-100%];y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['left','left','center','center']" data-paddingtop="[20,20,20,20]"
                            data-paddingright="[20,20,20,20]" data-paddingbottom="[30,30,30,30]"
                            data-paddingleft="[20,20,20,20]" style="z-index: 8;letter-spacing: -3px;">
                            <strong>IA</strong>
                        </div>

                        <!-- LAYER NR. 1 -->
                        <a class="tp-caption tp-resizeme btn btn-medium btn-white btn-box-shadow lg-margin-15px-bottom md-no-margin-bottom md-margin-auto-lr fw-bold"
                            href="{{url('/daftarIa')}}" data-x="['left','left','center','center']"
                            data-hoffset="['24','122','0','0']" data-y="['middle','middle','middle','middle']"
                            data-voffset="['115','120','-160','-110']" data-width="none" data-height="none"
                            data-fontsize="['14','14','14','13']" data-whitespace="nowrap" data-type="button"
                            data-responsive_offset="on" data-responsive="on"
                            data-frames='[{"delay":1200,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[11,10,10,10]"
                            data-paddingright="[27,25,25,22]" data-paddingbottom="[11,10,10,10]"
                            data-paddingleft="[27,25,25,22]"
                            style="z-index: 6;box-shadow: 0 0 15px rgba(0,0,0,.2);">{{__('pages/landing/landing.daftar_ia')}}</a>

                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme rs-parallaxlevel-10"
                            data-x="['center','center','center','center']" data-hoffset="['300','190','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','20','150','150']"
                            data-width="['670','600','540','430']" data-height="['670','600','540','430']"
                            data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
                            data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 5;background: rgba(173,157,148,0.1);border-radius:100%;">
                            <div class="rs-looped rs-wave" data-speed="10" data-angle="0" data-radius="10px"
                                data-origin="50% 50%"> </div>
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption tp-resizeme rs-parallaxlevel-2"
                            data-x="['center','center','center','center']" data-hoffset="['300','200','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['-20','20','180','150']"
                            data-width="none" data-height="none" data-whitespace="nowrap" data-type="image"
                            data-responsive_offset="on"
                            data-frames='[{"delay":1800,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 6;"><img src="{{asset('storage/upload/slider/' . $slider[3]->foto)}}" alt=""
                                data-ww="['800px','420px','420px','290px']" data-hh="['auto','auto','auto','auto']"
                                width="1000" height="1000" data-no-retina></div>

                    </li>


                    <!-- MAIN IMAGE -->
                    <img src="{{asset('assets/landing_page')}}/images/shop-slide-03.jpg" alt=""
                        data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                        data-bgparallax="off" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->
                    <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme rs-parallaxlevel-10"
                        data-x="['center','center','center','center']" data-hoffset="['980','800','0','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['200','220','900','850']"
                        data-width="1500" data-height="1500" data-whitespace="nowrap" data-type="shape"
                        data-responsive_offset="on"
                        data-frames='[{"delay":300,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        style="z-index: 5;background:linear-gradient(180deg, rgba(255,231,217,1) 0%, rgba(254,236,225,1) 100%);border-radius:100%;">
                        <div class="rs-looped rs-wave" data-speed="10" data-angle="0" data-radius="10px"
                            data-origin="50% 50%"> </div>
                    </div>

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption tp-resizeme alt-font text-extra-dark-gray text-medium font-weight-500"
                        data-x="['left','left','center','center']" data-hoffset="['0','102','0','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['-185','-130','-410','-300']"
                        data-width="none" data-height="none" data-whitespace="nowrap" data-type="text"
                        data-responsive_offset="on"
                        data-frames='[{"delay":600,"speed":1000,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:[-100%];y:0px;s:inherit;e:inherit;","to":"o:0.7;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['left','left','left','left']" data-paddingtop="[10,10,10,10]"
                        data-paddingright="[20,20,20,20]" data-paddingbottom="[10,10,10,10]"
                        data-paddingleft="[20,20,20,20]"
                        style="z-index: 7; text-transform: uppercase; letter-spacing: 2px; opacity: 0.7;">Decoration
                        design</div>

                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption alt-font text-extra-dark-gray margin-auto-lr"
                        data-x="['left','left','center','center']" data-hoffset="['0','100','0','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['-40','-10','-290','-220']"
                        data-fontsize="['100','70','70','50']" data-lineheight="['90','70','70','50']"
                        data-width="['650','450','580','340']" data-height="none" data-whitespace="normal"
                        data-type="text" data-responsive_offset="on"
                        data-frames='[{"delay":900,"speed":1000,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:[-100%];y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['left','left','center','center']" data-paddingtop="[20,20,20,20]"
                        data-paddingright="[20,20,20,20]" data-paddingbottom="[30,30,30,30]"
                        data-paddingleft="[20,20,20,20]" style="z-index: 8;letter-spacing: -3px;"><span
                            class="font-weight-600 d-block">Wooden</span> lithology</div>

                    <!-- LAYER NR. 1 -->
                    <a class="tp-caption tp-resizeme btn btn-medium btn-white btn-box-shadow lg-margin-15px-bottom md-no-margin-bottom md-margin-auto-lr"
                        href="shop-wide.html" data-x="['left','left','center','center']"
                        data-hoffset="['24','122','0','0']" data-y="['middle','middle','middle','middle']"
                        data-voffset="['115','130','-160','-110']" data-width="none" data-height="none"
                        data-fontsize="['14','14','14','13']" data-whitespace="nowrap" data-type="button"
                        data-responsive_offset="on"
                        data-frames='[{"delay":1200,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[11,10,10,10]"
                        data-paddingright="[27,25,25,22]" data-paddingbottom="[11,10,10,10]"
                        data-paddingleft="[27,25,25,22]"
                        style="z-index: 6;box-shadow: 0 0 15px rgba(0,0,0,.1);">Masuk</a>

                    <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme rs-parallaxlevel-10"
                        data-x="['center','center','center','center']" data-hoffset="['300','190','0','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['0','20','150','150']"
                        data-width="['670','600','540','430']" data-height="['670','600','540','430']"
                        data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
                        data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        style="z-index: 5;background: rgba(173,157,148,0.1);border-radius:100%;">
                        <div class="rs-looped rs-wave" data-speed="10" data-angle="0" data-radius="10px"
                            data-origin="50% 50%"> </div>
                    </div>

                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-2" id="slide-73-layer-1"
                        data-x="['center','center','center','center']" data-hoffset="['300','200','0','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['40','0','170','130']"
                        data-width="none" data-height="none" data-whitespace="nowrap" data-type="image"
                        data-responsive_offset="on" data-responsive="on"
                        data-frames='[{"delay":1800,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        style="z-index: 6;"><img src="https://via.placeholder.com/500x555" alt=""
                            data-ww="['500px','404px','380px','280px']" data-hh="['auto','auto','auto','auto']"
                            width="500" height="555" data-no-retina> </div>

                    <!-- LAYER NR. 32 -->
                    <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-1"
                        data-x="['center','center','center','center']" data-hoffset="['540','420','200','150']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['-230','-190','-70','0']"
                        data-width="['120','100','110','90']" data-height="['120','100','110','90']"
                        data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
                        data-frames='[{"delay":2100,"speed":1000,"frame":"0","from":"x:0px;y:50px;rX:0deg;rY:0deg;rZ:0deg;sX:0.5;sY:0.5;opacity:0;","to":"o:1;","ease":"Back.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        style="z-index: 19;background:rgba(240,111,66,1);border-radius:100%;"> </div>

                    <!-- LAYER NR. 37 -->
                    <div class="tp-caption tp-resizeme text-white rs-parallaxlevel-1 alt-font text-extra-medium"
                        data-x="['center','center','center','center']" data-hoffset="['540','420','200','150']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['-250','-205','-85','-10']"
                        data-fontsize="['16','16','16','15']" data-width="['201','150','150','120']" data-height="none"
                        data-whitespace="['normal','nowrap','nowrap','nowrap']" data-type="text"
                        data-responsive_offset="on"
                        data-frames='[{"delay":2400,"speed":1000,"frame":"0","from":"y:30px;sX:0.5;sY:0.5;opacity:0;","to":"o:1;","ease":"Back.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        style="z-index: 24; text-transform: uppercase;">only</div>

                    <!-- LAYER NR. 33 -->
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-1 text-white alt-font"
                        data-x="['center','center','center','center']" data-hoffset="['540','420','200','150']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['-220','-178','-55','10']"
                        data-fontsize="['37','30','30','25']" data-lineheight="['40','30','30','25']"
                        data-width="['201','150','150','120']" data-height="none"
                        data-whitespace="['normal','nowrap','nowrap','nowrap']" data-type="text"
                        data-responsive_offset="on"
                        data-frames='[{"delay":2700,"speed":1000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        style="z-index: 20; letter-spacing: -2px;">$89</div>
                    </li>
                </ul>
            </div>
        </div>
    </article>
</section>
<!-- end revolution slider -->

<!-- start section -->
<section>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-4 row-cols-sm-2 align-items-center justify-content-center">
            <!-- start counter item -->
            <div class="col text-center sm-margin-40px-bottom wow animate__fadeIn" data-wow-delay="0.2s">
                <h3 class="vertical-counter d-inline-flex text-extra-dark-gray alt-font appear font-weight-600 letter-spacing-minus-2px mb-0"
                    data-to="{{$mou}}"></h3>
                <span class="alt-font text-uppercase text-medium d-block margin-5px-top"><span
                        class="font-weight-600">{{__('pages/landing/landing.dokumen_mou')}}</span>
            </div>
            <!-- end counter item -->
            <!-- start counter item -->
            <div class="col text-center sm-margin-40px-bottom wow animate__fadeIn" data-wow-delay="0.4s">
                <h3 class="vertical-counter d-inline-flex text-extra-dark-gray alt-font appear font-weight-600 letter-spacing-minus-2px mb-0"
                    data-to="{{$moa}}"></h3>
                <span class="alt-font text-uppercase text-medium d-block margin-5px-top"><span
                        class="font-weight-600">{{__('pages/landing/landing.dokumen_moa')}}</span>
            </div>
            <!-- end counter item -->
            <!-- start counter item -->
            <div class="col text-center xs-margin-40px-bottom wow animate__fadeIn" data-wow-delay="0.6s">
                <h3 class="vertical-counter d-inline-flex text-extra-dark-gray alt-font appear font-weight-600 letter-spacing-minus-2px mb-0"
                    data-to="{{$ia}}"></h3>
                <span class="alt-font text-uppercase text-medium d-block margin-5px-top"><span
                        class="font-weight-600">{{__('pages/landing/landing.dokumen_ia')}}</span>
            </div>
            <!-- end counter item -->
        </div>
    </div>
</section>
<!-- end section -->
<!-- start section -->
<section class="border-top border-color-medium-gray">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 text-center margin-5-half-rem-bottom md-margin-3-rem-bottom wow animate__fadeIn">
            <span
                class="alt-font font-weight-500 text-dark-orange text-uppercase letter-spacing-1px d-block margin-5px-bottom">{{__('pages/landing/landing.peta')}}</span>
            <h4 class="alt-font font-weight-600 text-extra-dark-gray mb-0 letter-spacing-minus-1px">
                {{__('pages/landing/landing.lokasi_peta')}}</h4>
        </div>
    </div>
    <div class="">
        <div class="row">
            <div class="col-12 tab-style-01 without-number wow animate__fadeIn">
                <!-- start tab navigation -->
                <ul
                    class="nav nav-tabs text-uppercase justify-content-center text-center alt-font font-weight-500 margin-7-rem-bottom md-margin-5-rem-bottom sm-margin-20px-bottom inline">
                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#"
                            onclick="initializeMap('mou')">{{__('pages/landing/landing.mou')}}</a><span
                            class="tab-border bg-extra-dark-gray"></span>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#"
                            onclick="initializeMap('moa')">{{__('pages/landing/landing.moa')}}</a><span
                            class="tab-border bg-extra-dark-gray"></span>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#"
                            onclick="initializeMap('ia')">{{__('pages/landing/landing.ia')}}</a><span
                            class="tab-border bg-extra-dark-gray"></span></li>
                </ul>
                <!-- end tab navigation -->
                <div class="tab-content">
                    <!-- start tab item -->
                    <div id="planning-tab" class="tab-pane fade in active show">
                        <div class="row align-items-center">
                            <div id="peta">
                            </div>

                            <section class="wrapper loading-screen">
                                <div class="card-loading">
                                    <div class="loader">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <!-- end tab item -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end section -->


<!-- start section -->
<section class="bg-light big-section">
    <div class="container">
        <div class="row justify-content-center">
            <div
                class="col-12 col-md-6 text-center margin-5-half-rem-bottom md-margin-3-rem-bottom wow animate__fadeIn">
                <span
                    class="alt-font font-weight-500 text-dark-orange text-uppercase letter-spacing-1px d-block margin-5px-bottom">{{__('pages/landing/landing.berita')}}</span>
                <h4 class="alt-font font-weight-600 text-extra-dark-gray mb-0 letter-spacing-minus-1px">
                    {{__('pages/landing/landing.berita_terbaru')}}
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12 blog-content">
                <ul
                    class="blog-grid blog-wrapper grid grid-loading grid-3col xl-grid-3col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large">
                    <li class="grid-sizer"></li>
                    <!-- start blog item -->
                    @foreach($daftarBerita as $berita)
                    <li class="grid-item wow animate__fadeIn">
                        <div class="blog-post border-radius-5px bg-white box-shadow-medium">
                            <div class="blog-post-image bg-greenish-gray">
                                <a href="{{url('/berita/' . $berita->slug)}}" title=""><img
                                        src="{{asset('storage/upload/sampul_berita/' . $berita->foto_sampul)}}"
                                        alt=""></a>
                                <a href="{{url('/daftarBerita?kategori=' . $berita->kategoriBerita->id)}}"
                                    class="blog-category alt-font">{{$berita->kategoriBerita->nama}}</a>
                            </div>
                            <div class="post-details padding-3-rem-lr padding-2-half-rem-tb last-paragraph-no-margin">
                                <a href="{{url('/berita/' . $berita->slug)}}"
                                    class="alt-font font-weight-500 text-extra-medium text-extra-dark-gray text-greenish-gray-hover margin-15px-bottom d-block">{{$berita->judul}}</a>
                                <p>{{$berita->deskripsi}}</p>
                            </div>
                        </div>
                    </li>
                    <!-- end blog item -->
                    @endforeach

                </ul>
            </div>
        </div>
        <div class="row justify-content-center">
            <div
                class="col-12 col-md-6 text-center margin-5-half-rem-bottom md-margin-3-rem-bottom wow animate__fadeIn">
                <a href="{{url('/daftarBerita')}}"
                    class="btn btn-fancy btn-medium btn-dark-gray margin-20px-top section-link">{{__('pages/landing/landing.selengkapnya')}}</a>
            </div>
        </div>

    </div>
</section>
<!-- end section -->
@endsection

@push('script')
<script>
    var _token = "{{csrf_token()}}";
    var map = null;
    $(document).ready(function () {
        initializeMap('mou');
    })

    function initializeMap(mapType) {
        $('.loading-screen').show();
        $('#peta').hide();
        var icon = '';
        if(map != undefined || map != null){
            map.remove();
        }
        map = L.map("peta").setView([20.585042, 65.424051], 3);

    var legend = L.control({ position: "bottomleft" });

    legend.onAdd = function (map) {
        var div = L.DomUtil.create("div", "legend");
        div.innerHTML += "<h4>{{__('pages/mou/map.simbol')}}</h4><hr>";
        div.innerHTML +=
            '<div class="d-flex align-items-center"><img src="{{asset("assets/dashboard/img/pin/green.png")}}" width="25px"><span class="mt-2 ml-2 fw-bold">{{__("components/span.aktif")}}</span></div>';
            div.innerHTML +=
            '<div class="d-flex align-items-center"><img src="{{asset("assets/dashboard/img/pin/blue.png")}}" width="25px"><span class="mt-2 ml-2 fw-bold">{{__("components/span.selesai")}}</span></div>';
        div.innerHTML +=
            '<div class="d-flex align-items-center"><img src="{{asset("assets/dashboard/img/pin/red.png")}}" width="25px"><span class="mt-2 ml-2 fw-bold">{{__("components/span.melewati_batas")}} / {{__("components/span.kadaluarsa")}} </span></div>';
        div.innerHTML +=
            '<div class="d-flex align-items-center"><img src="{{asset("assets/dashboard/img/pin/yellow.png")}}" width="25px"><span class="mt-2 ml-2 fw-bold">{{__("components/span.masa_tenggang")}}</span></div>';

        return div;
    };

    legend.addTo(map);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(map);

        var pin = L.Icon.extend({
            options: {
                iconSize: [50, 50],
                iconAnchor: [22, 94],
                shadowAnchor: [4, 62],
                popupAnchor: [-3, -76],
            },
        });

        var greenIcon = new pin({
            iconUrl: "{{asset('assets/dashboard/img/pin/green.png')}}",
            iconSize :[40,40],
            iconAnchor : [25,20],
            popupAnchor: [-4, -20]
        });
        var redIcon = new pin({
            iconUrl: "{{asset('assets/dashboard/img/pin/red.png')}}",
            iconSize :[40,40],
            iconAnchor : [25,20],
            popupAnchor: [-4, -20]
        });
        var yellowIcon = new pin({
            iconUrl: "{{asset('assets/dashboard/img/pin/yellow.png')}}",
            iconSize :[40,40],
            iconAnchor : [25,20],
            popupAnchor: [-4, -20]
        });
        var blueIcon = new pin({
            iconUrl: "{{asset('assets/dashboard/img/pin/blue.png')}}",
            iconSize :[40,40],
            iconAnchor : [25,20],
            popupAnchor: [-4, -20]
        });

        if (mapType == 'mou') {
            $.ajax({
            url: "/getMarkerMapMou",
            type: "POST",
            data: {
            _token: _token
            },
            success: function (data) {
            for (var i = 0; i < data[0].length; i++) {
                if (data[0][i].status=='aktif' ) {
                    icon=greenIcon;
                } else if (data[0][i].status=='masa_tenggang' ) {
                    icon=yellowIcon;
                } else {
                    icon=redIcon;
                }
                L.marker([data[0][i].latitude, data[0][i].longitude], { icon: icon })
                .bindPopup( "<p class='fw-bold my-0 text-center title'>" + data[0][i].nama_pengusul + "</p><hr>"
                + "<p class='my-0'>{{__('pages/mou/map.program')}} " + data[0][i].program + "</p>"
                + "<p class='my-0'>{{__('pages/mou/map.negara')}} " + data[0][i].negara + "</p>"
                + "<p class='my-0'>{{__('pages/mou/map.alamat')}} " + data[0][i].alamat + "</p>"
                + "<p class='my-0'>{{__('pages/mou/map.tanggal_berakhir')}} " + data[0][i].tanggal_berakhir + "</p>"
                + "<p class='my-0'>{{__('pages/mou/map.status')}} " + data[0][i].namaStatus + "</p>"
                ) .on('click', L.bind(petaKlik, null, data[0][i].id)) .addTo(map);
                }
            }, })
        } else if (mapType == 'moa') {
            $.ajax({
            url: "/getMarkerMapMoa",
            type: "POST",
            data: {
            _token: _token
            },
            success: function (data) {
            for (var i = 0; i < data[0].length; i++) {
                 if (data[0][i].status=='aktif' ) { icon=greenIcon; } else if
                (data[0][i].status=='masa_tenggang' ) { icon=yellowIcon; } else { icon=redIcon; }
                L.marker([data[0][i].latitude, data[0][i].longitude], { icon: icon })
                .bindPopup( "<p class='fw-bold my-0 text-center title'>" + data[0][i].nama_pengusul + "</p><hr>"
                + "<p class='my-0'>{{__('pages/moa/map.program')}} " + data[0][i].program + "</p>"
                + "<p class='my-0'>{{__('pages/moa/map.negara')}} " + data[0][i].negara + "</p>"
                + "<p class='my-0'>{{__('pages/moa/map.alamat')}} " + data[0][i].alamat + "</p>"
                + "<p class='my-0'>{{__('pages/moa/map.tanggal_berakhir')}} " + data[0][i].tanggal_berakhir + "</p>"
                + "<p class='my-0'>{{__('pages/moa/map.status')}} " + data[0][i].namaStatus + "</p>"
                ) .on('click', L.bind(petaKlik, null, data[0][i].id)) .addTo(map); } }, })
        } else {
            $.ajax({
            url: "/getMarkerMapIa",
            type: "POST",
            data: {
            _token: _token
            },
            success: function (data) {
            for (var i = 0; i < data[0].length; i++) {
                if (data[0][i].status=='aktif' ) {
                    icon=greenIcon;
                } else if (data[0][i].status=='selesai' ) {
                    icon=blueIcon;
                } else {
                    icon=redIcon;
                }
                L.marker([data[0][i].latitude, data[0][i].longitude], { icon: icon }) .bindPopup( "<p class='fw-bold my-0 text-center title'>" +
                data[0][i].nama_pengusul + "</p><hr>" + "<p class='my-0'>{{__('pages/ia/map.program')}} " + data[0][i].program + "</p>"
                + "<p class='my-0'>{{__('pages/ia/map.negara')}} " + data[0][i].negara + "</p>"
                + "<p class='my-0'>{{__('pages/ia/map.alamat')}} " + data[0][i].alamat + "</p>"
                + "<p class='my-0'>{{__('pages/ia/map.tanggal_berakhir')}} " + data[0][i].tanggal_berakhir + "</p>"
                + "<p class='my-0'>{{__('pages/ia/map.status')}} " + data[0][i].namaStatus + "</p>"
                ) .on('click', L.bind(petaKlik, null, data[0][i].id)) .addTo(map); } }, })
        }


        function petaKlik(id) {
            $.ajax({
                url: "/getDetailMou/" + id,
                type: "POST",
                data: {
                    _token: _token
                },
                success: function (data) {
                    $('#informasiMap').removeAttr('hidden');
                    $('#mapSection').removeClass('col');
                    $('#mapSection').addClass('col-lg-8');
                    $('#nomor_mou').html(data.nomor_mou);
                    $('#nomor_mou_pengusul').html(data.nomor_mou_pengusul);
                    $('#pengusul').html(data.pengusul);
                    $('#nik_nip_pengusul').html(data.nik_nip_pengusul);
                    $('#jabatan').html(data.jabatan_pengusul);
                    $('#program').html(data.program);
                    $('#alamat').html(data.alamat);
                    $('#tanggal_mulai').html(data.tanggal_mulai);
                    $('#tanggal_berakhir').html(data.tanggal_berakhir);
                    $('#pertemuan').html(data.pertemuan);
                    $('#status').html(data.status);
                    $('#linkDokumen').attr('href', data.dokumen);
                },
            })
        }
        $('.loading-screen').hide();
        $('#peta').show();
        map.invalidateSize();
    }



</script>
@endpush
