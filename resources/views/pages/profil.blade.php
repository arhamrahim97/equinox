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
        <div class="form-group col-md-12">
            <label for="nama">{{__('pages/master/akun.nama')}}</label>
            <input type="text" class="form-control" id="nama" placeholder="{{__('pages/master/akun.placeholderNama')}}"
                value="{{$user->nama}}">
            <span class="text-danger error-text nama-error"></span>
        </div>
        <div class="form-group col-md-12">
            <label for="username">{{__('pages/master/akun.username')}}</label>
            <input type="text" class="form-control" id="username"
                placeholder="{{__('pages/master/akun.placeholderUsername')}}" value="{{$user->username}}">
            <span class="text-danger error-text username-error"></span>
        </div>
        <div class="form-group col-md-12">
            <label for="password">{{__('pages/master/akun.password')}}</label>
            <input type="text" class="form-control" id="password"
                placeholder="{{__('pages/master/akun.placeholderPassword')}}">
            <small id="emailHelp" class="form-text text-muted">{{__('pages/master/akun.notifPassword')}}</small>
            <span class="text-danger error-text password-error"></span>
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
    $('#form-ubah').on('submit', function (e) {
        e.preventDefault();

        resetForm();

        var _token = "{{csrf_token()}}";
        var nama = $('#nama').val();
        var username = $('#username').val();
        var password = $('#password').val();

        $.ajax({
            url: "/profil/" + "{{$user->id}}",
            type: "POST",
            data: {
                _token: _token,
                _method: 'PUT',
                nama: nama,
                username: username,
                password: password,
            },
            success: function (data) {
                if ($.isEmptyObject(data.error)) {
                    var alert = '';
                    var message = '';
                    var linkUrl = '';
                    resetForm();
                    if (password) {
                        alert = "{{__('components/sweetalert.alertBerhasil')}}";
                        message = "{{__('components/sweetalert.msgBerhasilUpdateProfil')}}";
                        linkUrl = '{{url("/logout")}}';
                    } else {
                        alert = "{{__('components/sweetalert.alertBerhasil')}}";
                        message =
                            "{{__('components/sweetalert.msgUbahBerhasil',['nama' => __('pages/master/akun.title')])}}";
                        linkUrl = '{{url("/")}}';
                    }

                    swal(alert,
                        message, {
                            icon: "success",
                            buttons: false,
                        }
                    );
                    setTimeout(
                        function () {
                            $(location).attr('href', linkUrl);
                        }, 2000
                    );
                } else {
                    printErrorMsg(data.error);
                }
            },
        })
    })

    function resetForm() {
        $('.nama-error').text('');
        $('.username-error').text('');
        $('.password-error').text('');
    }

</script>
@endpush
