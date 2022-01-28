@extends('templates/dashboard')

@section('title-tab')
| {{__('pages/moa/create.title')}}
@endsection

@section('title')
{{__('pages/moa/create.title')}}
@endsection

@section('subTitle')
{{__('pages/moa/create.subTitle')}}
@endsection

@push('style')
@endpush

@section('content')
<section>    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{__('pages/moa/create.card-title')}}
                    </div>
                    <div class="card-category">{{__('pages/moa/create.card-category')}}</div>                    
                </div>
                @component('components/forms/mou_moa_ia')
                    @slot('form_method')
                        POST                    
                    @endslot
                    @slot('form_id')
                        form_moa
                    @endslot                    
                    @slot('form_action')
                        /moa
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
                                longitude="{{$item->longitude}}" alamat="{{$item->alamat}}" value="{{$item->id}}">{{$item->nama}}</option>                                       
                        @empty
                            <option value="">Tidak ada data</option>
                        @endforelse
                    @endslot   
                    @slot('nomor_mou_pengusul')
                        @forelse ($nomor_mou_pengusul as $item)
                            <option value="{{$item->id}}">{{$item->nomor_mou_pengusul}} - {{$item->pengusul->nama}}</option>
                        @empty
                            <option value="">Tidak ada data</option>
                        @endforelse
                    @endslot   
                    @slot('document_category')
                        MOA
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>           
</section>

@endsection

@push('script')   
@endpush
