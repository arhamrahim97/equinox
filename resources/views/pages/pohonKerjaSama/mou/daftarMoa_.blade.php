@extends('templates/dashboard')

@section('title-tab')
    {{ __('components/navBottom.pohonKerjaSama') }} | {{ __('pages/mou/index.title') }}
@endsection

@section('title')
    {{ __('components/navBottom.pohonKerjaSama') }} {{ __('pages/mou/index.title') }}
@endsection

@section('subTitle')
    {{ __('components/navBottom.pohonKerjaSama') }} {{ __('pages/mou/index.subTitle') }}
@endsection

@push('style')
@endpush

@section('content')
    <section>
        <h4 class="font-weight-bold">{{ __('components/table.daftar_moa_untuk_mou') }}:</h4>
        <ul class="list-group list-group-bordered">
            <li class="list-group-item d-flex font-weight-bold py-2" style="font-size: 12pt">Info MOU
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center py-2">
                {{ __('components/table.nomor_mou_pengusul') }}
                <span class="font-weight-bold">{{ $mou->nomor_mou_pengusul }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center py-2">
                {{ __('components/table.instansi_pengusul') }}
                <span class="font-weight-bold">{{ $mou->pengusul->nama }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center py-2">Program
                <span class="font-weight-bold">{{ $mou->program }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center py-2">
                {{ __('components/table.dibuat_oleh') }}
                <span class="font-weight-bold">{{ $mou->user->nama }}</span>
            </li>
        </ul>
    </section>
    <section>
        @component('components.tables.daftar_moa_pohon')
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
                /pohon-kerja-sama/mou/moa/{{ $mou->id }}
            @endslot

            @slot('filterStatus')
                <div class="row mb-3">
                    <div class="col-lg-6 col-12">
                        <div class="form-group px-0">
                            <label for="my-select" class="font-weight-bold">{{ __('components/table.dibuat_oleh') }}</label>
                            <select id="dibuat-oleh" class="form-control select2">
                                <option value="">{{ __('components/table.semua') }}</option>
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
