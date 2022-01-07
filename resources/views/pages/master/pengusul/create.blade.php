@extends('templates/dashboard')

@section('title')
{{__('pages/master/pengusul.titleCreate')}}
@endsection

@section('subTitle')
{{__('pages/master/pengusul.title')}}
@endsection


@push('style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
<style>
    #peta {
        height: 400px;
    }

</style>
@endpush

@section('content')
<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{__('pages/master/pengusul.titleCard')}}
                    </div>
                    <div class="card-category">{{__('pages/master/pengusul.subTitleCard')}}</div>
                </div>
                <div class="card-body">
                    <form id="form-tambah">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="nama">{{__('pages/master/pengusul.nama')}}</label>
                                <input type="text" class="form-control" id="nama"
                                    placeholder="{{__('pages/master/pengusul.placeholderNama')}}">
                                <span class="text-danger error-text nama-error"></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="alamat">{{__('pages/master/pengusul.alamat')}}</label>
                                <textarea class="form-control" id="alamat" rows="3"
                                    placeholder="{{__('pages/master/pengusul.placeholderAlamat')}}"></textarea>
                                <span class="text-danger error-text alamat-error"></span>
                            </div>
                        </div>
                        {{-- REGION : Africa, America, Asia, Europe, Oceania, Polar --}}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">{{__('pages/master/pengusul.region')}}</label>
                                <select class="form-control" id="region" onchange="getListNegara()">
                                    <option hidden selected value="">{{__('pages/master/pengusul.placeholderRegion')}}
                                    </option>
                                    <option value="Africa">Africa</option>
                                    <option value="Americas">Americas</option>
                                    <option value="Asia">Asia</option>
                                    <option value="Europe">Europe</option>
                                    <option value="Oceania">Oceania</option>
                                    <option value="Polar">Polar</option>
                                </select>
                                <span class="text-danger error-text region-error"></span>
                            </div>
                            <div class="form-group col-md-12" id="form-negara" onchange="getListProvinsi()">
                                <label for="inputPassword4">{{__('pages/master/pengusul.negara')}}</label>
                                <select class="form-control" id="negara">
                                </select>
                                <span class="text-danger error-text negara-error"></span>
                            </div>
                            <div class="form-group col-md-12" id="form-provinsi" style="text-transform :capitalize;">

                            </div>
                            <div class="form-group col-md-12" id="form-kota" style="text-transform :capitalize;">

                            </div>
                            <div class="form-group col-md-12" id="form-kecamatan" style="text-transform :capitalize;">

                            </div>
                            <div class="form-group col-md-12" id="form-kelurahan" style="text-transform :capitalize;">

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="latitude">{{__('pages/master/pengusul.lokasi')}}</label>
                                <div id="peta"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="latitude">{{__('pages/master/pengusul.latitude')}}</label>
                                <input type="text" class="form-control" id="latitude"
                                    placeholder="{{__('pages/master/pengusul.placeholderLatitude')}}" oninput="this.value
                                    = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <span class="text-danger error-text latitude-error"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="longitude">{{__('pages/master/pengusul.longitude')}}</label>
                                <input type="text" class="form-control" id="longitude"
                                    placeholder="{{__('pages/master/pengusul.placeholderLongitude')}}" oninput="this.value
                                    = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <span class="text-danger error-text longitude-error"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="telepon">{{__('pages/master/pengusul.telepon')}}</label>
                                <input type="text" class="form-control" id="telepon"
                                    placeholder="{{__('pages/master/pengusul.placeholderTelepon')}}" oninput="this.value
                                    = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <span class="text-danger error-text telepon-error"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group ml-auto">
                                <button type="submit" class="btn btn-success">{{__('components/button.save')}}</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</section>


@endsection

