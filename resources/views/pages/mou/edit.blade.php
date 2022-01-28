@extends('templates/dashboard')

@section('title-tab')
| {{__('pages/mou/edit.title')}}
@endsection

@section('title')
{{__('pages/mou/edit.title')}}
@endsection

@section('subTitle')
{{__('pages/mou/edit.subTitle')}}
@endsection

@push('style')
@endpush

@section('content')
<section>    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{__('pages/mou/edit.card-title')}}
                    </div>
                    <div class="card-category">{{__('pages/mou/edit.card-category')}}</div>                    
                </div>               
                @component('components/edits/mou_moa_ia')
                    @slot('form_method')
                        POST                    
                    @endslot
                    @slot('form_id')
                        form_mou
                    @endslot                    
                    @slot('form_action')
                        /mou/{{$mou->id}}
                    @endslot
                    @slot('back')
                        /mou
                    @endslot
                    @slot('document_category')
                        MOU
                    @endslot   
                    @slot('id_ia')
                        {{$mou->id}}
                    @endslot
                    @slot('pengusul')
                        @forelse ($pengusul as $item)
                            <option daerah="{{$item->negara->region}}" 
                                negara="{{$item->negara->nama}}" 
                                provinsi="@if ($item->provinsi == NULL){{$item->provinsi_id}}
                                @else {{$item->provinsi->nama}}
                                @endif"
                                kota="@if ($item->kota == NULL){{$item->kota_id}}
                                @else {{$item->kota->nama}}
                                @endif" 
                                kecamatan="@if ($item->kecamatan == NULL){{$item->kecamatan_id}}
                                @else {{$item->kecamatan->nama}}
                                @endif" 
                                kelurahan="@if ($item->kelurahan == NULL){{$item->kelurahan_id}}
                                @else {{$item->kelurahan->nama}}
                                @endif" 
                                latitude="{{$item->latitude}}" 
                                longitude="{{$item->longitude}}" alamat="{{$item->alamat}}" value="{{$item->id}}" @if(old('pengusul_id', $mou->pengusul->id) == $item->id) selected @endif>{{$item->nama}}</option>                                       
                        @empty
                            <option value="">Tidak ada data</option>
                        @endforelse
                    @endslot    
                    @slot('latitude')
                        {{$mou->latitude}}
                    @endslot
                    @slot('longitude')
                        {{$mou->longitude}}
                    @endslot
                    @slot('nomor_mou')
                        {{$mou->nomor_mou}}
                    @endslot
                    @slot('nomor_mou_pengusul')
                        {{$mou->nomor_mou_pengusul}}
                    @endslot
                    @slot('pejabat_penandatangan')
                        {{$mou->pejabat_penandatangan}}
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
                        @php
                            echo date("d-m-Y", strtotime($mou->tanggal_mulai))                                    
                        @endphp
                    @endslot
                    @slot('tanggal_berakhir')
                        @php
                            echo date("d-m-Y", strtotime($mou->tanggal_berakhir))                                    
                        @endphp                        
                    @endslot
                    @slot('metode_pertemuan')
                        {{$mou->metode_pertemuan}}
                    @endslot
                    @slot('tanggal_pertemuan')
                        @php
                            echo date("d-m-Y", strtotime($mou->tanggal_pertemuan))                                    
                        @endphp                           
                    @endslot
                    @slot('waktu_pertemuan')
                        {{$mou->waktu_pertemuan}}
                    @endslot
                    @slot('tempat_pertemuan')
                        {{$mou->tempat_pertemuan}}
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

@endpush


