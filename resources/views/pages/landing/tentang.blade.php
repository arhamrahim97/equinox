@extends('templates/landing')

@section('title-tab')
{{__('pages/landing/tentang.title')}}
@endsection

@push('style')

@endpush

@section('content')
<!-- start page title -->
<section class="half-section bg-light-gray parallax mb-0" data-parallax-background-ratio="0.5"
    style="background-image:url('images/portfolio-bg2.jpg');">
    <div class="container">
        <div class="row align-items-stretch justify-content-center extra-small-screen">
            <div
                class="col-12 col-xl-6 col-lg-7 col-md-8 page-title-extra-small text-center d-flex justify-content-center flex-column">
                <h2
                    class="text-extra-dark-gray alt-font font-weight-500 letter-spacing-minus-1px line-height-50 sm-line-height-45 xs-line-height-30 no-margin-bottom">
                    {{__('pages/landing/tentang.title')}}</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-12 tab-style-01 without-number wow animate__fadeIn justify-content-center">
                <!-- start tab navigation -->
                <ul
                    class="nav x nav-tabs text-uppercase justify-content-center text-center alt-font font-weight-500 margin-7-rem-bottom md-margin-5-rem-bottom sm-margin-20px-bottom">
                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                            href="#planning-tab">MOU</a><span class="tab-border bg-extra-dark-gray"></span></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#research-tab">MOA</a><span
                            class="tab-border bg-extra-dark-gray"></span></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#target-tab">IA</a><span
                            class="tab-border bg-extra-dark-gray"></span></li>
                </ul>
                <!-- end tab navigation -->
                <div class="tab-content">
                    <!-- start tab item -->
                    <div id="planning-tab" class="tab-pane fade in active show">
                        <div class="row align-items-center">
                            {!! $tentang[0]->konten !!}
                        </div>
                    </div>
                    <!-- end tab item -->
                    <!-- start tab item -->
                    <div id="research-tab" class="tab-pane fade">
                        <div class="row align-items-center">
                            {!! $tentang[1]->konten !!}
                        </div>
                    </div>
                    <!-- end tab item -->
                    <!-- start tab item -->
                    <div id="target-tab" class="tab-pane fade">
                        <div class="row align-items-center">
                            {!! $tentang[2]->konten !!}
                        </div>
                    </div>
                    <!-- end tab item -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page title -->


@endsection

@push('script')
@endpush
