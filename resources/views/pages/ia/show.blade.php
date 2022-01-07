@extends('templates/dashboard')

@section('title-tab')
| {{__('pages/ia/show.title')}}
@endsection

@section('title')
{{__('pages/ia/show.title')}}
@endsection

@section('subTitle')
{{__('pages/ia/show.subTitle')}}
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
            IA
        @endslot
        @slot('program')
            {{$ia->program}}
        @endslot
        @slot('pengusul')
            {{$ia->pengusul->nama}}
        @endslot
        @slot('negara')
            {{$ia->pengusul->negara->nama}}
        @endslot
        @slot('provinsi')
            @if ($ia->pengusul->provinsi)
                {{$ia->pengusul->provinsi->nama}}   
            @else
                {{$ia->pengusul->provinsi_id}}
            @endif
        @endslot
        @slot('kota')
            @if ($ia->pengusul->kota)
                {{$ia->pengusul->kota->nama}}
            @else
                {{$ia->pengusul->kota_id}}
            @endif
        @endslot
        @slot('kecamatan')
            @if ($ia->pengusul->kecamatan)
                {{$ia->pengusul->kecamatan->nama}}
            @else
                {{$ia->pengusul->kecamatan_id}}
            @endif
        @endslot
        @slot('kelurahan')
            @if ($ia->pengusul->kelurahan)
                {{$ia->pengusul->kelurahan->nama}}
            @else
                {{$ia->pengusul->kelurahan_id}}
            @endif
        @endslot
        @slot('alamat')
            {{$ia->pengusul->alamat}}            
        @endslot
        @slot('latitude_longitude')
            {{$ia->latitude}} | {{$ia->longitude}}
        @endslot

        @slot('title_nomor')
            {{__('components/form_mou_moa_ia.nomor_ia')}}
        @endslot
        @slot('title_nomor_pengusul')
            {{__('components/form_mou_moa_ia.nomor_ia_pengusul')}}        
        @endslot
        @slot('nomor_mou')
            {{$ia->nomor_ia}}
        @endslot
        @slot('nomor_mou_pengusul')
            {{$ia->nomor_ia_pengusul}}
        @endslot
        @slot('nik_nip_pengusul')
            {{$ia->nik_nip_pengusul}}
        @endslot
        @slot('jabatan_pengusul')
            {{$ia->jabatan_pengusul}}
        @endslot
        @slot('program')
            {{$ia->program}}
        @endslot
        @slot('tanggal_mulai')
            {{$ia->tanggal_mulai}}
        @endslot
        @slot('tanggal_berakhir')
            {{$ia->tanggal_berakhir}}
        @endslot
        @slot('download_mou')
            {{Storage::url("dokumen/mou/" . $ia->moa->mou->dokumen)}}
        @endslot
        @slot('download_moa')
            {{Storage::url("dokumen/moa/" . $ia->moa->dokumen)}}
        @endslot
        @slot('download_ia')
            {{Storage::url("dokumen/ia/" . $ia->dokumen)}}
        @endslot
        @slot('metode_pertemuan')
            {{$ia->metode_pertemuan}}
        @endslot
        @slot('tanggal_pertemuan')
            {{$ia->tanggal_pertemuan}}
        @endslot
        @slot('waktu_pertemuan')
            {{$ia->waktu_pertemuan}}
        @endslot
        @slot('tempat_pertemuan')
            {{$ia->tempat_pertemuan}}
        @endslot
        @slot('anggota_fakultas')
            @if (count($ia->anggotaFakultas) != 0)
            <li>
                <span class="name-specification">{{__('components/form_mou_moa_ia.fakultas_')}}</span>
                <span class="status-specification">                    
                    @foreach ($ia->anggotaFakultas as $item)
                        {{$item->fakultas->nama}} <p style="color: red; font-weight: bold; display: inline">|</p>
                    @endforeach 
                </span>
            </li>    
            @else
            <li>
                <span class="name-specification">{{__('components/form_mou_moa_ia.fakultas_')}}</span>
                <span class="status-specification">
                    {{$ia->user->fakultas->nama}}                    
                </span>
            </li>                  
            @endif
        @endslot
        @slot('anggota_prodi')
            @if (count($ia->anggotaProdi) != 0)
            <li>
                <span class="name-specification">{{__('components/form_mou_moa_ia.program_studi_')}}</span>
                <span class="status-specification">
                    {{-- {{$anggota_prodi}} --}}
                    @foreach ($ia->anggotaProdi as $item)
                        {{$item->prodi->nama}} <p style="color: red; font-weight: bold; display: inline">|</p>
                    @endforeach 
                </span>
            </li>   
            @else
            <li>
                <span class="name-specification">{{__('components/form_mou_moa_ia.program_studi_')}}</span>
                <span class="status-specification">
                    {{$ia->user->prodi->nama}}                    
                </span>
            </li>   
            @endif
        @endslot   
        @slot('nilai_uang')
            @php
                echo "Rp " . number_format($ia->nilai_uang, 0, ".", ".");
                
            @endphp
        @endslot
    @endcomponent
@endsection

@push('script')
{{-- <script>
    $('.rupiah').mask('000.000.000.000.000', {reverse: true})
</script> --}}
@endpush