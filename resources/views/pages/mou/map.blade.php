@extends('templates/dashboard')

@section('title')
{{__('pages/mou/map.title')}}
@endsection

@section('subTitle')
{{__('pages/mou/map.subTitle')}}
@endsection


@push('style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />

<style>
    #peta {
        height: 600px;
    }

    .legend {
        padding: 6px 8px;
        font: 14px Arial, Helvetica, sans-serif;
        background: white;
        background: rgba(255, 255, 255, 0.8);
        /*box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);*/
        /*border-radius: 5px;*/
        line-height: 24px;
        color: #555;
    }

    .legend h4 {
        text-align: center;
        font-size: 16px;
        margin: 2px 12px 8px;
        color: #777;
    }

    .legend span {
        position: relative;
        bottom: 3px;
    }

    .legend i {
        width: 18px;
        height: 18px;
        float: left;
        margin: 0 8px 0 0;
        opacity: 0.7;
    }

    .legend i.icon {
        background-size: 18px;
        background-color: rgba(255, 255, 255, 1);
    }
</style>
@endpush

@section('content')
<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{__('pages/mou/map.titleCard')}}
                    </div>
                    <div class="card-category">{{__('pages/mou/map.subTitleCard')}}</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col" id="mapSection">
                            <div id="peta"></div>
                            <div class="row mt-3">
                                <table class="table table-bordered yajra-datatable">
                                    <thead>
                                        <tr>
                                            <th>{{__('components/table.nomor')}}</th>
                                            <th>{{__('components/table.pengusul')}}</th>
                                            <th>{{__('components/table.alamat')}}</th>
                                            <th>{{__('components/table.program')}}</th>
                                            <th>{{__('components/table.tanggal_mulai')}}</th>
                                            <th>{{__('components/table.tanggal_berakhir')}}</th>
                                            <th>{{__('components/table.status')}}</th>
                                            <th>{{__('components/table.aksi')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-4" id="informasiMap" hidden>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{__('pages/mou/map.detail')}}</h5>
                                    <hr class="card-text">

                                    <p class="fw-bold mb-0 card-text">{{__('pages/mou/map.pengusul')}}</p>
                                    <p class="card-text" id="pengusul">-</p>
                                    <hr class="card-text">

                                    <p class="fw-bold mb-0 card-text">{{__('pages/mou/map.program')}}</p>
                                    <p class="card-text" id="program">-</p>
                                    <hr class="card-text">

                                    <p class="fw-bold mb-0 card-text">{{__('pages/mou/map.nomor_mou')}} </p>
                                    <p class="card-text" id="nomor_mou">-</p>
                                    <hr class="card-text">

                                    <p class="fw-bold mb-0 card-text">{{__('pages/mou/map.nomor_mou_pengusul')}} </p>
                                    <p class="card-text" id="nomor_mou_pengusul">-</p>
                                    <hr class="card-text">

                                    <p class="fw-bold mb-0 card-text">{{__('pages/mou/map.nik')}}</p>
                                    <p class="card-text" id="nik_nip_pengusul">-</p>
                                    <hr class="card-text">

                                    <p class="fw-bold mb-0 card-text">{{__('pages/mou/map.jabatan')}}</p>
                                    <p class="card-text" id="jabatan">-</p>
                                    <hr class="card-text">

                                    <p class="fw-bold mb-0 card-text">{{__('pages/mou/map.alamat')}}</p>
                                    <p class="card-text" id="alamat">-</p>
                                    <hr class="card-text">

                                    <p class="fw-bold mb-0 card-text">{{__('pages/mou/map.tanggal_mulai')}}</p>
                                    <p class="card-text" id="tanggal_mulai">-</p>
                                    <hr class="card-text">

                                    <p class="fw-bold mb-0 card-text">{{__('pages/mou/map.tanggal_berakhir')}}</p>
                                    <p class="card-text" id="tanggal_berakhir">-</p>
                                    <hr class="card-text">

                                    <p class="fw-bold mb-0 card-text">{{__('pages/mou/map.pertemuan')}}</p>
                                    <p class="card-text" id="pertemuan">-</p>
                                    <hr class="card-text">

                                    <p class="fw-bold mb-0 card-text">{{__('pages/mou/map.status')}}</p>
                                    <p class="card-text" id="status">-</p>

                                    <hr>
                                    <div class='row d-flex justify-content-center'>
                                        <a target='_blank' href='' class='btn btn-success my-1' id="linkDokumen">
                                            <i class='fas fa-file-download mr-1'>
                                            </i> {{__('pages/mou/map.unduh')}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('script')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>

<script>
    var _token = "{{csrf_token()}}";
    var icon = '';

    var map = L.map("peta").setView([-0.9006266, 119.8879643], 13);

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);

    var pin = L.Icon.extend({
        options: {
            iconSize: [50, 50],
            iconAnchor: [22, 94],
            shadowAnchor: [4, 62],
            popupAnchor: [-3, -76],
        },
    });

    var greenIcon = new pin({
        iconUrl: "{{asset('assets/dashboard/img/pin/green.png')}}",
    });
    var redIcon = new pin({
        iconUrl: "{{asset('assets/dashboard/img/pin/red.png')}}",
    });
    var yellowIcon = new pin({
        iconUrl: "{{asset('assets/dashboard/img/pin/yellow.png')}}",
    });

    $(document).ready(function () {
        $.ajax({
            url: "/getDataMapMou",
            type: "POST",
            data: {
                _token: _token
            },
            success: function (data) {
                for (var i = 0; i < data[0].length; i++) {
                    if (data[0][i].status == 'Aktif') {
                        icon = greenIcon;
                    } else if (data[0][i].status == 'Aktif (Kurang dari 1 tahun)') {
                        icon = yellowIcon;
                    } else {
                        icon = redIcon;
                    }
                    console.log(data[0][i].status);
                    L.marker([data[0][i].latitude, data[0][i].longitude], {
                            icon: icon
                        })
                        .bindPopup(
                            "<p class='fw-bold my-0'>" + data[0][i].nama_pengusul + "</p>" +
                            "<p class='my-0'>{{__('pages/mou/map.program')}} " + data[0][i].program + "</p>" +
                            "<p class='my-0'>{{__('pages/mou/map.alamat')}} " + data[0][i].alamat + "</p>" +
                            "<p class='my-0'>{{__('pages/mou/map.tanggal_berakhir')}} " + data[0][i].tanggal_berakhir + "</p>" +
                            "<p class='my-0'>{{__('pages/mou/map.status')}} " + data[0][i].status + "</p><hr>" +
                            "<div class='row d-flex justify-content-center'><a target='_blank' href='" + data[0][i].dokumen + "' class='btn btn-success btn-sm my-1'><i class='fas fa-file-download mr-1'> </i>{{__('pages/mou/map.unduh')}}</a></div>"
                        )
                        .on('click', L.bind(petaKlik, null, data[0][i].id))
                        .addTo(map);
                }
            },
        })
    })

    function petaKlik(id) {
        $.ajax({
            url: "/getDetailMou/" + id,
            type: "POST",
            data: {
                _token: _token
            },
            success: function (data) {
                $('#informasiMap').removeAttr('hidden');
                $('#mapSection').removeClass('col');
                $('#mapSection').addClass('col-lg-8');
                $('#nomor_mou').html(data.nomor_mou);
                $('#nomor_mou_pengusul').html(data.nomor_mou_pengusul);
                $('#pengusul').html(data.pengusul);
                $('#nik_nip_pengusul').html(data.nik_nip_pengusul);
                $('#jabatan').html(data.jabatan_pengusul);
                $('#program').html(data.program);
                $('#alamat').html(data.alamat);
                $('#tanggal_mulai').html(data.tanggal_mulai);
                $('#tanggal_berakhir').html(data.tanggal_berakhir);
                $('#pertemuan').html(data.pertemuan);
                $('#status').html(data.status);
                $('#linkDokumen').attr('href',data.dokumen);
            },
        })
    }

    /*Legend specific*/
    var legend = L.control({ position: "bottomleft" });

    legend.onAdd = function(map) {
    var div = L.DomUtil.create("div", "legend");
    div.innerHTML += "<h4>{{__('pages/mou/map.simbol')}}</h4>";
    div.innerHTML += '<div class="d-flex align-items-center"><img src="{{asset("assets/dashboard/img/pin/green.png")}}" width="25px"><span class="mt-2 ml-2 fw-bold">{{__("pages/mou/map.aktif")}}</span></div>';
    div.innerHTML += '<div class="d-flex align-items-center"><img src="{{asset("assets/dashboard/img/pin/yellow.png")}}" width="25px"><span class="mt-2 ml-2 fw-bold">{{__("pages/mou/map.kurang_1_tahun")}}</span></div>';
    div.innerHTML += '<div class="d-flex align-items-center"><img src="{{asset("assets/dashboard/img/pin/red.png")}}" width="25px"><span class="mt-2 ml-2 fw-bold">{{__("pages/mou/map.tidak_aktif")}}</span></div>';
    return div;
    };

    legend.addTo(map);

</script>
<script>
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: "{{ url('mapMou') }}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false,
                responsive: true,
            },
            {
                data: 'pengusul',
                name: 'pengusul'
            },
            {
                data: 'alamat',
                name: 'alamat'
            },
            {
                data: 'program',
                name: 'program'
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
                data: 'status',
                name: 'status'
            },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    });

</script>
<script>
    $(document).ready(function () {
        $('#nav-mou').addClass('active');
    })

</script>
@endpush
