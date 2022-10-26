@extends('templates/dashboard')

@section('title-tab')
    | {{ __('pages/master/akun.title') }}
@endsection

@section('title')
    {{ __('pages/master/akun.title') }}
@endsection

@section('subTitle')
    {{ __('pages/master/akun.subTitle') }}
@endsection

@push('style')
@endpush

@section('content')
    <section>
        <div class="row mb-3">
            <div class="col-12">
                <a href="/akun/create" class="btn btn-primary" id="btn-tambah">
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
                        <th>{{ __('components/table.username') }}</th>
                        <th>{{ __('components/table.fakultas') }}</th>
                        <th>{{ __('components/table.prodi') }}</th>
                        <th>{{ __('components/table.role') }}</th>
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
                        url: "akun/" + id,
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
            ajax: "{{ route('akun.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'fakultas',
                    name: 'fakultas'
                },
                {
                    data: 'prodi',
                    name: 'prodi'
                },
                {
                    data: 'role',
                    name: 'role'
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
