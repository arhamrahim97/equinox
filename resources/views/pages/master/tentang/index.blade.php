@extends('templates/dashboard')

@section('title-tab')
| {{__('pages/master/tentang.title')}}
@endsection

@section('title')
{{__('pages/master/tentang.title')}}
@endsection

@section('subTitle')
{{__('pages/master/tentang.subTitle')}}
@endsection

@push('style')

@endpush

@section('content')

<div class="row">
    <table class="table table-bordered yajra-datatable text-center">
        <thead>
            <tr>
                <th>{{__('components/table.nomor')}}</th>
                <th>{{__('components/table.nama')}}</th>
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
    function printErrorMsg(msg) {
        $.each(msg, function (key, value) {
            $('.' + key + '-error').text(value);
        });
    }

    function resetForm() {
        $('#id-edit').val('');
        $('#nama-edit').val('');
        $('.nama-error').text('');
        $('#nama').val('');
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
        ajax: "{{ route('kelolaTentang.index') }}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                class : 'text-center'
            },
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'bahasa',
                name: 'bahasa'
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
    $(document).ready(function () {
        $('#nav-master').addClass('active');
    })

</script>
@endpush
