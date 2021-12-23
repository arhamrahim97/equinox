@extends('templates/dashboard')

@section('title')
{{__('pages/master/akun.titleEdit')}}
@endsection

@section('subTitle')
{{__('pages/master/akun.title')}}
@endsection


@push('style')

@endpush

@section('content')
<form id="form-ubah">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="nama">{{__('pages/master/akun.nama')}}</label>
            <input type="text" class="form-control" id="nama" placeholder="{{__('pages/master/akun.placeholderNama')}}"
                value="{{$user->nama}}">
            <span class="text-danger error-text nama-error"></span>
        </div>
        <div class="form-group col-md-4">
            <label for="username">{{__('pages/master/akun.username')}}</label>
            <input type="text" class="form-control" id="username"
                placeholder="{{__('pages/master/akun.placeholderUsername')}}" value="{{$user->username}}">
            <span class="text-danger error-text username-error"></span>
        </div>
        <div class="form-group col-md-4">
            <label for="password">{{__('pages/master/akun.password')}}</label>
            <input type="text" class="form-control" id="password"
                placeholder="{{__('pages/master/akun.placeholderPassword')}}">
            <small id="emailHelp" class="form-text text-muted">{{__('pages/master/akun.notifPassword')}}</small>
            <span class="text-danger error-text password-error"></span>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputEmail4">{{__('pages/master/akun.role')}}</label>
            <select class="form-control" id="role" onchange="roleSelection()">
                <option hidden selected value="">{{__('pages/master/akun.placeholderRole')}}</option>
                <option value="Admin">Admin</option>
                <option value="Fakultas">Fakultas</option>
                <option value="Pascasarjana">Pascasarjana</option>
                <option value="PSDKU">PSDKU</option>
                <option value="LPPM">LPPM</option>
                <option value="Prodi">Prodi</option>
                <option value="Unit Kerja">Unit Kerja</option>
            </select>
            <span class="text-danger error-text role-error"></span>
        </div>
        <div class="form-group col-md-4" id="form-fakultas">
            <label for="inputEmail4">{{__('pages/master/akun.fakultas')}}</label>
            <select class="form-control" id="fakultas" onchange="getListProdi()">
            </select>
            <span class="text-danger error-text fakultas-error"></span>
        </div>
        <div class="form-group col-md-4" id="form-prodi">
            <label for="inputPassword4">{{__('pages/master/akun.prodi')}}</label>
            <select class="form-control" id="prodi">
            </select>
            <span class="text-danger error-text prodi-error"></span>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="statusAktif">{{__('pages/master/akun.statusAktif')}}</label>
            <select class="form-control" id="statusAktif">
                <option hidden selected value="">{{__('pages/master/akun.placeholderStatusAktif')}}</option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
            <span class="text-danger error-text statusAktif-error"></span>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group ml-auto">
            <button type="submit" class="btn btn-primary">{{__('components/button.save')}}</button>
        </div>
    </div>

</form>

@endsection

@push('script')
<script>
    var role = "{{$user->role}}";
    var fakultas = "{{$user->fakultas_id}}";
    var prodi = "{{$user->prodi_id}}";
    var statusAktif = "{{$user->status}}";

    $(document).ready(function () {
        $('#role').val(role);
        $('#statusAktif').val(statusAktif);


        $('#role').select2({
            placeholder: "{{__('pages/master/akun.placeholderRole')}}",
            theme: "bootstrap"
        });
        roleSelection();

        setTimeout(
            function () {
                setFakultas();
            }, 2000
        );

        setTimeout(
            function () {
                setProdi();
            }, 4000
        );
    })

    $('#form-ubah').on('submit', function (e) {
        e.preventDefault();

        resetForm();

        var _token = "{{csrf_token()}}";
        var nama = $('#nama').val();
        var username = $('#username').val();
        var password = $('#password').val();
        var role = $('#role').val();
        var fakultas = $('#fakultas').val();
        var prodi = $('#prodi').val();
        var statusAktif = $('#statusAktif').val();

        $.ajax({
            url: "/akun/" + "{{$user->id}}",
            type: "POST",
            data: {
                _token: _token,
                _method: 'PUT',
                nama: nama,
                username: username,
                password: password,
                role: role,
                fakultas: fakultas,
                prodi: prodi,
                statusAktif: statusAktif,
            },
            success: function (data) {
                if ($.isEmptyObject(data.error)) {
                    swal("{{__('components/sweetalert.alertBerhasil')}}",
                        "{{__('components/sweetalert.msgUbahBerhasil',['nama' => __('pages/master/akun.title')])}}", {
                            icon: "success",
                            buttons: false,
                        });
                    // $('#modal-tambah').modal('hide');
                    // table.draw();
                    resetForm();
                    setTimeout(
                        function () {
                            $(location).attr('href', '{{url("/akun")}}');
                        }, 2000);
                } else {
                    printErrorMsg(data.error);
                }
            },
        })
    })

    function roleSelection() {
        var role = $('#role').val();
        if (role == 'Admin' || role == 'LPPM') {
            hideFakultas();
            hideProdi();
        } else if (role == 'Fakultas' || role == 'Pascasarjana' || role == 'PSDKU') {
            hideProdi();
            showFakultas();
        } else if (role == 'Prodi' || role == 'Unit Kerja') {
            showFakultas();
            showProdi();
        } else {
            hideFakultas();
            hideProdi();
        }
    }

    function showFakultas() {
        $('#form-fakultas').show();

        $.ajax({
            url: "/listFakultas",
            type: "GET",
            success: function (data) {
                if (data.res == 'success') {
                    $('#fakultas').append(data.html);
                    $('#fakultas').select2({
                        placeholder: "{{__('components/list.placeholderFakultas')}}",
                        theme: "bootstrap"
                    });
                }
            },
        })

    }

    function showProdi() {
        $('#form-prodi').show();
        getListProdi();
    }

    function hideFakultas() {
        $('#form-fakultas').hide();
        $('#fakultas').empty();
    }

    function hideProdi() {
        $('#form-prodi').hide();
        $('#prodi').empty();
    }

    function getListProdi() {
        var idFakultas = $('#fakultas').val();
        var role = $('#role').val();
        if (role == 'Prodi' || role == "Unit Kerja") {
            $.ajax({
                url: "/listProdi",
                type: "GET",
                data: {
                    idFakultas: idFakultas,
                    role: role
                },
                success: function (data) {
                    if (data.res == 'success') {
                        $('#prodi').empty();
                        $('#prodi').append(data.html);
                        $('#prodi').select2({
                            placeholder: "{{__('components/list.placeholderProdi')}}",
                            theme: "bootstrap"
                        });
                    }
                },
            })
        }
    }

    function setFakultas() {
        if (role == 'Fakultas' || role == 'Pascasarjana' || role == 'PSDKU' || role == 'Prodi' || role ==
            'Unit Kerja') {
            $('#fakultas').val(fakultas).trigger('change');
        }
    }

    function setProdi() {
        if (role == 'Prodi' || role == 'Unit Kerja') {
            $('#prodi').val(prodi).trigger('change');
        }
    }

    function printErrorMsg(msg) {
        $.each(msg, function (key, value) {
            $('.' + key + '-error').text(value);
        });
    }

    function resetForm() {
        $('.nama-error').text('');
        $('.username-error').text('');
        $('.password-error').text('');
        $('.role-error').text('');
        $('.fakultas-error').text('');
        $('.prodi-error').text('');
        $('.statusAktif-error').text('');
    }

</script>
@endpush
