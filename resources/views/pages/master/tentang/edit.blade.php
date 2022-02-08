@extends('templates/dashboard')

@section('title')
{{__('pages/master/tentang.titleEdit')}}
@endsection

@section('subTitle')
{{__('pages/master/tentang.title')}}
@endsection


@push('style')

@endpush

@section('content')
<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{__('pages/master/tentang.titleEdit')}}
                    </div>
                    <div class="card-category">{{__('pages/master/tentang.subTitleCard')}}</div>
                </div>
                <div class="card-body">
                    <form id="form-ubah" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row d-flex justify-content-center">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{__('pages/master/tentang.nama')}}</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" readonly value="{{$tentang->nama}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{__('pages/master/tentang.bahasa')}}</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" readonly value="{{$tentang->bahasa}}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="konten">{{__('pages/master/tentang.konten')}}</label>
                                    <textarea class="my-editor form-control" id="konten" cols="30" rows="10"
                                        name="konten">{{{$tentang->konten}}}</textarea>
                                    <span class="text-danger error-text konten-error"></span>
                                </div>
                                <div class="form-row">
                                    <div class="form-group ml-auto">
                                        <button type="submit"
                                            class="btn btn-success">{{__('components/button.save')}}</button>
                                    </div>
                                </div>
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
    $('#form-ubah').on('submit', function (e) {
        e.preventDefault();

        resetForm();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        let formData = new FormData(this);
        $.ajax({
            url: "/kelolaTentang/" + "{{$tentang->id}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formData,
            success: function (data) {
                if ($.isEmptyObject(data.error)) {
                    swal("{{__('components/sweetAlert.alertBerhasil')}}",
                        "{{__('components/sweetAlert.msgUbahBerhasil',['nama' => __('pages/master/tentang.title')])}}", {
                            icon: "success",
                            buttons: false,
                        });
                    resetForm();
                    setTimeout(
                        function () {
                            $(location).attr('href', '{{url("/kelolaTentang")}}');
                        }, 2000
                    );
                } else {
                    printErrorMsg(data.error);
                }
            },
        })
    })

    function printErrorMsg(msg) {
        $.each(msg, function (key, value) {
            $('.' + key + '-error').text(value);
        });
    }

    function resetForm() {
        $('.konten-error').text('');
    }

</script>

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
        height: 300,
    };

</script>

<script>
    CKEDITOR.replace('konten', options);

</script>

<script>
    $(document).ready(function () {
        $('#nav-master').addClass('active');
    })

</script>
@endpush
