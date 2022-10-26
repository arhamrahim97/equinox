@push('style')
    <style>
        #DataTables_Table_0_wrapper {
            padding: 0 !important
        }

        #DataTables_Table_0 {
            width: 100% !important
        }
    </style>
@endpush

<div class="row mt-3">
    <div class="col-12">
        <div class="table-responsive">
            {{ $filterStatus }}
            <table class="table table-bordered table-striped yajra-datatable p-0">
                <thead>
                    <tr class="text-center  ">
                        <th>{{ $thead_nomor }}</th>
                        <th>{{ $thead_nomor_mou_moa_ia }}</th>
                        <th>{{ $thead_pengusul }}</th>
                        <th style="width: 30%">Program</th>
                        <th>{{ $thead_tanggal_mulai }}</th>
                        <th>{{ $thead_tanggal_berakhir }}</th>
                        <th>{{ $thead_dibuat_oleh }}</th>
                        <th>Status</th>
                        <th>{{ $thead_aksi }}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

@push('script')
    <script src="{{ asset('assets/dashboard') }}/js/plugin/moment/moment.min.js"></script>
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
                        url: "{{ $link }}" + id,
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

        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ $link }}",
                data: function(d) {
                    d.dibuat_oleh = $('#dibuat-oleh').val();
                    d.status = $('#status').val();
                    d.search = $('input[type="search"]').val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
                {
                    data: '{{ $tbody_nomor_mou_moa_ia }}',
                    name: '{{ $tbody_nomor_mou_moa_ia }}'
                },
                {
                    data: 'pengusul_nama',
                    name: 'pengusul_nama',

                },
                {
                    data: 'program',
                    name: 'program'
                },
                {
                    data: 'tanggal_mulai',
                    name: 'tanggal_mulai',
                    className: 'text-center'
                },
                {
                    data: 'tanggal_berakhir',
                    name: 'tanggal_berakhir',
                    className: 'text-center'
                },
                {
                    data: 'dibuat_oleh',
                    name: 'dibuat_oleh',
                    className: 'text-center'
                },
                {
                    data: 'status',
                    name: 'status',
                    className: 'text-center'
                },
                {
                    data: 'action',
                    name: 'action',
                    className: 'text-center',
                    orderable: true,
                    searchable: true
                },
            ],
            columnDefs: [{
                    targets: 4,
                    render: function(data) {
                        return moment(data).format('DD-MM-YYYY');
                    }
                },
                {
                    targets: 5,
                    render: function(data) {
                        return moment(data).format('DD-MM-YYYY');
                    }
                }
            ],
        });

        $('#status').change(function() {
            table.draw();
        })

        $('#dibuat-oleh').change(function() {
            table.draw();
        })
    </script>
@endpush
