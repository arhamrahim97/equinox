@extends('templates/dashboard')

@section('title-tab')
| {{__('pages/ia/borangIa/index.title')}}
@endsection

@section('title')
{{__('pages/ia/borangIa/index.title')}}
@endsection

@section('subTitle')
{{__('pages/ia/borangIa/index.subTitle')}}
@endsection

@push('style')

@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{__('pages/master/rekapitulasi.filteringData')}}</h4>
            </div>
            <div class="card-body">
                <form id="rekapitulasi-form" method="POST" enctype="multipart/form-data"
                    action="{{url('/exportBorangIa')}}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-2">
                            <div class="form-group">
                                <label
                                    class="form-label d-block">{{__('pages/ia/borangIa/index.jenis_kerjasama')}}</label>
                                <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="jenisKerjasama[]" value="Penelitian"
                                            class="selectgroup-input filter" checked>
                                        <span class="selectgroup-button">{{__('components/span.penelitian')}}</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="jenisKerjasama[]" value="Pendidikan"
                                            class="selectgroup-input filter" checked>
                                        <span class="selectgroup-button">{{__('components/span.pendidikan')}}</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="jenisKerjasama[]"
                                            value="Pengabdian Kepada Masyarakat" class="selectgroup-input filter"
                                            checked>
                                        <span
                                            class="selectgroup-button">{{__('components/span.pengabdian_kepada_masyarakat')}}</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-2">
                            <div class="form-group">
                                <label class="form-label d-block">{{__('pages/ia/borangIa/index.tingkat')}}</label>
                                <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="tingkat[]" value="internasional"
                                            class="selectgroup-input filter" checked>
                                        <span class="selectgroup-button">{{__('components/span.internasional')}}</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="tingkat[]" value="nasional"
                                            class="selectgroup-input filter" checked>
                                        <span class="selectgroup-button">{{__('components/span.nasional')}}</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="tingkat[]" value="lokal"
                                            class="selectgroup-input filter" checked>
                                        <span class="selectgroup-button">{{__('components/span.lokal')}}</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label>{{__('pages/ia/borangIa/index.tanggal_pembuatan')}}</label>
                                <div class="form-group form-show-validation row mt-0 pt-0 px-0">
                                    <label for="name" class="col-lg-1 col-md-1 col-sm-4 mt-sm-2 text-left mr-3"
                                        style="font-weight: normal">{{__('pages/ia/borangIa/index.mulai')}}
                                    </label>
                                    <div class="col-lg-4 col-md-9 col-sm-8 mb-1">
                                        <input name="dariTanggal" id="dari_tanggal" type="date"
                                            class="form-control filter">
                                        <span class="text-danger error-text dari_tanggal-error"></span>
                                    </div>
                                    <label for="name" class="col-lg-1 col-md-1 col-sm-4 mt-sm-2 text-left mr-4"
                                        style="font-weight: normal">{{__('pages/ia/borangIa/index.sampai')}} </label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input name="sampaiTanggal" id="sampai_tanggal" type="date"
                                            class="form-control filter">
                                        <span class="text-danger error-text sampai_tanggal-error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <button href="{{url('/exportBorangIa')}}" class="btn btn-primary" target="_blank"
                                type="submit">Export
                                Excel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <table class="table table-bordered yajra-datatable display nowrap" width='100%'>
        <thead class="text-center">
            <tr>
                <th rowspan="2">{{__('components/table.nomor')}}</th>
                <th rowspan="2">{{__('components/table.lembaga_mitra')}}</th>
                <th rowspan="2">{{__('components/table.tipe_kerjasama')}}</th>
                <th colspan="3">{{__('components/table.tingkat')}}</th>
                <th rowspan="2">{{__('components/table.judul_kegiatan_kerjasama')}}</th>
                <th rowspan="2">{{__('components/table.manfaat')}}</th>
                <th rowspan="2">{{__('components/table.waktu_dan_durasi')}}</th>
                <th rowspan="2">{{__('components/table.bukti_kerjasama')}}</th>
            </tr>
            <tr>
                <th>{{__('components/table.internasional')}}</th>
                <th>{{__('components/table.nasional')}}</th>
                <th>{{__('components/table.lokal')}}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@endsection

@push('script')

<script>
    var jenisKerjasama = [];
    var tingkat = [];
    var dariTanggal = $('#dari_tanggal').val();
    var sampaiTanggal = $('#sampai_tanggal').val();

    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: {
                url: "{{ url('borangIa') }}",
                data: function (d) {
                d.jenisKerjasama = jenisKerjasama,
                d.tingkat = tingkat,
                d.dariTanggal = dariTanggal,
                d.sampaiTanggal = sampaiTanggal,
                d.search = $('input[type="search"]').val();
                }
        },
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false,
                responsive: true,
                class : 'text-center'
            },
            {
                data: 'lembaga_mitra',
                name: 'lembaga_mitra'
            },
            {
                data: 'tipe_kerjasama',
                name: 'tipe_kerjasama'
            },
            {
                data: 'internasional',
                name: 'internasional',
                class : 'text-center'
            },
            {
                data: 'nasional',
                name: 'nasional',
                class : 'text-center'
            },
            {
                data: 'lokal',
                name: 'lokal',
                class : 'text-center'
            },
            {
                data: 'program',
                name: 'program'
            },
            {
                data: 'manfaat',
                name: 'manfaat'
            },
            {
                data: 'waktu_dan_durasi',
                name: 'waktu_dan_durasi',
                class : 'text-center',
                width : '20%'
            },
            {
                data: 'bukti_dan_kerjasama',
                name: 'bukti_dan_kerjasama'
            },
        ]
    });

</script>

<script>
    $(document).ready(function () {
        $('#nav-ia').addClass('active');
    })

    $('.filter').change(function () {
        jenisKerjasama = [];
        dariTanggal = $('#dari_tanggal').val();
        sampaiTanggal = $('#sampai_tanggal').val();
        $("input:checkbox[name='jenisKerjasama[]']:checked").each(function() {
            jenisKerjasama.push($(this).val());
        });
        tingkat = [];
        $("input:checkbox[name='tingkat[]']:checked").each(function() {
            tingkat.push($(this).val());
        });
        table.draw();
    })

    $('.tanggal').mask('00-00-0000');
</script>
@endpush
