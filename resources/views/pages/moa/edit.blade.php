@extends('templates/dashboard')

@section('title-tab')
| {{__('pages/moa/edit.title')}}
@endsection

@section('title')
{{__('pages/moa/edit.title')}}
@endsection

@section('subTitle')
{{__('pages/moa/edit.subTitle')}}
@endsection

@push('style')
@endpush

@section('content')
<section>    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{__('pages/moa/edit.card-title')}}
                    </div>
                    <div class="card-category">{{__('pages/moa/edit.card-category')}}</div>                    
                </div>               
                @component('components/edits/mou_moa_ia')
                    @slot('form_method')
                        POST                    
                    @endslot
                    @slot('form_id')
                        form_moa
                    @endslot                    
                    @slot('form_action')
                        /moa/{{$moa->id}}
                    @endslot
                    @slot('back')
                        /moa
                    @endslot
                    @slot('document_category')
                        MOA
                    @endslot   
                    @slot('id_ia')
                        {{$moa->id}}
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
                                longitude="{{$item->longitude}}" value="{{$item->id}}" @if(old('pengusul_id', $moa->pengusul->id) == $item->id) selected @endif>{{$item->nama}}</option>                                       
                        @empty
                            <option value="">Tidak ada data</option>
                        @endforelse
                    @endslot   
                    @slot('latitude')
                        {{$moa->latitude}}
                    @endslot
                    @slot('longitude')
                        {{$moa->longitude}}
                    @endslot
                    @slot('nomor_mou_pengusul')
                        @forelse ($nomor_mou_pengusul as $item)
                            <option value="{{$item->id}}" @if(old('nomor_mou_pengusul', $moa->mou_id) == $item->id)
                                selected
                            @endif>{{$item->nomor_mou_pengusul}} - {{$item->pengusul->nama}}</option>
                        @empty
                            <option value="">Tidak ada data</option>
                        @endforelse
                    @endslot    
                    @slot('nomor_moa')
                        {{$moa->nomor_moa}}
                    @endslot
                    @slot('nomor_moa_pengusul')
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
                        @php
                            echo date("d-m-Y", strtotime($moa->tanggal_mulai))                                    
                        @endphp
                    @endslot
                    @slot('tanggal_berakhir')
                        @php
                            echo date("d-m-Y", strtotime($moa->tanggal_berakhir))                                    
                        @endphp                        
                    @endslot
                    @slot('metode_pertemuan')
                        {{$moa->metode_pertemuan}}
                    @endslot
                    @slot('tanggal_pertemuan')
                        @php
                            echo date("d-m-Y", strtotime($moa->tanggal_pertemuan))                                    
                        @endphp                           
                    @endslot
                    @slot('waktu_pertemuan')
                        {{$moa->waktu_pertemuan}}
                    @endslot
                    @slot('tempat_pertemuan')
                        {{$moa->tempat_pertemuan}}
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
