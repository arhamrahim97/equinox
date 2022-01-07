@extends('templates/dashboard')

@section('title-tab')
| {{__('pages/berita/kelolaBerita.title')}}
@endsection

@section('title')
{{__('pages/berita/kelolaBerita.title')}}
@endsection

@section('subTitle')
{{__('pages/berita/kelolaBerita.subTitle')}}
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
            <a href="/kelolaBerita/create" class="btn btn-primary" id="btn-tambah">
                <span class="btn-label">
                    <i class="fa fa-plus"></i>
                </span>
                {{__('components/button.add')}}
            </a>
        </div>

    </div>
</section>

<div class="row">
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>{{__('components/table.nomor')}}</th>
                <th>{{__('components/table.judul')}}</th>
                <th>{{__('components/table.kategori')}}</th>
                <th>{{__('components/table.bahasa')}}</th>
                <th>{{__('components/table.aksi')}}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@endsection

@push('script')
<script>
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
                    url: "kelolaBerita/" + id,
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

</script>

<script>
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('kelolaBerita.index') }}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false,
                responsive: true,
            },
            {
                data: 'judul',
                name: 'judul'
            },
            {
                data: 'kategoriBerita',
                name: 'kategoriBerita'
            },
            {
                data: 'bahasa',
                name: 'bahasa'
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
        $('#nav-berita').addClass('active');
    })

</script>
@endpush
