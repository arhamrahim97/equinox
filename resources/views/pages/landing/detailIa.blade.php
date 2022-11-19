@extends('templates/landing')

@section('title-tab')
    {{ __('pages/landing/mou.title') }}
@endsection

@push('style')
@endpush

@section('content')
    <!-- start page title -->
    <section class="half-section bg-light-gray parallax" data-parallax-background-ratio="0.5"
        style="background-image:url('images/portfolio-bg2.jpg');">
        <div class="container">
            <div class="row align-items-stretch justify-content-center extra-small-screen">
                <div
                    class="col-12 col-xl-6 col-lg-7 col-md-8 page-title-extra-small text-center d-flex justify-content-center flex-column">
                    <h1 class="alt-font text-gradient-sky-blue-pink margin-15px-bottom d-inline-block">
                        {{ __('pages/landing/landing.detail_ia') }}</h1>
                    <h2
                        class="text-extra-dark-gray alt-font font-weight-500 letter-spacing-minus-1px line-height-50 sm-line-height-45 xs-line-height-30 no-margin-bottom">
                        {{ __('pages/landing/landing.desc_detail_ia') }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <select class="small-input bg-white margin-20px-bottom filterBerkas" id="fakultas">
                        <option selected hidden value="">{{ __('pages/landing/mou.pilih_status') }}</option>
                        <option value="semua">{{ __('pages/landing/mou.semua') }}</option>
                        @foreach ($daftarFakultas as $fakultas)
                            <option value="{{ $fakultas->id }}">{{ $fakultas->nama }}</option>
                        @endforeach
                        <option value="lainnya">{{ __('pages/landing/landing.lainnya') }}</option>
                    </select>
                </div>
            </div>
        </div>
    </section>


    <!-- end page title -->
    <!-- start section -->
    <section class="bg-light-gray pt-0 padding-eleven-lr xl-padding-two-lr xs-no-padding-lr">
        <div style="height: 500px" class="mb-5">
            <canvas id="myChart"></canvas>
        </div>

        <div class="container-fluid">
            <div class="row">
                <table class="table table-bordered yajra-datatable display nowrap" style="width: 100%">
                    <thead>
                        <tr>
                            <th>{{ __('components/table.nomor') }}</th>
                            <th>Program Studi</th>
                            <th>Total</th>
                            {{-- <th>{{ __('components/table.instansi_pengusul') }}</th>
                            <th>{{ __('components/table.region') }}</th>
                            <th>{{ __('components/table.negara') }}</th>
                            <th>{{ __('components/table.tanggal_mulai') }}</th>
                            <th>{{ __('components/table.tanggal_berakhir') }}</th>
                            <th>{{ __('components/table.program') }}</th>
                            <th>{{ __('components/table.status') }}</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- end section -->
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            getDataIa();
        })

        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ordering: false,
            searchable: false,
            // autoWidth : true,
            ajax: {
                url: "{{ url('/detailIa') }}",
                data: function(d) {
                    d.fakultas = $('#fakultas').val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    class: 'text-center'
                },
                {
                    data: 'prodi',
                    name: 'prodi'
                },
                {
                    data: 'total',
                    name: 'total'
                },
            ]
        });

        $('.filterBerkas').change(function() {
            table.draw();
            getDataIa();
        })
    </script>

    <script>
        function getDataIa() {
            $.ajax({
                url: "{{ url('dataIa') }}",
                type: "POST",
                data: {
                    '_token': '{{ csrf_token() }}',
                    'fakultas': $('#fakultas').val()
                },
                success: function(response) {
                    resetChart();
                    setChart(response.label, response.data);
                }
            })
        }

        function setChart(label, dataIa) {
            const labels = label;
            const data = {
                labels: labels,
                datasets: [{
                    label: 'IA',
                    backgroundColor: 'rgb( 8, 120, 254 )',
                    borderColor: 'rgb( 8, 120, 254 )',
                    data: dataIa,
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            ticks: {
                                beginAtZero: true,
                                autoSkip: false,
                            }
                        },
                        // y: {
                        //     ticks: {

                        //         beginAtZero: true,
                        //         stepSize: 1
                        //     }
                        // }
                    }
                }
            };

            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        }
    </script>

    <script>
        function resetChart() {
            if (Chart.getChart("myChart")) {
                Chart.getChart("myChart").destroy();
            }
        }
    </script>
@endpush
