@extends('templates/landing')

@section('title-tab')
{{$berita->judul}}
@endsection

@push('style')
<style>
    #konten img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        object-fit: cover;
        border-radius: 1%;
    }
</style>
@endpush

@section('content')
<section class="blog-right-side-bar">

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-10 right-sidebar md-margin-60px-bottom sm-margin-40px-bottom">
                <div class="row">
                    <div class="col-12 blog-details-text last-paragraph-no-margin margin-6-rem-bottom">
                        <ul class="list-unstyled margin-2-rem-bottom">
                            <li class="d-inline-block align-middle margin-25px-right"><i
                                    class="feather icon-feather-calendar text-fast-blue margin-10px-right"></i>{{$berita->created_at->translatedFormat('d
                                F Y')}}</li>
                            <li class="d-inline-block align-middle margin-25px-right"><i
                                    class="feather icon-feather-folder text-fast-blue margin-10px-right"></i><a
                                    href="{{url('/daftarBerita?kategori=' . $berita->kategoriBerita->id)}}">{{$berita->kategoriBerita->nama}}</a>
                            </li>
                        </ul>
                        <h5 class="alt-font font-weight-500 text-extra-dark-gray margin-4-half-rem-bottom">
                            {{$berita->judul}}</h5>
                        <img src="{{Storage::url('upload/sampul_berita/' . $berita->foto_sampul)}}" alt=""
                            class="w-100 border-radius-6px margin-4-half-rem-bottom">
                        <div id="konten">
                            {!!$berita->konten!!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div
                class="col-12 col-md-6 text-center margin-5-half-rem-bottom md-margin-3-rem-bottom wow animate__fadeIn">
                <a href="{{url()->previous()}}"
                    class="btn btn-fancy btn-medium btn-dark-gray margin-20px-top section-link">{{__('pages/landing/berita.kembali')}}</a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
@endpush