@push('script')
<script>
    $(document).ready(function () {
        $('#form-negara').hide();
        $('#form-provinsi').hide();
        $('#form-kota').hide();
        $('#form-kecamatan').hide();
        $('#form-kelurahan').hide();
        $('#region').select2({
            placeholder: "{{__('pages/master/pengusul.placeholderRegion')}}",
            theme: "bootstrap"
        });
    })

    $('#form-tambah').on('submit', function (e) {
        e.preventDefault();

        resetForm();

        var _token = "{{csrf_token()}}";
        var nama = $('#nama').val();
        var alamat = $('#alamat').val();
        var region = $('#region').val();
        var negara = $('#negara').val();
        var provinsi = $('#provinsi').val();
        var kota = $('#kota').val();
        var kecamatan = $('#kecamatan').val();
        var kelurahan = $('#kelurahan').val();
        var latitude = $('#latitude').val();
        var longitude = $('#longitude').val();
        var telepon = $('#telepon').val();

        $.ajax({
            url: "/pengusul",
            type: "POST",
            data: {
                _token: _token,
                nama: nama,
                alamat: alamat,
                region: region,
                negara: negara,
                provinsi: provinsi,
                kota: kota,
                kecamatan: kecamatan,
                kelurahan: kelurahan,
                latitude: latitude,
                longitude: longitude,
                telepon: telepon,
            },
            success: function (data) {
                if ($.isEmptyObject(data.error)) {
                    swal("{{__('components/sweetalert.alertBerhasil')}}",
                        "{{__('components/sweetalert.msgTambahBerhasil',['nama' => __('pages/master/pengusul.title')])}}", {
                            icon: "success",
                            buttons: false,
                        });
                    // $('#modal-tambah').modal('hide');
                    // table.draw();
                    resetForm();
                    setTimeout(
                        function () {
                            $(location).attr('href', '{{url("/pengusul")}}');
                        }, 2000);
                } else {
                    printErrorMsg(data.error);
                }
            },
        })
    })

    function getListNegara() {
        var region = $('#region').val();
        $('#negara').html('');
        $('#form-provinsi').html('');
        $('#form-kota').html('');
        $('#form-kecamatan').html('');
        $('#form-kelurahan').html('');

        $('#form-provinsi').hide();
        $('#form-kota').hide();
        $('#form-kecamatan').hide();
        $('#form-kelurahan').hide();
        $.ajax({
            url: "/listNegara",
            type: "GET",
            data: {
                region: region
            },
            success: function (data) {
                if (data.res == 'success') {
                    $('#form-negara').show();
                    $('#negara').append(data.html);
                    $('#negara').select2({
                        placeholder: "{{__('components/list.placeholderNegara')}}",
                        theme: "bootstrap"
                    });

                    $('#form-provinsi').hide();
                    $('#provinsi').html('');
                }
            },
        })
    }

    function getListProvinsi() {
        var negara = $('#negara').val();
        $('#form-provinsi').html('');
        $.ajax({
            url: "/listProvinsi",
            type: "GET",
            data: {
                negara: negara
            },
            success: function (data) {
                if (data.res == 'success') {
                    $('#form-kota').html('');
                    $('#form-kecamatan').html('');
                    $('#form-kelurahan').html('');
                    $('#form-provinsi').show();
                    $('#form-provinsi').append(data.html);

                    if (data.type == 'select') {
                        $('#provinsi').select2({
                            placeholder: "{{__('pages/master/pengusul.placeholderSelectProvinsi')}}",
                            theme: "bootstrap"
                        });
                    } else {
                        // $('#provinsi').select2('destroy');
                        getListKota();
                    }
                }
            },
        })
    }

    function getListKota() {
        var provinsi = $('#provinsi').val();
        $('#form-kota').html('');
        $.ajax({
            url: "/listKota",
            type: "GET",
            data: {
                provinsi: provinsi
            },
            success: function (data) {
                if (data.res == 'success') {
                    $('#form-kota').show();
                    $('#form-kota').append(data.html);

                    $('#form-kecamatan').html('');
                    $('#form-kelurahan').html('');

                    if (data.type == 'select') {
                        $('#kota').select2({
                            placeholder: "{{__('pages/master/pengusul.placeholderSelectKota')}}",
                            theme: "bootstrap"
                        });
                    } else {
                        // $('#kota').select2('destroy');
                        getListKecamatan();
                    }
                }
            },
        })
    }

    function getListKecamatan() {
        var kota = $('#kota').val();
        $('#form-kecamatan').html('');
        $.ajax({
            url: "/listKecamatan",
            type: "GET",
            data: {
                kota: kota
            },
            success: function (data) {
                if (data.res == 'success') {
                    $('#form-kelurahan').html('');
                    $('#form-kecamatan').show();
                    $('#form-kecamatan').append(data.html);

                    if (data.type == 'select') {
                        $('#kecamatan').select2({
                            placeholder: "{{__('pages/master/pengusul.placeholderSelectKecamatan')}}",
                            theme: "bootstrap"
                        });
                    } else {
                        // $('#kecamatan').select2('destroy');
                        getListKelurahan();
                    }
                }
            },
        })
    }

    function getListKelurahan() {
        var kecamatan = $('#kecamatan').val();
        $('#form-kelurahan').html('');
        $.ajax({
            url: "/listKelurahan",
            type: "GET",
            data: {
                kecamatan: kecamatan
            },
            success: function (data) {
                if (data.res == 'success') {
                    $('#form-kelurahan').show();
                    $('#form-kelurahan').append(data.html);

                    if (data.type == 'select') {
                        $('#kelurahan').select2({
                            placeholder: "{{__('pages/master/pengusul.placeholderSelectKelurahan')}}",
                            theme: "bootstrap"
                        });
                    } else {
                        $('#kelurahan').select2('destroy');
                    }
                }
            },
        })
    }

    function printErrorMsg(msg) {
        $.each(msg, function (key, value) {
            $('.' + key + '-error').text(value);
        });
    }

    function resetForm() {
        $('.nama-error').text('');
        $('.alamat-error').text('');
        $('.region-error').text('');
        $('.negara-error').text('');
        $('.provinsi-error').text('');
        $('.kota-error').text('');
        $('.kecamatan-error').text('');
        $('.kelurahan-error').text('');
        $('.latitude-error').text('');
        $('.longitude-error').text('');
        $('.telepon-error').text('');
    }

</script>
<script>
    var map = L.map("peta").setView([-0.9006266, 119.8879643], 15);

    var tiles = L.tileLayer(
        "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYW1pcnVsaGlkYXlhaCIsImEiOiJja3hlNGxicnQxY3lyMndxOTVxNndpMGdjIn0.WvONFefMPNi0U8JZEsJcIw", {
            maxZoom: 17,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: "mapbox/streets-v11",
            tileSize: 512,
            zoomOffset: -1,
        }
    ).addTo(map);

    var marker = L.marker([-0.9006266, 119.8879643]).addTo(map);

    function updateMarker(lat, lng) {
        marker
            .setLatLng([lat, lng])
            .bindPopup("Lokasi Pilihan : " + marker.getLatLng().toString())
            .openPopup();
        return false;
    }

    map.on("click", function (e) {
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);
        $("#latitude").val(latitude);
        $("#longitude").val(longitude);
        updateMarker(latitude, longitude);
    });

    var updateMarkerByInputs = function () {
        return updateMarker($("#latitude").val(), $("#longitude").val());
    };

    $("#latitude").on("input", updateMarkerByInputs);
    $("#longitude").on("input", updateMarkerByInputs);

</script>
@endpush
