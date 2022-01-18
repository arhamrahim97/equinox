@extends('templates/dashboard')

@section('title')
{{__('pages/berita/kelolaBerita.titleCreate')}}
@endsection

@section('subTitle')
{{__('pages/berita/kelolaBerita.title')}}
@endsection


@push('style')

@endpush

@section('content')
<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{__('pages/berita/kelolaBerita.titleCard')}}
                    </div>
                    <div class="card-category">{{__('pages/berita/kelolaBerita.subTitleCard')}}</div>
                </div>
                <div class="card-body">
                    <form id="form-ubah" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="col-lg-8">
                                <div class="form-group col-md-12">
                                    <label for="konten">{{__('pages/berita/kelolaBerita.konten')}}</label>
                                    <textarea class="my-editor form-control" id="konten" cols="30" rows="10"
                                        name="konten">{{{$berita->konten}}}</textarea>
                                    <span class="text-danger error-text konten-error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group col-md-12">
                                    <label for="judul">{{__('pages/berita/kelolaBerita.fotoSampul')}}</label>
                                    <div id='img_contain' class="d-flex justify-content-center"><img id="blah"
                                            align='middle'
                                            src="{{Storage::url('upload/sampul_berita/' . $berita->foto_sampul) ? Storage::url('upload/sampul_berita/' . $berita->foto_sampul) : '/assets/dashboard/img/empty.png'}}"
                                            alt="" title='' width="350px" /></div>
                                    <div class="input-group mt-2">
                                        <div class="custom-file">
                                            <input type="file" id="inputGroupFile01" class="imgInp custom-file-input"
                                                aria-describedby="inputGroupFileAddon01" name="fotoSampul">
                                            <label class="custom-file-label"
                                                for="inputGroupFile01">{{$berita->foto_sampul}}</label>
                                        </div>
                                    </div>
                                    <small id="emailHelp" class="form-text
                                        text-muted">{{__('pages/berita/kelolaBerita.ukuranFoto') . ', ' .
                                        __('pages/berita/kelolaBerita.notifSampul')}}</small>
                                    <span class="text-danger error-text fotoSampul-error"></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="judul">{{__('pages/berita/kelolaBerita.judul')}}</label>
                                    <input type="text" class="form-control" id="judul"
                                        placeholder="{{__('pages/berita/kelolaBerita.placeholderJudul')}}" name="judul"
                                        onkeypress="countJudul()" onkeyup="countJudul()" value="{{$berita->judul}}">
                                    <small id="countJudul" class="form-text text-muted"></small>
                                    <span class="text-danger error-text judul-error"></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="deskripsi">{{__('pages/berita/kelolaBerita.deskripsi')}}</label>
                                    <textarea class="form-control" id="deskripsi" cols="30" rows="10" name="deskripsi"
                                        placeholder="{{__('pages/berita/kelolaBerita.placeholderDeskripsi')}}"
                                        onkeyup="countDeskripsi()"
                                        onkeypress="countDeskripsi()">{{$berita->deskripsi}}</textarea>
                                    <small id="countDeskripsi" class="form-text text-muted"></small>
                                    <span class="text-danger error-text deskripsi-error"></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="kategori">{{__('pages/berita/kelolaBerita.kategori')}}</label>
                                    <select class="form-control" id="kategori" name="kategori">
                                        <option hidden selected value="">
                                            {{__('pages/berita/kelolaBerita.placeholderSelectKategori')}}
                                        </option>
                                        @foreach ($daftarKategoriBerita as $kategoriBerita)
                                        <option value="{{$kategoriBerita->id}}">{{$kategoriBerita->nama}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text kategori-error"></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="bahasa">{{__('pages/berita/kelolaBerita.bahasa')}}</label>
                                    <select class="form-control" id="bahasa" name="bahasa">
                                        <option hidden selected value="">
                                            {{__('pages/berita/kelolaBerita.placeholderSelectBahasa')}}
                                        </option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Inggris">Inggris</option>
                                    </select>
                                    <span class="text-danger error-text bahasa-error"></span>
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
    var maxWordDeskripsi = 500;
    var maxWordJudul = 200;

    $(document).ready(function () {
        countDeskripsi();
        countJudul();
        $('#kategori').select2({
            placeholder: "{{__('pages/berita/kelolaBerita.placeholderSelectKategori')}}",
            theme: "bootstrap"
        });
        $('#bahasa').select2({
            placeholder: "{{__('pages/berita/kelolaBerita.placeholderSelectBahasa')}}",
            theme: "bootstrap"
        });

        $('#kategori').val("{{$berita->kategori_berita_id}}").trigger('change');
        $('#bahasa').val("{{$berita->bahasa}}").trigger('change');
    })

    $('#form-ubah').on('submit', function (e) {
        e.preventDefault();

        resetForm();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        let formData = new FormData(this);
        $.ajax({
            url: "/kelolaBerita/" + "{{$berita->id}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formData,
            success: function (data) {
                if ($.isEmptyObject(data.error)) {
                    swal("{{__('components/sweetalert.alertBerhasil')}}",
                        "{{__('components/sweetalert.msgUbahBerhasil',['nama' => __('pages/berita/kelolaBerita.subTitle')])}}", {
                            icon: "success",
                            buttons: false,
                        });
                    resetForm();
                    setTimeout(
                        function () {
                            $(location).attr('href', '{{url("/kelolaBerita")}}');
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

    function countDeskripsi() {
        var lengthDeksripsi = $('#deskripsi').val().length;
        $('#countDeskripsi').text(lengthDeksripsi + '/' + maxWordDeskripsi);
        if (lengthDeksripsi > maxWordDeskripsi) {
            $('#countDeskripsi').removeClass('text-dark');
            $('#countDeskripsi').addClass('text-danger');
        } else {
            $('#countDeskripsi').removeClass('text-danger');
            $('#countDeskripsi').addClass('text-dark');
        }
    }

    function countJudul() {
        var lengthDeksripsi = $('#judul').val().length;
        $('#countJudul').text(lengthDeksripsi + '/' + maxWordJudul);
        if (lengthDeksripsi > maxWordJudul) {
            $('#countJudul').removeClass('text-dark');
            $('#countJudul').addClass('text-danger');
        } else {
            $('#countJudul').removeClass('text-danger');
            $('#countJudul').addClass('text-dark');
        }
    }

    function resetForm() {
        $('.judul-error').text('');
        $('.fotoSampul-error').text('');
        $('.konten-error').text('');
        $('.deksripsi-error').text('');
        $('.kategori-error').text('');
        $('.bahasa-error').text('');
    }

</script>

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
        height: 800,
    };

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
                $('#blah').attr('src', e.target.result);
                $('#blah').hide();
                $('#blah').fadeIn(500);
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
    CKEDITOR.replace('konten', options);

</script>

@endpush
