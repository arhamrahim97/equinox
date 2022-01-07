@extends('templates/dashboard')

@section('title-tab')
| {{__('pages/master/prodi.title')}}
@endsection

@section('title')
{{__('pages/master/prodi.title')}}
@endsection

@section('subTitle')
{{__('pages/master/prodi.subTitle')}}
@endsection

@push('style')

@endpush

@section('content')

<div class="row mb-3">
    <div class="col-12">
        <button class="btn btn-primary" id="btn-tambah">
            <span class="btn-label">
                <i class="fa fa-plus"></i>
            </span>
            {{__('components/button.add')}}
        </button>
    </div>

</div>


<div class="row">
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>{{__('components/table.nomor')}}</th>
                <th>{{__('components/table.nama')}}</th>
                <th>{{__('components/table.unitKerja')}}</th>
                <th>{{__('components/table.aksi')}}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

{{-- NOTE: Modal --}}
<div class="modal" tabindex="-1" role="dialog" id="modal-tambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('pages/master/prodi.modalTitleTambah')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-tambah">
                    <div class="form-group">
                        <label for="nama">{{__('pages/master/prodi.title')}}</label>
                        <input type="text" class="form-control" id="nama"
                            placeholder="{{__('pages/master/prodi.placeHolderTambah')}}">
                        <span class="text-danger error-text nama-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="unit-kerja">{{__('pages/master/prodi.unitKerja')}}</label>
                        <select class="form-control" id="unit-kerja">
                            <option hidden selected value="">{{__('pages/master/prodi.pilihUnit')}}</option>
                            <option value="0">{{__('pages/master/prodi.tidak')}}</option>
                            <option value="1">{{__('pages/master/prodi.ya')}}</option>
                        </select>
                        <span class="text-danger error-text unitKerja-error"></span>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">{{__('components/button.save')}}</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- NOTE: Modal Ubah--}}
