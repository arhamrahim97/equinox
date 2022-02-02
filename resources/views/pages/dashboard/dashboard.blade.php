@extends('templates/dashboard')

@section('title-tab')
| {{__('pages/dashboard/dashboard.title')}}
@endsection

@section('title')
{{__('pages/dashboard/dashboard.title')}}
@endsection

@section('subTitle')
{{__('pages/dashboard/dashboard.subTitle')}}
@endsection


@push('style')
<style>
    .stamp-md {
        min-width: 5.5rem;
        height: 5.5rem;
        line-height: 5.5rem;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-sm-6 col-lg-4">
        <div class="card p-3">
            <div class="d-flex align-items-center">
                <span class="stamp stamp-md bg-success mr-3">
                    <i class="fas fa-file fa-3x my-4"></i>
                </span>
                <div style="width: 100%">
                    <h4 class="fw-bold">{{__('pages/dashboard/dashboard.dokumen_mou')}}</h4>
                    {{--
                    <hr class="my-2"> --}}
                    <h5 class="mb-1">{{__('pages/dashboard/dashboard.total_dokumen')}}<b>{{$totalMou}}</b></h5>
                    <hr class="my-2">
                    <span class="badge badge-success bg-success"> {{ __('components/span.aktif') }} :
                        {{$mouAktif}}</span>
                    <span class="badge badge-warning bg-warning">{{ __('components/span.masa_tenggang') }} :
                        {{$mouMasaTenggang}}</span>
                    <span class="badge badge-danger bg-danger"> {{ __('components/span.kadaluarsa') }} :
                        {{$mouKadaluarsa}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="card p-3">
            <div class="d-flex align-items-center">
                <span class="stamp stamp-md bg-success mr-3">
                    <i class="fas fa-file fa-3x my-4"></i>
                </span>
                <div style="width: 100%">
                    <h4 class="fw-bold">{{__('pages/dashboard/dashboard.dokumen_moa')}}</h4>
                    {{--
                    <hr class="my-2"> --}}
                    <h5 class="mb-1">{{__('pages/dashboard/dashboard.total_dokumen')}}<b>{{$totalMoa}}</b></h5>
                    <hr class="my-2">
                    <span class="badge badge-success bg-success"> {{ __('components/span.aktif') }} :
                        {{$moaAktif}}</span>
                    <span class="badge badge-warning bg-warning">{{ __('components/span.masa_tenggang') }} :
                        {{$moaMasaTenggang}}</span>
                    <span class="badge badge-danger bg-danger"> {{ __('components/span.kadaluarsa') }} :
                        {{$moaKadaluarsa}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="card p-3">
            <div class="d-flex align-items-center">
                <span class="stamp stamp-md bg-success mr-3">
                    <i class="fas fa-file fa-3x my-4"></i>
                </span>
                <div style="width: 100%">
                    <h4 class="fw-bold">{{__('pages/dashboard/dashboard.dokumen_ia')}}</h4>
                    {{--
                    <hr class="my-2"> --}}
                    <h5 class="mb-1">{{__('pages/dashboard/dashboard.total_dokumen')}}<b>{{$totalIa}}</b></h5>
                    <hr class="my-2">
                    <span class="badge badge-success bg-success"> {{ __('components/span.aktif') }} :
                        {{$iaAktif}}</span>
                    <span class="badge badge-primary bg-primary"> {{ __('components/span.selesai') }} :
                        {{$iaSelesai}}</span>
                    <span class="badge badge-danger bg-danger"> {{ __('components/span.melewati_batas') }} :
                        {{$iaMelewatiBatas}}</span>
                    @if (Auth::user()->role == "Admin")
                    <span class="badge badge-danger bg-warning"> {{ __('components/span.surat_tugas') }} :
                        {{$iaSuratTugas}}</span>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-12">
        <div class="card p-3">
            <div class="d-flex align-items-center">
                <span class="stamp stamp-md bg-primary mr-3">
                    <i class="fas fa-money-bill-wave fa-3x my-4"></i>
                </span>
                <div style="width: 100%">
                    <h4 class="fw-bold">{{__('pages/dashboard/dashboard.total_pemasukan')}}</h4>
                    {{--
                    <hr class="my-2"> --}}
                    <h5 class="mb-1">Rp. <b>{{number_format($totalPemasukan,0,',','.')}}</b></h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">{{__('pages/dashboard/dashboard.negara_pengusul')}}</div>

                    <div class="card-tools">
                        <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-today" data-toggle="pill" href="#" role="tab"
                                    aria-selected="true"
                                    onclick="initializeTablePengusul('mou')">{{__('pages/dashboard/dashboard.mou')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-week" data-toggle="pill" href="#" role="tab"
                                    aria-selected="false"
                                    onclick="initializeTablePengusul('moa')">{{__('pages/dashboard/dashboard.moa')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-month" data-toggle="pill" href="#" role="tab"
                                    aria-selected="false"
                                    onclick="initializeTablePengusul('ia')">{{__('pages/dashboard/dashboard.ia')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table table-bordered yajra-datatable" style="width: 100%">
                        <thead>
                            <tr>
                                <th>{{__('components/table.nomor')}}</th>
                                <th>{{__('components/table.negara')}}</th>
                                <th>{{__('components/table.total')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    var urlAjax = "{{ url('/getTotalNegaraMou') }}";

    $(document).ready(function(){
        initializeTablePengusul('mou');
    })

    function initializeTablePengusul(dokumen){
        if (dokumen == 'mou'){
            urlAjax = "{{ url('/getTotalNegaraMou') }}";
        } else if (dokumen == 'moa'){
            urlAjax = "{{ url('/getTotalNegaraMoa') }}";
        } else if (dokumen == 'ia'){
            urlAjax = "{{ url('/getTotalNegaraIa') }}";
        }
        $('.yajra-datatable').DataTable().clear().destroy();
        reinitializeTable();
    }
    function reinitializeTable(){
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        searching : false,
        destroy : true,
        info : false,
        ajax: urlAjax,
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                class : 'text-center'
            },
            {
                data: 'negara',
                name: 'negara',
                class : 'fw-bold text-center'
            },
            {
                data: 'total',
                name: 'total',
                class : 'text-center'
            },
        ]
    });
    }


</script>
@endpush
