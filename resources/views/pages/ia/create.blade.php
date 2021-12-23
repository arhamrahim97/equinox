@extends('templates/dashboard')

@section('title-tab')
| {{__('pages/ia/create.title')}}
@endsection

@section('title')
{{__('pages/ia/create.title')}}
@endsection

@section('subTitle')
{{__('pages/ia/create.subTitle')}}
@endsection

@push('style')

@endpush

@section('content')
<section>    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{__('pages/ia/create.card-title')}}
                    </div>
                    <div class="card-category">{{__('pages/ia/create.card-category')}}</div>                    
                </div>
                @component('components/forms/mou_moa_ia')
                    @slot('form_method')
                        POST                    
                    @endslot
                    @slot('form_id')
                        form_ia
                    @endslot
                    @slot('form_action')
                        /ia
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
                                longitude="{{$item->longitude}}" value="{{$item->id}}">{{$item->nama}}</option>                                       
                        @empty
                            <option value="">Tidak ada data</option>
                        @endforelse
                    @endslot      
                    @slot('document_category')
                        IA
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>           
</section>

@endsection

@push('script')

@endpush