<div class="modal" tabindex="-1" role="dialog" id="modal-ubah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('pages/master/prodi.modalTitleUbah')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-ubah">
                    <div class="form-group">
                        <label for="nama">{{__('pages/master/prodi.title')}}</label>
                        <input type="text" hidden id="id-edit">
                        <input type="text" class="form-control" id="nama-edit"
                            placeholder="{{__('pages/master/prodi.placeHolderTambah')}}">
                        <span class="text-danger error-text nama-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="unit-kerja-edit">{{__('pages/master/prodi.unitKerja')}}</label>
                        <select class="form-control" id="unit-kerja-edit">
                            <option hidden selected>{{__('pages/master/prodi.pilihUnit')}}</option>
                            <option value="0">{{__('pages/master/prodi.tidak')}}</option>
                            <option value="1">{{__('pages/master/prodi.ya')}}</option>
                        </select>
                        <span class="text-danger error-text unitKerja-error"></span>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">{{__('components/button.save')}}</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    $('#btn-tambah').click(function () {
        $('#modal-tambah').modal('show');
    })

    $('#form-tambah').on('submit', function (e) {
        e.preventDefault();
        $('.nama-error').text('');
        $('.unitKerja-error').text('');

        var _token = "{{csrf_token()}}";
        var nama = $('#nama').val();
        var unitKerja = $('#unit-kerja').val();

        $.ajax({
            url: "/prodi/{{$fakultas}}",
            type: "POST",
            data: {
                _token: _token,
                nama: nama,
                unitKerja: unitKerja,
                fakultas_id: "{{$fakultas}}"
            },
            success: function (data) {
                console.log(data);
                if ($.isEmptyObject(data.error)) {
                    swal("{{__('components/sweetalert.alertBerhasil')}}",
                        "{{__('components/sweetalert.msgTambahBerhasil',['nama' => __('pages/master/prodi.title')])}}", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                    className: 'btn btn-success'
                                }
                            },
                        });
                    $('#modal-tambah').modal('hide');
                    table.draw();
                    resetForm();
                } else {
                    printErrorMsg(data.error);
                }
            },
        })
    })

    $('#form-ubah').on('submit', function (e) {
        e.preventDefault();
        $('.nama-error').text('');
        $('.unitKerja-error').text('');

        var _token = "{{csrf_token()}}";
        var id = $('#id-edit').val();
        var nama = $('#nama-edit').val();
        var unitKerja = $('#unit-kerja-edit').val();

        $.ajax({
            url: "/prodi/{{$fakultas}}/" + id,
            type: "POST",
            data: {
                _token: _token,
                _method: 'PUT',
                id: id,
                nama: nama,
                unitKerja: unitKerja
            },
            success: function (data) {
                if ($.isEmptyObject(data.error)) {
                    swal("{{__('components/sweetalert.alertBerhasil')}}",
                        "{{__('components/sweetalert.msgUbahBerhasil',['nama' => __('pages/master/prodi.title')])}}", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                    className: 'btn btn-success'
                                }
                            },
                        });
                    $('#modal-ubah').modal('hide');
                    resetForm();
                    table.draw();
                } else {
                    printErrorMsg(data.error);
                }
            },
        })
    })

    function edit(id) {
        $.ajax({
            url: "/prodi/{{$fakultas}}/" + id + "/edit",
            type: "GET",
            data: {
                id: id
            },
            success: function (data) {
                $('#id-edit').val(data.id);
                $('#nama-edit').val(data.nama);
                $('#unit-kerja-edit').val(data.is_unit_kerja);
                $('#modal-ubah').modal('show');
            },
        })
    }

    function hapus(id) {
        var _token = "{{csrf_token()}}";
        swal({
            title: "{{__('components/sweetAlert.alertHapus')}}",
            text: "{{__('components/sweetAlert.msgHapus')}}",
            icon: 'warning',
            buttons: {
                confirm: {
                    text: "{{__('components/sweetAlert.ya')}}",
                    className: 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    text: "{{__('components/sweetAlert.tidak')}}",
                    className: 'btn btn-danger'
                }
            }
        }).then((Delete) => {
            if (Delete) {
                $.ajax({
                    type: "DELETE",
                    url: "/prodi/{{$fakultas}}/" + id,
                    data: {
                        _token: _token
                    },
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        if (data.res == 'success') {
                            swal({
                                title: "{{__('components/sweetAlert.hapusSukses')}}",
                                text: "{{__('components/sweetAlert.msgHapusSukses')}}",
                                icon: "success",
                                buttons: {
                                    confirm: {
                                        className: 'btn btn-success'
                                    }
                                }
                            });
                            table.draw();
                        } else {
                            swal({
                                title: "{{__('components/sweetAlert.hapusGagal')}}",
                                text: "{{__('components/sweetAlert.msgHapusGagal')}}",
                                icon: 'danger',
                                buttons: {
                                    confirm: {
                                        className: 'btn btn-success'
                                    }
                                }
                            });
                        }
                    },
                    error: function (data) {
                        swal({
                            title: "{{__('components/sweetAlert.hapusGagal')}}",
                            text: "{{__('components/sweetAlert.msgHapusGagal')}}",
                            icon: 'danger',
                            buttons: {
                                confirm: {
                                    className: 'btn btn-success'
                                }
                            }
                        });
                    }
                });
            } else {
                swal.close();
            }
        });
    }

    function printErrorMsg(msg) {
        $.each(msg, function (key, value) {
            $('.' + key + '-error').text(value);
        });
    }

    function resetForm() {
        $('#id-edit').val('');
        $('#nama-edit').val('');
        $('#unit-kerja-edit').val('');
        $('.nama-error').text('');
        $('#nama').val('');
        $('#unit-kerja').val('');
    }

</script>

<script>
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{url('/prodi/' . $fakultas)}}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'statusUnitKerja',
                name: 'statusUnitKerja'
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
        $('#nav-master').addClass('active');
    })

</script>
@endpush
