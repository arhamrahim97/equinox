@extends('templates/dashboard')

@section('title-tab')
| {{__('pages/mou/show.title')}}
@endsection

@section('title')
{{__('pages/mou/show.title')}}
@endsection

@section('subTitle')
{{__('pages/mou/show.subTitle')}}
@endsection

@push('style')
<style>
    .nav-pills.nav-secondary .nav-link.active{
        background: rgb(54, 151, 225) !important;
    }
</style>
@endpush

@section('content')
    @component('components.show.mou_moa_ia')
        @slot('type_doc')
            MOU
        @endslot
        @slot('program')
            {{$mou->program}}
        @endslot
        @slot('pengusul')
            {{$mou->pengusul->nama}}
        @endslot
        @slot('negara')
            {{$mou->pengusul->negara->nama}}
        @endslot
        @slot('provinsi')
            @if ($mou->pengusul->provinsi)
                {{$mou->pengusul->provinsi->nama}}   
            @else
                {{$mou->pengusul->provinsi_id}}
            @endif
        @endslot
        @slot('kota')
            @if ($mou->pengusul->kota)
                {{$mou->pengusul->kota->nama}}
            @else
                {{$mou->pengusul->kota_id}}
            @endif
        @endslot
        @slot('kecamatan')
            @if ($mou->pengusul->kecamatan)
                {{$mou->pengusul->kecamatan->nama}}
            @else
                {{$mou->pengusul->kecamatan_id}}
            @endif
        @endslot
        @slot('kelurahan')
            @if ($mou->pengusul->kelurahan)
                {{$mou->pengusul->kelurahan->nama}}
            @else
                {{$mou->pengusul->kelurahan_id}}
            @endif
        @endslot
        @slot('alamat')
            {{$mou->pengusul->alamat}}            
        @endslot
        @slot('latitude_longitude')
            {{$mou->latitude}} | {{$mou->longitude}}
        @endslot

        @slot('title_nomor_mou')
            {{__('components/form_mou_moa_ia.nomor_mou')}}
        @endslot
        @slot('title_nomor_pengusul_mou')
            {{__('components/form_mou_moa_ia.nomor_mou_pengusul')}}        
        @endslot
        @slot('nomor_mou')
            {{$mou->nomor_mou}}
        @endslot
        @slot('nomor_mou_pengusul')
            {{$mou->nomor_mou_pengusul}}
        @endslot
        @slot('nik_nip_pengusul')
            {{$mou->nik_nip_pengusul}}
        @endslot
        @slot('jabatan_pengusul')
            {{$mou->jabatan_pengusul}}
        @endslot
        @slot('program')
            {{$mou->program}}
        @endslot
        @slot('tanggal_mulai')
            {{$mou->tanggal_mulai}}
        @endslot
        @slot('tanggal_berakhir')
            {{$mou->tanggal_berakhir}}
        @endslot
        @slot('download_mou')
            {{Storage::url("dokumen/mou/" . $mou->dokumen)}}
        @endslot

        @slot('metode_pertemuan')
            {{$mou->metode_pertemuan}}
        @endslot
        @slot('tanggal_pertemuan')
            {{$mou->tanggal_pertemuan}}
        @endslot
        @slot('waktu_pertemuan')
            {{$mou->waktu_pertemuan}}
        @endslot
        @slot('tempat_pertemuan')
            {{$mou->tempat_pertemuan}}
        @endslot

    @endcomponent
@endsection

@push('script')

@endpush