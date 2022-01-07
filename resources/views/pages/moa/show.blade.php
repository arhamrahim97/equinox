@extends('templates/dashboard')

@section('title-tab')
| {{__('pages/moa/show.title')}}
@endsection

@section('title')
{{__('pages/moa/show.title')}}
@endsection

@section('subTitle')
{{__('pages/moa/show.subTitle')}}
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
            MOA
        @endslot
        @slot('program')
            {{$moa->program}}
        @endslot
        @slot('pengusul')
            {{$moa->pengusul->nama}}
        @endslot
        @slot('negara')
            {{$moa->pengusul->negara->nama}}
        @endslot
        @slot('provinsi')
            @if ($moa->pengusul->provinsi)
                {{$moa->pengusul->provinsi->nama}}   
            @else
                {{$moa->pengusul->provinsi_id}}
            @endif
        @endslot
        @slot('kota')
            @if ($moa->pengusul->kota)
                {{$moa->pengusul->kota->nama}}
            @else
                {{$moa->pengusul->kota_id}}
            @endif
        @endslot
        @slot('kecamatan')
            @if ($moa->pengusul->kecamatan)
                {{$moa->pengusul->kecamatan->nama}}
            @else
                {{$moa->pengusul->kecamatan_id}}
            @endif
        @endslot
        @slot('kelurahan')
            @if ($moa->pengusul->kelurahan)
                {{$moa->pengusul->kelurahan->nama}}
            @else
                {{$moa->pengusul->kelurahan_id}}
            @endif
        @endslot
        @slot('alamat')
            {{$moa->pengusul->alamat}}            
        @endslot
        @slot('latitude_longitude')
            {{$moa->latitude}} | {{$moa->longitude}}
        @endslot

        @slot('title_nomor')
            {{__('components/form_mou_moa_ia.nomor_moa')}}
        @endslot
        @slot('title_nomor_pengusul')
            {{__('components/form_mou_moa_ia.nomor_moa_pengusul')}}        
        @endslot
        @slot('nomor_mou')
            {{$moa->nomor_moa}}
        @endslot
        @slot('nomor_mou_pengusul')
            {{$moa->nomor_moa_pengusul}}
        @endslot
        @slot('nik_nip_pengusul')
            {{$moa->nik_nip_pengusul}}
        @endslot
        @slot('jabatan_pengusul')
            {{$moa->jabatan_pengusul}}
        @endslot
        @slot('program')
            {{$moa->program}}
        @endslot
        @slot('tanggal_mulai')
            {{$moa->tanggal_mulai}}
        @endslot
        @slot('tanggal_berakhir')
            {{$moa->tanggal_berakhir}}
        @endslot
        @slot('download_mou')
            {{Storage::url("dokumen/mou/" . $moa->mou->dokumen)}}
        @endslot
        @slot('download_moa')
            {{Storage::url("dokumen/moa/" . $moa->dokumen)}}
        @endslot
        @slot('metode_pertemuan')
            {{$moa->metode_pertemuan}}
        @endslot
        @slot('tanggal_pertemuan')
            {{$moa->tanggal_pertemuan}}
        @endslot
        @slot('waktu_pertemuan')
            {{$moa->waktu_pertemuan}}
        @endslot
        @slot('tempat_pertemuan')
            {{$moa->tempat_pertemuan}}
        @endslot
        @slot('anggota_fakultas')
        <li>
            <span class="name-specification">{{__('components/form_mou_moa_ia.fakultas_')}}</span>
            <span class="status-specification">
                @if ($moa->user->fakultas)
                    {{$moa->user->fakultas->nama}}                                        
                @else
                    LPPM
                @endif
            </span>
        </li>                  
    @endslot

    @endcomponent
@endsection

@push('script')

@endpush