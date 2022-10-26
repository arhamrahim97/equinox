@extends('templates/dashboard')

@section('title-tab')
    | {{ __('pages/master/pengusul.title') }}
@endsection

@section('title')
    {{ __('pages/master/pengusul.title') }}
@endsection

@section('subTitle')
    {{ __('pages/master/pengusul.subTitle') }}
@endsection

@push('style')
    <style>
        td {
            text-transform: capitalize;
        }
    </style>
@endpush

@section('content')
    <section>
        <div class="row mb-3">
            <div class="col-12">
                <a href="/pengusul/create" class="btn btn-primary" id="btn-tambah">
                    <span class="btn-label">
                        <i class="fa fa-plus"></i>
                    </span>
                    {{ __('components/button.add') }}
                </a>
            </div>

        </div>
    </section>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered yajra-datatable">
                <thead>
                    <tr>
                        <th>{{ __('components/table.nomor') }}</th>
                        <th>{{ __('components/table.nama') }}</th>
                        <th>{{ __('components/table.alamat') }}</th>
                        <th>{{ __('components/table.region') }}</th>
                        <th>{{ __('components/table.negara') }}</th>
                        <th>{{ __('components/table.provinsi') }}</th>
                        <th>{{ __('components/table.kota') }}</th>
                        <th>{{ __('components/table.kecamatan') }}</th>
                        <th>{{ __('components/table.kelurahan') }}</th>
                        <th>{{ __('components/table.telepon') }}</th>
                        <th>{{ __('components/table.aksi') }}</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script>
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
                        url: "pengusul/" + id,
                        data: {
                            _token: _token
                        },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
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
    </script>

    <script>
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: "{{ route('pengusul.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    responsive: true,
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
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
                    data: 'provinsi',
                    name: 'provinsi'
                },
                {
                    data: 'kota',
                    name: 'kota'
                },
                {
                    data: 'kecamatan',
                    name: 'kecamatan'
                },
                {
                    data: 'kelurahan',
                    name: 'kelurahan'
                },
                {
                    data: 'telepon',
                    name: 'telepon'
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
    </script>
@endpush
