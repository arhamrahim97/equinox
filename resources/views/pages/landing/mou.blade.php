@extends('templates/landing')

@section('title-tab')
{{__('pages/landing/mou.title')}}
@endsection

@push('style')
@endpush

@section('content')
<!-- start page title -->
<section class="half-section bg-light-gray parallax" data-parallax-background-ratio="0.5"
    style="background-image:url('images/portfolio-bg2.jpg');">
    <div class="container">
        <div class="row align-items-stretch justify-content-center extra-small-screen">
            <div
                class="col-12 col-xl-6 col-lg-7 col-md-8 page-title-extra-small text-center d-flex justify-content-center flex-column">
                <h1 class="alt-font text-gradient-sky-blue-pink margin-15px-bottom d-inline-block">
                    {{__('pages/landing/mou.mou')}}</h1>
                <h2
                    class="text-extra-dark-gray alt-font font-weight-500 letter-spacing-minus-1px line-height-50 sm-line-height-45 xs-line-height-30 no-margin-bottom">
                    {{__('pages/landing/mou.daftar_mou')}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <select class="small-input bg-white margin-20px-bottom filterBerkas" id="region" name="kategori"
                    onchange="getListNegara()">
                    <option selected hidden value="">{{__('pages/landing/mou.pilih_region')}}</option>
                    <option value="">{{__('pages/landing/mou.semua')}}</option>
                    <option value="Africa">Africa</option>
                    <option value="Americas">Americas</option>
                    <option value="Asia">Asia</option>
                    <option value="Europe">Europe</option>
                    <option value="Oceania">Oceania</option>
                    <option value="Polar">Polar</option>
                </select>
            </div>
            <div class="col-lg-5">
                <select class="small-input bg-white margin-20px-bottom filterBerkas" id="negara" name="kategori">
                </select>
            </div>
            <div class="col-lg-2">
                <select class="small-input bg-white margin-20px-bottom filterBerkas" id="status">
                    <option selected hidden value="">{{__('pages/landing/mou.pilih_status')}}</option>
                    <option value="">{{__('pages/landing/mou.semua')}}</option>
                    <option value="Aktif">{{__('pages/landing/mou.aktif')}}</option>
                    <option value="Masa Tenggang">{{__('pages/landing/mou.masa_tenggang')}}</option>
                    <option value="Kadaluarsa">{{__('pages/landing/mou.kadaluarsa')}}</option>
                </select>
            </div>
        </div>
    </div>
</section>
<!-- end page title -->
<!-- start section -->
<section class="bg-light-gray pt-0 padding-eleven-lr xl-padding-two-lr xs-no-padding-lr">
    <div class="container-fluid">
        <div class="row">
            <table class="table table-bordered yajra-datatable display nowrap" style="width: 100%">
                <thead>
                    <tr>
                        <th>{{__('components/table.nomor')}}</th>
                        <th>{{__('components/table.instansi_pengusul')}}</th>
                        <th>{{__('components/table.region')}}</th>
                        <th>{{__('components/table.negara')}}</th>
                        <th>{{__('components/table.tanggal_mulai')}}</th>
                        <th>{{__('components/table.tanggal_berakhir')}}</th>
                        <th>{{__('components/table.program')}}</th>
                        <th>{{__('components/table.status')}}</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- end section -->
@endsection

@push('script')
<script>
    $(document).ready(function () {
        getListNegara();
    })

    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ordering : false,
        // autoWidth : true,
        ajax: {
            url: "{{ url('/daftarMou') }}",
                data: function (d) {
                    d.region = $('#region').val();
                    d.negara = $('#negara').val();
                    d.status = $('#status').val();
                    d.search = $('input[type="search"]').val();
                }
            },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false,
                class : 'text-center'
            },
            {
                data: 'pengusul',
                name: 'pengusul'
            },
            {
                data: 'region',
                name: 'region'
            },
            {
                data: 'negara',
                name: 'negara'
            },
            {
                data: 'tanggal_mulai',
                name: 'tanggal_mulai'
            },
            {
                data: 'tanggal_berakhir',
                name: 'tanggal_berakhir'
            },
            {
                data: 'program',
                name: 'program'
            },
            {
                data: 'status',
                name: 'status',
                class: 'text-center'
            },
        ]
    });

    function getListNegara() {
        var region = $('#region').val();
        var dokumen = 'mou';
        $.ajax({
            url: "/listNegaraTersedia",
            type: "GET",
            data: {
                region: region,
                dokumen : dokumen
            },
            success: function (data) {
                if (data.res == 'success') {
                    $('#negara').html('');
                    $('#negara').append(data.html);
                }
            },
        })
    }

    $('.filterBerkas').change(function () {
        table.draw();
    })

</script>
@endpush
