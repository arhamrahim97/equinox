@extends('templates/dashboard')

@section('title-tab')
| {{__('pages/master/slider.title')}}
@endsection

@section('title')
{{__('pages/master/slider.title')}}
@endsection

@section('subTitle')
{{__('pages/master/slider.subTitle')}}
@endsection

@push('style')

@endpush

@section('content')

<div class="row">
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>{{__('components/table.nomor')}}</th>
                <th>{{__('components/table.nama')}}</th>
                <th>{{__('components/table.foto')}}</th>
                <th>{{__('components/table.aksi')}}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

{{-- NOTE: Modal Ubah--}}
<div class="modal" tabindex="-1" role="dialog" id="modal-ubah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('pages/master/slider.modalTitleUbah')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-ubah" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group col-md-12">
                        <label for="judul">{{__('pages/master/slider.foto')}}</label>
                        <input type="text" hidden id="id-edit">
                        <div id='img_contain' class="d-flex justify-content-center"><img id="previewFoto" align='middle'
                                src="/assets/dashboard/img/empty.png" alt="" title='' width="350px" />
                        </div>
                        <div class="input-group mt-2">
                            <div class="custom-file">
                                <input type="file" id="inputGroupFile01" class="imgInp custom-file-input"
                                    aria-describedby="inputGroupFileAddon01" name="foto">
                                <label class="custom-file-label" for="inputGroupFile01"
                                    id="labelFoto">{{__('pages/master/slider.tambahFoto')}}</label>
                            </div>
                        </div>
                        <small id="emailHelp"
                            class="form-text text-muted">{{__('pages/master/slider.ukuranFoto')}}</small>
                        <span class="text-danger error-text foto-error"></span>
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
    $('#form-ubah').on('submit', function (e) {
        e.preventDefault();
        var id = $('#id-edit').val();
        let formData = new FormData(this);
        resetForm();
        $.ajax({
            url: "/slider/" + id,
            type: "POST",
            processData: false,
            contentType: false,
            data: formData,
            success: function (data) {
                if ($.isEmptyObject(data.error)) {
                    swal("{{__('components/sweetalert.alertBerhasil')}}",
                        "{{__('components/sweetalert.msgUbahBerhasil',['nama' => __('pages/master/slider.title')])}}", {
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
            url: "/slider/" + id + "/edit",
            type: "GET",
            data: {
                id: id
            },
            success: function (data) {
                $('#id-edit').val(data.id);
                $('#previewFoto').attr('src',data.foto);
                $('#labelFoto').html(data.namaFoto);
                $('#modal-ubah').modal('show');
            },
        })
    }

    function printErrorMsg(msg) {
        $.each(msg, function (key, value) {
            $('.' + key + '-error').text(value);
        });
    }

    function resetForm() {
        $('#foto-error').html('');
    }

</script>

<script>
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        searching : false,
        lengthChange : false,
        paging : false,
        info : false,
        ajax: "{{ route('slider.index') }}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                class : 'text-center'
            },
            {
                data: 'nama',
                name: 'nama',
                class : 'fw-bold text-center'
            },
            {
                data: 'foto',
                name: 'foto',
                class : 'text-center'
            },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true,
                class : 'text-center'
            },
        ]
    });

</script>

<script>
    $("#inputGroupFile01").change(function (event) {
        RecurFadeIn();
        readURL(this);
    });
    $("#inputGroupFile01").on('click', function (event) {
        RecurFadeIn();
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#inputGroupFile01").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function (e) {
                $('#previewFoto').attr('src', e.target.result);
                $('#previewFoto').hide();
                $('#previewFoto').fadeIn(500);
                $('.custom-file-label').text(filename);
            }
            reader.readAsDataURL(input.files[0]);
        }
        $(".alert").removeClass("loading").hide();
    }

    function RecurFadeIn() {
        console.log('ran');
        FadeInAlert("Wait for it...");
    }

    function FadeInAlert(text) {
        $(".alert").show();
        $(".alert").text(text).addClass("loading");
    }

</script>

<script>
    $(document).ready(function () {
        $('#nav-master').addClass('active');
    })

</script>
@endpush
