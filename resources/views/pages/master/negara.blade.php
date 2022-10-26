@extends('templates/dashboard')

@section('title-tab')
    | {{ __('pages/master/negara.title') }}
@endsection

@section('title')
    {{ __('pages/master/negara.title') }}
@endsection

@section('subTitle')
    {{ __('pages/master/negara.subTitle') }}
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
                {{ __('components/button.add') }}
            </button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-12">
            <label for="exampleFormControlSelect1" class="mb-1">{{ __('pages/master/negara.region') }}</label>
            <select class="form-control filter" id="filter-region">
                <option hidden value="" selected>{{ __('pages/master/negara.placeholderSelectRegion') }}</option>
                <option value="">{{ __('pages/master/negara.semua') }}</option>
                <option value="Africa">Africa</option>
                <option value="Americas">Americas</option>
                <option value="Asia">Asia</option>
                <option value="Europe">Europe</option>
                <option value="Oceania">Oceania</option>
                <option value="Polar">Polar</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered yajra-datatable">
                <thead>
                    <tr>
                        <th>{{ __('components/table.nomor') }}</th>
                        <th>{{ __('components/table.nama') }}</th>
                        <th>{{ __('components/table.region') }}</th>
                        <th>{{ __('components/table.aksi') }}</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    {{-- NOTE: Modal --}}
    <div class="modal" tabindex="-1" role="dialog" id="modal-tambah">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('pages/master/negara.modalTitleTambah') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-tambah">
                        <div class="form-group">
                            <label for="nama">{{ __('pages/master/negara.title') }}</label>
                            <input type="text" class="form-control" id="nama"
                                placeholder="{{ __('pages/master/negara.placeHolderTambah') }}">
                            <span class="text-danger error-text nama-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="region">{{ __('pages/master/negara.region') }}</label>
                            <select class="form-control" id="region">
                                <option hidden selected value="">
                                    {{ __('pages/master/negara.placeholderSelectRegion') }}
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
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">{{ __('components/button.save') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- NOTE: Modal Ubah --}}
    <div class="modal" tabindex="-1" role="dialog" id="modal-ubah">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('pages/master/negara.modalTitleUbah') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-ubah">
                        <div class="form-group">
                            <label for="nama">{{ __('pages/master/negara.title') }}</label>
                            <input type="text" hidden id="id-edit">
                            <input type="text" class="form-control" id="nama-edit"
                                placeholder="{{ __('pages/master/negara.placeHolderTambah') }}">
                            <span class="text-danger error-text nama-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="region">{{ __('pages/master/negara.region') }}</label>
                            <select class="form-control" id="region-edit">
                                <option hidden selected value="">
                                    {{ __('pages/master/negara.placeholderSelectRegion') }}
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
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">{{ __('components/button.save') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#btn-tambah').click(function() {
            $('#modal-tambah').modal('show');
        })

        $('#form-tambah').on('submit', function(e) {
            e.preventDefault();
            var _token = "{{ csrf_token() }}";
            var nama = $('#nama').val();
            var region = $('#region').val();

            resetForm();

            $.ajax({
                url: "/negara",
                type: "POST",
                data: {
                    _token: _token,
                    nama: nama,
                    region: region
                },
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        swal("{{ __('components/sweetAlert.alertBerhasil') }}",
                            "{{ __('components/sweetAlert.msgTambahBerhasil', ['nama' => __('pages/master/negara.title')]) }}", {
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

        $('#form-ubah').on('submit', function(e) {
            e.preventDefault();
            var _token = "{{ csrf_token() }}";
            var id = $('#id-edit').val();
            var nama = $('#nama-edit').val();
            var region = $('#region-edit').val();

            resetForm();

            $.ajax({
                url: "/negara/" + id,
                type: "POST",
                data: {
                    _token: _token,
                    _method: 'PUT',
                    id: id,
                    nama: nama,
                    region: region
                },
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        swal("{{ __('components/sweetAlert.alertBerhasil') }}",
                            "{{ __('components/sweetAlert.msgUbahBerhasil', ['nama' => __('pages/master/negara.title')]) }}", {
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
                url: "/negara/" + id + "/edit",
                type: "GET",
                data: {
                    id: id
                },
                success: function(data) {
                    $('#id-edit').val(data.id);
                    $('#nama-edit').val(data.nama);
                    $('#region-edit').val(data.region);
                    $('#modal-ubah').modal('show');
                },
            })
        }

        function hapus(id) {
            var _token = "{{ csrf_token() }}";
            swal({
                title: "{{ __('components/sweetAlert.alertHapus') }}",
                text: "{{ __('components/sweetAlert.msgHapus') }}",
                icon: 'warning',
                buttons: {
                    confirm: {
                        text: "{{ __('components/sweetAlert.ya') }}",
                        className: 'btn btn-success'
                    },
                    cancel: {
                        visible: true,
                        text: "{{ __('components/sweetAlert.tidak') }}",
                        className: 'btn btn-danger'
                    }
                }
            }).then((Delete) => {
                if (Delete) {
                    $.ajax({
                        type: "DELETE",
                        url: "negara/" + id,
                        data: {
                            _token: _token
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data.res == 'success') {
                                swal({
                                    title: "{{ __('components/sweetAlert.hapusSukses') }}",
                                    text: "{{ __('components/sweetAlert.msgHapusSukses') }}",
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
                                    title: "{{ __('components/sweetAlert.hapusGagal') }}",
                                    text: "{{ __('components/sweetAlert.msgHapusGagal') }}",
                                    icon: 'danger',
                                    buttons: {
                                        confirm: {
                                            className: 'btn btn-success'
                                        }
                                    }
                                });
                            }
                        },
                        error: function(data) {
                            swal({
                                title: "{{ __('components/sweetAlert.hapusGagal') }}",
                                text: "{{ __('components/sweetAlert.msgHapusGagal') }}",
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
            $.each(msg, function(key, value) {
                $('.' + key + '-error').text(value);
            });
        }

        function resetForm() {
            $('#id-edit').val('');
            $('#nama-edit').val('');
            $('.nama-error').text('');
            $('.region-error').text('');
            $('#nama').val('');
        }
    </script>

    <script>
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('/negara') }}",
                data: function(d) {
                    d.region = $('#filter-region').val();
                    d.search = $('input[type="search"]').val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'region',
                    name: 'region'
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
        $(document).ready(function() {
            $('#nav-master').addClass('active');
        })

        $('.filter').change(function() {
            table.draw();
        })
    </script>
@endpush
