@extends('templates/dashboard')

@section('title-tab')
    {{ __('components/navBottom.pohonKerjaSama') }} | {{ __('pages/moa/index.title') }}
@endsection

@section('title')
    {{ __('components/navBottom.pohonKerjaSama') }} {{ __('pages/moa/index.title') }}
@endsection

@section('subTitle')
    {{ __('components/navBottom.pohonKerjaSama') }} {{ __('pages/moa/index.subTitle') }}
@endsection

@push('style')
@endpush

@section('content')
    <section>
        @component('components.tables.pohon_kerja_sama_moa')
            @slot('thead_nomor')
                {{ __('components/table.nomor') }}
            @endslot
            @slot('thead_nomor_mou_moa_ia')
                {{ __('components/table.nomor_moa_pengusul') }}
            @endslot
            @slot('thead_pengusul')
                {{ __('components/table.instansi_pengusul') }}
            @endslot
            @slot('thead_dibuat_oleh')
                {{ __('components/table.dibuat_oleh') }}
            @endslot
            @slot('thead_jumlah_moa')
                {{ __('components/table.jumlah_moa') }}
            @endslot
            @slot('thead_jumlah_ia')
                {{ __('components/table.jumlah_ia') }}
            @endslot
            @slot('thead_aksi')
                {{ __('components/table.aksi') }}
            @endslot

            @slot('tbody_nomor_mou_moa_ia')
                nomor_moa_pengusul
            @endslot

            @slot('link')
                /pohon-kerja-sama/moa
            @endslot

            @slot('filterStatus')
                <div class="row mb-3">
                    <div class="col-lg-6 col-12">
                        <div class="form-group px-0">
                            <label for="my-select" class="font-weight-bold">{{ __('components/table.dibuat_oleh') }}</label>
                            <select id="dibuat-oleh" class="form-control select2">
                                <option value="">{{ __('components/table.semua') }}</option>
                                <option value="Admin">Admin</option>
                                @forelse ($user as $item)
                                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                @empty
                                    <option value="">{{ __('components/table.tidak_ada') }}</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="form-group px-0">
                            <label for="my-select" class="font-weight-bold">Status</label>
                            <select id="status" class="form-control select2">
                                <option value="">{{ __('components/table.semua') }}</option>
                                <option value="aktif">{{ __('components/span.aktif') }}</option>
                                <option value="masa_tenggang">{{ __('components/span.masa_tenggang') }}</option>
                                <option value="kadaluarsa">{{ __('components/span.kadaluarsa') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            @endslot
        @endcomponent
    </section>
@endsection

@push('script')
@endpush
