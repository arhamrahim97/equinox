@extends('templates/dashboard')

@section('title-tab')
| {{__('pages/ia/borangIa/index.title')}}
@endsection

@section('title')
{{__('pages/ia/borangIa/index.title')}}
@endsection

@section('subTitle')
{{__('pages/ia/borangIa/index.subTitle')}}
@endsection

@push('style')

@endpush

@section('content')
<div class="row">
    <a href="{{url('/exportBorangIa')}}" class="btn btn-primary" target="_blank">Export Excel</a>
</div>

<div class="row">
    <table class="table table-bordered yajra-datatable display nowrap" width='100%'>
        <thead class="text-center">
            <tr>
                <th rowspan="2">{{__('components/table.nomor')}}</th>
                <th rowspan="2">{{__('components/table.lembaga_mitra')}}</th>
                <th rowspan="2">{{__('components/table.tipe_kerjasama')}}</th>
                <th colspan="3">{{__('components/table.tingkat')}}</th>
                <th rowspan="2">{{__('components/table.judul_kegiatan_kerjasama')}}</th>
                <th rowspan="2">{{__('components/table.manfaat')}}</th>
                <th rowspan="2">{{__('components/table.waktu_dan_durasi')}}</th>
                <th rowspan="2">{{__('components/table.bukti_kerjasama')}}</th>
            </tr>
            <tr>
                <th>{{__('components/table.internasional')}}</th>
                <th>{{__('components/table.nasional')}}</th>
                <th>{{__('components/table.lokal')}}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@endsection

@push('script')

<script>
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: "{{ url('borangIa') }}",
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false,
                responsive: true,
                class : 'text-center'
            },
            {
                data: 'lembaga_mitra',
                name: 'lembaga_mitra'
            },
            {
                data: 'tipe_kerjasama',
                name: 'tipe_kerjasama'
            },
            {
                data: 'internasional',
                name: 'internasional',
                class : 'text-center'
            },
            {
                data: 'nasional',
                name: 'nasional',
                class : 'text-center'
            },
            {
                data: 'lokal',
                name: 'lokal',
                class : 'text-center'
            },
            {
                data: 'program',
                name: 'program'
            },
            {
                data: 'manfaat',
                name: 'manfaat'
            },
            {
                data: 'waktu_dan_durasi',
                name: 'waktu_dan_durasi',
                class : 'text-center',
                width : '20%'
            },
            {
                data: 'bukti_dan_kerjasama',
                name: 'bukti_dan_kerjasama'
            },
        ]
    });

</script>

<script>
    $(document).ready(function () {
        $('#nav-ia').addClass('active');
    })

    $('.filter').change(function () {
        table.draw();
        })

</script>
@endpush
