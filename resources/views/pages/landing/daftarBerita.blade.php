@extends('templates/landing')

@section('title-tab')
{{__('pages/landing/berita.title')}}
@endsection

@push('style')

@endpush

@section('content')
<!-- start page title -->
<section class="half-section bg-light-gray parallax" data-parallax-background-ratio="0.5"
    style="background-image:url('images/portfolio-bg2.jpg');">
    <div class="container">
        <div class="row align-items-stretch justify-content-center extra-small-screen">
            <div
                class="col-12 col-xl-6 col-lg-7 col-md-8 page-title-extra-small text-center d-flex justify-content-center flex-column">
                <h1 class="alt-font text-gradient-sky-blue-pink margin-15px-bottom d-inline-block">
                    {{__('pages/landing/berita.berita')}}</h1>
                <h2
                    class="text-extra-dark-gray alt-font font-weight-500 letter-spacing-minus-1px line-height-50 sm-line-height-45 xs-line-height-30 no-margin-bottom">
                    {{__('pages/landing/berita.daftar_berita')}}</h2>
            </div>
        </div>
        <form action="{{url('daftarBerita')}}">

            @if (request('kategori'))
            <input class="form-control border-0 px-1" type="hidden" aria-label="Cari Projek" placeholder="Cari Projek"
                name="kategori" value="{{ request('kategori') }}">
            @endif
            <div class="row">
                <div class="col-lg-6">
                    <input class="small-input bg-white margin-20px-bottom " type="text" name="cari"
                        placeholder="{{__('pages/landing/berita.cari_berita')}}" value="{{request('cari')}}">
                </div>
                <div class="col-lg-4 ">
                    <select class="small-input bg-white margin-20px-bottom" id="exampleFormControlSelect1"
                        name="kategori">
                        <option hidden selected value="">{{__('pages/landing/berita.pilih_kategori')}}</option>
                        <option value="" {{request('kategori') ? '' : 'selected' }}>{{__('pages/landing/berita.semua')}}
                        </option>
                        @foreach($daftarKategoriBerita as $kategori)
                        <option value="{{$kategori->id}}" {{request('kategori')==$kategori->id ? 'selected' :
                            ''}}>{{$kategori->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2 align-items-stretch justify-content-center">
                    <button type="submit"
                        class="btn btn-fancy btn-medium btn-dark-gray section-link">{{__('pages/landing/berita.cari')}}</button>
                </div>

            </div>
        </form>
    </div>
</section>
<!-- end page title -->
<!-- start section -->
<section class="bg-light-gray pt-0 padding-eleven-lr xl-padding-two-lr xs-no-padding-lr">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 blog-content">
                <ul
                    class="blog-grid blog-wrapper grid grid-loading grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large">
                    <li class="grid-sizer"></li>
                    <!-- start blog item -->
                    @foreach($daftarBerita as $berita)
                    <li class="grid-item wow animate__fadeIn">
                        <div class="blog-post border-radius-5px bg-white box-shadow-medium">
                            <div class="blog-post-image bg-medium-slate-blue">
                                <a href="{{url('/berita/' . $berita->slug)}}" title=""><img
                                        src="{{Storage::url('upload/sampul_berita/' . $berita->foto_sampul)}}"
                                        alt=""></a>
                                <a href="{{url('/daftarBerita?kategori=' . $berita->kategoriBerita->id)}}"
                                    class="blog-category alt-font">{{$berita->kategoriBerita->nama}}</a>
                            </div>
                            <div class="post-details padding-3-rem-lr padding-2-half-rem-tb">
                                <p href="" class="alt-font text-small d-inline-block margin-10px-bottom">
                                    {{$berita->created_at->translatedFormat('d F Y')}}</p>
                                <a href="{{url('/berita/' . $berita->slug)}}"
                                    class="alt-font font-weight-500 text-extra-medium text-extra-dark-gray margin-15px-bottom d-block">{{$berita->judul}}</a>
                                <p>{{$berita->deskripsi}}</p>
                            </div>
                        </div>
                    </li>
                    <!-- end blog item -->
                    @endforeach
                </ul>
                <!-- start pagination -->
                <div
                    class="col-12 d-flex justify-content-center margin-7-half-rem-top md-margin-5-rem-top wow animate__fadeIn">
                    {{ $daftarBerita->links() }}
                </div>
                <!-- end pagination -->
            </div>
        </div>
    </div>
</section>
<!-- end section -->
@endsection

@push('script')
@endpush
