@extends('templates/dashboard')

@section('title-tab')
| {{__('pages/ia/edit.title')}}
@endsection

@section('title')
{{__('pages/ia/edit.title')}}
@endsection

@section('subTitle')
{{__('pages/ia/edit.subTitle')}}
@endsection

@push('style')
@endpush

@section('content')
<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{__('pages/ia/edit.card-title')}}
                    </div>
                    <div class="card-category">{{__('pages/ia/edit.card-category')}}</div>
                </div>
                @component('components/edits/mou_moa_ia')
                @slot('form_method')
                POST
                @endslot
                @slot('form_id')
                form_ia
                @endslot
                @slot('form_action')
                /ia/{{$ia->id}}
                @endslot
                @slot('back')
                /ia
                @endslot
                @slot('document_category')
                IA
                @endslot
                @slot('id_ia')
                {{$ia->id}}
                @endslot
                @slot('users_id_role')
                {{$ia->user->role}}
                @endslot
                @slot('pengusul')
                @forelse ($pengusul as $item)
                <option daerah="{{$item->negara->region}}" negara="{{$item->negara->nama}}" provinsi="@if ($item->provinsi == NULL){{$item->provinsi_id}}
                                @else {{$item->provinsi->nama}}
                                @endif" kota="@if ($item->kota == NULL){{$item->kota_id}}
                                @else {{$item->kota->nama}}
                                @endif" kecamatan="@if ($item->kecamatan == NULL){{$item->kecamatan_id}}
                                @else {{$item->kecamatan->nama}}
                                @endif" kelurahan="@if ($item->kelurahan == NULL){{$item->kelurahan_id}}
                                @else {{$item->kelurahan->nama}}
                                @endif" latitude="{{$item->latitude}}" longitude="{{$item->longitude}}"
                    alamat="{{$item->alamat}}" value="{{$item->id}}" @if(old('pengusul_id', $ia->pengusul->id) ==
                    $item->id) selected @endif>{{$item->nama}}</option>
                @empty
                <option value="">Tidak ada data</option>
                @endforelse
                @endslot
                @slot('latitude')
                {{$ia->latitude}}
                @endslot
                @slot('longitude')
                {{$ia->longitude}}
                @endslot
                @slot('nomor_moa_pengusul')
                @forelse ($nomor_moa_pengusul as $item)
                @if ($item->mou)
                <option nomor_mou_pengusul="{{$item->mou->nomor_mou_pengusul}} - {{$item->mou->pengusul->nama}}"
                    value="{{$item->id}}" @if(old('nomor_moa_pengusul', $ia->moa_id) == $item->id) selected
                    @endif>{{$item->nomor_moa_pengusul}} - {{$item->pengusul->nama}}</option>
                @else
                <option nomor_mou_pengusul="-" value="{{$item->id}}" @if(old('nomor_moa_pengusul', $ia->moa_id) ==
                    $item->id) selected
                    @endif>{{$item->nomor_moa_pengusul}} - {{$item->pengusul->nama}}</option>
                @endif
                @empty
                <option value="">Tidak ada data</option>
                @endforelse
                @endslot
                @slot('nomor_mou_pengusul')
                @if ($ia->moa->mou)
                {{$ia->moa->mou->nomor_mou_pengusul}} - {{$ia->moa->mou->pengusul->nama}}
                @else
                -
                @endif
                @endslot
                @slot('nomor_ia')
                {{$ia->nomor_ia}}
                @endslot
                @slot('nomor_ia_pengusul')
                {{$ia->nomor_ia_pengusul}}
                @endslot
                @slot('pejabat_penandatangan')
                {{$ia->pejabat_penandatangan}}
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
                @slot('manfaat')
                {{$ia->manfaat}}
                @endslot
                @slot('tanggal_mulai')
                @php
                echo date("d-m-Y", strtotime($ia->tanggal_mulai))
                @endphp
                @endslot
                @slot('tanggal_berakhir')
                @php
                echo date("d-m-Y", strtotime($ia->tanggal_berakhir))
                @endphp
                @endslot
                @slot('fakultas_all')
                @forelse ($fakultas_all as $item)
                @if (in_array($item->id, $fakultas_ia))
                <option value="{{$item->id}}" selected>{{$item->nama}}</option>
                @else
                <option value="{{$item->id}}">{{$item->nama}}</option>
                @endif
                @empty
                <option value="">Tidak ada data</option>
                @endforelse
                @endslot
                @slot('prodi_all')
                @forelse ($prodi_all as $item)
                @if (in_array($item->id, $prodi_ia))
                <option value="{{$item->id}}" selected>{{$item->nama}}</option>
                @else
                <option value="{{$item->id}}">{{$item->nama}}</option>
                @endif
                @empty
                <option value="">Tidak ada data</option>
                @endforelse
                @endslot
                @slot('prodi_fakultas')
                @forelse ($prodi_fakultas as $item)
                @if (in_array($item->id, $prodi_ia))
                <option value="{{$item->id}}" selected>{{$item->nama}}</option>
                @else
                <option value="{{$item->id}}">{{$item->nama}}</option>
                @endif
                @empty
                <option value="">Tidak ada data</option>
                @endforelse
                @endslot
                @slot('nilai_uang')
                {{$ia->nilai_uang}}
                @endslot
                @slot('metode_pertemuan')
                {{$ia->metode_pertemuan}}
                @endslot
                @slot('tanggal_pertemuan')
                @php
                echo date("d-m-Y", strtotime($ia->tanggal_pertemuan))
                @endphp
                @endslot
                @slot('waktu_pertemuan')
                {{$ia->waktu_pertemuan}}
                @endslot
                @slot('tempat_pertemuan')
                {{$ia->tempat_pertemuan}}
                @endslot


                @slot('csrf')
                @csrf
                @endslot
                @endcomponent
            </div>
        </div>
    </div>
</section>

@endsection

@push('script')
<script>
    $(document).ready(function(){
       getEditJenisKerjasama();
    });

    function getEditJenisKerjasama() {
        var id = '{{$ia->id}}';
        $.ajax({
            url: "/getEditJenisKerjasama",
            type: "GET",
            data: {
                id : id
            },
            success: function (data) {
                $("#jenis_kerjasama").val(data).trigger('change');
            },
        })
    }
</script>
@endpush
