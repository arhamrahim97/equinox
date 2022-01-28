@extends('templates/dashboard')

@section('title-tab')
| {{__('pages/master/rekapitulasi.title')}}
@endsection

@section('title')
{{__('pages/master/rekapitulasi.title')}}
@endsection

@section('subTitle')
{{__('pages/master/rekapitulasi.subTitle')}}
@endsection

@push('style')
<link rel="stylesheet" href="{{ asset('assets/dashboard/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/dashboard/datatables/Responsive-2.2.1/css/responsive.bootstrap4.min.css') }}">

<style>
    .dataTables_filter {
        display: inline !important;
        float: right;
    }
    
    .dt-buttons {
        display: inline !important;
    }
    
    .dataTables_length {
        display: inline !important;
    
    }
    
    .dataTables_wrapper {
        font-family: Roboto;            
    }

    .paginate_button {
        font-size: 12px !important;
    }

    .dataTables_paginate {
        margin-top: 10px !important;
    }

    .dataTables_length, .dt-buttons, .dataTables_filter{
        font-family: sans-serif
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{__('pages/master/rekapitulasi.filteringData')}}</h4>
            </div>
            <div class="card-body">
                <form id="rekapitulasi-form" method="POST" enctype="multipart/form-data" action="#" >
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <div class="form-group">
                                <label>{{__('pages/master/rekapitulasi.jenisDokumen')}} :</label>                    
                                <div class="selectgroup selectgroup-secondary selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="jenis_dokumen" value="mou" class="selectgroup-input jenis_dokumen" checked>
                                        <span class="selectgroup-button selectgroup-button-icon"> MOU </span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="jenis_dokumen" value="moa" class="selectgroup-input jenis_dokumen">
                                        <span class="selectgroup-button selectgroup-button-icon"> MOA </span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="jenis_dokumen" value="ia" class="selectgroup-input jenis_dokumen">
                                        <span class="selectgroup-button selectgroup-button-icon"> IA </span>
                                    </label>      
                                    <span class="text-danger error-text jenis_dokumen-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-2">
                            <div class="form-group">                            
                                <label class="form-label d-block">Status : </label>                            
                                <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="checkbox" name="status[]" value="aktif" class="selectgroup-input status1" checked>
                                        <span class="selectgroup-button">{{__('components/span.aktif')}}</span>
                                    </label>
                                    <div class="d-none" id="tipe_change_mou_moa">
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="status[]" value="masa_tenggang" class="selectgroup-input status2" checked>
                                            <span class="selectgroup-button">{{__('components/span.masa_tenggang')}}</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="status[]" value="kadaluarsa" class="selectgroup-input status3" checked>
                                            <span class="selectgroup-button">{{__('components/span.kadaluarsa')}}</span>
                                        </label>                              
                                    </div>
                                    <div class="d-none" id="tipe_change_ia">   
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="status[]" value="melewati_batas" class="selectgroup-input status4" checked>
                                            <span class="selectgroup-button">{{__('components/span.melewati_batas')}}</span>
                                        </label>                                       
                                        <label class="selectgroup-item">
                                            <input type="checkbox" name="status[]" value="selesai" class="selectgroup-input status5" checked>
                                            <span class="selectgroup-button">{{__('components/span.selesai')}}</span>
                                        </label>         
                                    </div> 
                                    <span class="text-danger error-text status-error"></span>
                                </div>                              
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="form-group">
                                <label>{{__('pages/master/rekapitulasi.dibuatOleh')}} :</label>
                                <div class="select2-input select2-warning">
                                    <select id="dibuat_oleh" name="dibuat_oleh[]" class="form-control select2" multiple="multiple">                                    
                                    </select>
                                    <span class="text-danger error-text dibuat_oleh-error"></span>                              
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">                        
                            <div class="form-group">
                                <label>{{__('pages/master/rekapitulasi.tanggalPembuatan')}} :</label>                            
                                <div class="form-group form-show-validation row mt-0 pt-0 px-0">
                                    <label for="name" class="col-lg-1 col-md-1 col-sm-4 mt-sm-2 text-left mr-3" style="font-weight: normal">{{__('pages/master/rekapitulasi.mulai')}} </label>
                                    <div class="col-lg-4 col-md-9 col-sm-8 mb-1">
                                        <input name="dari_tanggal" id="dari_tanggal" type="text" class="form-control tanggal" >
                                        <span class="text-danger error-text dari_tanggal-error"></span>                              
                                    </div> 
                                    <label for="name" class="col-lg-1 col-md-1 col-sm-4 mt-sm-2 text-left mr-4" style="font-weight: normal">{{__('pages/master/rekapitulasi.sampai')}} </label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input name="sampai_tanggal" id="sampai_tanggal" type="text" class="form-control tanggal">
                                        <span class="text-danger error-text sampai_tanggal-error"></span>                              
                                    </div>
                                </div>                         
                            </div>                                                        
                        </div>                                                        
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-success" type="submit">
                                <span class="btn-label">
                                    <i class="fa fa-sync"></i>
                                </span>
                                {{__('components/button.proses')}}
                            </button>
                        </div>		
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>    

<div id="result" class="d-none">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{__('pages/master/rekapitulasi.hasil_penyaringan')}}</h4>
            </div>
            <div class="card-body">    
                <div id="tabel-mou" class="row d-none">
                    <table id="dt-mou" class="table table-bordered table-sm table-striped dt-class table-responsive"
                        cellspacing="0" width="100%" style="font-family: sans-serif">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.program')}}</th>                            
                                <th class="text-center">{{__('pages/master/rekapitulasi.tanggal_penginputan')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.waktu_penginputan')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.penginput')}}</th>                                
                                <th class="text-center">{{__('pages/master/rekapitulasi.instansi_pengusul')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.negara')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.provinsi')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.kabupaten')}}</th>
                                <th class="text-center"> {{__('pages/master/rekapitulasi.kecamatan')}}</th>
                                <th class="text-center"> {{__('pages/master/rekapitulasi.kelurahan')}}</th>
                                <th class="text-center"> {{__('pages/master/rekapitulasi.alamat')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.latitude')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.longitude')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.nomor_hp')}}</th>                                
                                <th class="text-center">{{__('pages/master/rekapitulasi.nomor_mou')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.nomor_mou_pengusul')}}</th>                                                              
                                <th class="text-center">{{__('pages/master/rekapitulasi.pejabat_penandatangan')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.nik_nip_pengusul')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.jabatan_pengusul')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.tanggal_mulai_')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.tanggal_berakhir_')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.metode_pertemuan')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.tanggal_pertemuan_')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.waktu_pertemuan_')}}</th>                        
                                <th class="text-center">{{__('pages/master/rekapitulasi.nama_berkas')}}</th>
                            </tr>
                        </thead>
                    </table>           
                </div>
                <div id="tabel-moa" class="row d-none">
                    <table id="dt-moa" class="table table-bordered table-sm table-striped dt-class table-responsive"
                        cellspacing="0" width="100%" style="font-family: sans-serif">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.program')}}</th>                            
                                <th class="text-center">{{__('pages/master/rekapitulasi.tanggal_penginputan')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.waktu_penginputan')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.penginput')}}</th>                                
                                <th class="text-center">{{__('pages/master/rekapitulasi.instansi_pengusul')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.negara')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.provinsi')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.kabupaten')}}</th>
                                <th class="text-center"> {{__('pages/master/rekapitulasi.kecamatan')}}</th>
                                <th class="text-center"> {{__('pages/master/rekapitulasi.kelurahan')}}</th>
                                <th class="text-center"> {{__('pages/master/rekapitulasi.alamat')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.latitude')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.longitude')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.nomor_hp')}}</th>                                
                                <th class="text-center">{{__('pages/master/rekapitulasi.nomor_moa')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.nomor_moa_pengusul')}}</th>                                                              
                                <th class="text-center">{{__('pages/master/rekapitulasi.nomor_mou')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.nomor_mou_pengusul')}}</th>                                                              
                                <th class="text-center">{{__('pages/master/rekapitulasi.pejabat_penandatangan')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.nik_nip_pengusul')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.jabatan_pengusul')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.tanggal_mulai_')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.tanggal_berakhir_')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.metode_pertemuan')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.tanggal_pertemuan_')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.waktu_pertemuan_')}}</th>                        
                                <th class="text-center">{{__('pages/master/rekapitulasi.nama_berkas')}}</th>
                            </tr>
                        </thead>
                    </table>           
                </div>
                <div id="tabel-ia" class="row d-none">
                    <table id="dt-ia" class="table table-bordered table-sm table-striped dt-class table-responsive"
                        cellspacing="0" width="100%" style="font-family: sans-serif">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.program')}}</th>                            
                                <th class="text-center">{{__('pages/master/rekapitulasi.tanggal_penginputan')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.waktu_penginputan')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.penginput')}}</th>                                
                                <th class="text-center">{{__('pages/master/rekapitulasi.instansi_pengusul')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.negara')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.provinsi')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.kabupaten')}}</th>
                                <th class="text-center"> {{__('pages/master/rekapitulasi.kecamatan')}}</th>
                                <th class="text-center"> {{__('pages/master/rekapitulasi.kelurahan')}}</th>
                                <th class="text-center"> {{__('pages/master/rekapitulasi.alamat')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.latitude')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.longitude')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.nomor_hp')}}</th>                                
                                <th class="text-center">{{__('pages/master/rekapitulasi.nomor_ia')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.nomor_ia_pengusul')}}</th>                                                              
                                <th class="text-center">{{__('pages/master/rekapitulasi.nomor_moa')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.nomor_moa_pengusul')}}</th>  
                                <th class="text-center">{{__('pages/master/rekapitulasi.nomor_mou')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.nomor_mou_pengusul')}}</th>    
                                <th class="text-center">{{__('pages/master/rekapitulasi.pejabat_penandatangan')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.nik_nip_pengusul')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.jabatan_pengusul')}}</th>                                                           
                                <th class="text-center">{{__('pages/master/rekapitulasi.tanggal_mulai_')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.tanggal_berakhir_')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.metode_pertemuan')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.tanggal_pertemuan_')}}</th>
                                <th class="text-center">{{__('pages/master/rekapitulasi.waktu_pertemuan_')}}</th>                        
                                <th class="text-center">{{__('pages/master/rekapitulasi.nama_berkas')}}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>   
</div>
@endsection

@push('script')
    <script src="{{asset('assets/dashboard')}}/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>    
    <script src="{{asset('assets/dashboard')}}/datatables/Responsive-2.2.1/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('assets/dashboard')}}/datatables/dataTables.buttons.min.js"></script>
    <script src="{{asset('assets/dashboard')}}/datatables/jszip.min.js"></script>
    <script src="{{asset('assets/dashboard')}}/datatables/vfs_fonts.js"></script>
    <script src="{{asset('assets/dashboard')}}/datatables/buttons.html5.min.js"></script>
    <script src="{{asset('assets/dashboard')}}/datatables/buttons.print.min.js"></script>

    <script>
        $('.tanggal').mask('00-00-0000');
        let jenis_dokumen = $('input[type=radio][name=jenis_dokumen]')
        let jenis_dokumen_checked = $("input[name='jenis_dokumen']:checked").val()
        
        jenisDokumen(jenis_dokumen_checked)

        $(jenis_dokumen).change(function(){    
            $('#result').addClass('d-none')
            $('#tabel-mou').addClass('d-none')
            $('#tabel-moa').addClass('d-none')
            $('#tabel-ia').addClass('d-none')          
            jenisDokumen(this.value)
        })

        function jenisDokumen(checked){
            getFilter(checked)
            if(checked == 'mou'){    
                $('#tabel-mou').removeClass('d-none')
                $('.status1').attr('name', 'status[]')                
                $('.status2').attr('name', 'status[]')                
                $('.status3').attr('name', 'status[]')      
                $('.status4').attr('name', '')        
                $('.status5').attr('name', '')        
                $('#tipe_change_ia').addClass('d-none')
                $('#tipe_change_mou_moa').removeClass('d-none')  
            } else if(checked == 'moa'){        
                $('#tabel-moa').removeClass('d-none')
                $('.status1').attr('name', 'status[]')                
                $('.status2').attr('name', 'status[]')                
                $('.status3').attr('name', 'status[]')      
                $('.status4').attr('name', '')  
                $('.status5').attr('name', '')        
                $('#tipe_change_ia').addClass('d-none')
                $('#tipe_change_mou_moa').removeClass('d-none')
            } else{    
                $('#tabel-ia').removeClass('d-none')
                $('.status1').attr('name', 'status[]')                
                $('.status2').attr('name', '')                
                $('.status3').attr('name', '')      
                $('.status4').attr('name', 'status[]')                
                $('.status5').attr('name', 'status[]')                
                $('#tipe_change_mou_moa').addClass('d-none')                
                $('#tipe_change_ia').removeClass('d-none')
            }
        }

        function getFilter(checked) {              
            $.ajax({
                url: "/getfilter",
                type: "GET",
                data: {
                    tipeDokumen: checked,                        
                },
                success: function (data) {
                    $('#dari_tanggal').val(data.minDate)
                    $('#sampai_tanggal').val(data.maxDate)
                    $('#dibuat_oleh').html('')                    
                    $('#dibuat_oleh').append(data.dibuat_oleh)  
                },
            })            
        }

       

        $('#rekapitulasi-form').submit(function(e) {                          
            e.preventDefault();                         
            resetForm()
            var formData = new FormData(this)                    
            $.ajax({             
                type: "POST",
                url: "/rekapitulasi",
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                data: formData,
                cache : false,
                processData: false,
                contentType: false,
                success: function (data) {          
                    if ($.isEmptyObject(data.error)) {
                        console.log(data)   
                        $('#result').removeClass('d-none')
                        if(data.jenis_dokumen == 'mou'){
                            rekapMou(data)
                        } else if(data.jenis_dokumen == 'moa'){                            
                            rekapMoa(data) 
                        } else if(data.jenis_dokumen == 'ia'){                            
                            rekapIa(data)                         
                        }                        
                    }
                    else{
                        printErrorMsg(data.error);
                        
                    }      
                  
                },
            })      
         
        })

        function rekapMou(data){
            $("#dt-mou").DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "/rekapitulasiresult",
                    data: data
                },
                destroy  : true,
                dom: 'lBfrtip',
                buttons : [
                        {
                        extend: 'excel',
                        className: 'btn btn-sm btn-info mt-1 mb-2 btn-export-table d-inline ml-3 font-weight',                        
                        text: '<i class="fas fa-file-excel"></i> {{__("pages/master/rekapitulasi.ekspor_excel")}}',
                        exportOptions: {
                            modifier: {
                                // DataTables core
                                order: 'index', // 'current', 'applied', 'index',  'original'
                                page: 'all', // 'all',     'current'
                                search: 'none' // 'none',    'applied', 'removed'
                            }
                        }

                    }
                ],  
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],                                         
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        className: 'text-center',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                        className: 'text-center',
                        searchable: false
                    },
                    {
                        data: 'program',
                        name: 'program',
                        searchable: true
                    },
                    {
                        data: 'tanggal_pembuatan',
                        name: 'tanggal_pembuatan',
                        searchable: false

                    },
                    {
                        data: 'waktu_pembuatan',
                        name: 'waktu_pembuatan',
                        searchable: false
                    },
                    {
                        data: 'penginput',
                        name: 'users.nama',
                        searchable: true
                    },                    
                    {
                        data: 'pengusul',
                        name: 'pengusul.nama',
                        searchable: true
                    },
                    {
                        data: 'negara',
                        name: 'negara',
                        searchable: false
                    },
                    {
                        data: 'provinsi',
                        name: 'provinsi',      
                        searchable: false                                  
                    },
                    {
                        data: 'kota',
                        name: 'kota',
                        searchable: false
                    },
                    {
                        data: 'kecamatan',
                        name: 'kecamatan',
                        searchable: false
                    },
                    {
                        data: 'kelurahan',
                        name: 'kelurahan',
                        searchable: false
                    },
                    {
                        data: 'alamat',
                        name: 'alamat',
                        searchable: false
                    },
                    {
                        data: 'latitude',
                        name: 'latitude',
                        searchable: false
                    },
                    {
                        data: 'longitude',
                        name: 'longitude',
                        searchable: false
                    },
                    {
                        data: 'telepon',
                        name: 'telepon',
                        searchable: false
                    },                                            
                    {
                        data: 'nomor_mou',
                        name: 'nomor_mou',
                        searchable: false                            
                    },
                    {
                        data: 'nomor_mou_pengusul',
                        name: 'nomor_mou_pengusul',
                        searchable: false
                    },  
                    {
                        data: 'pejabat_penandatangan',
                        name: 'pejabat_penandatangan',
                        searchable: true
                    },
                    {
                        data: 'nik_nip_pengusul',
                        name: 'nik_nip_pengusul',
                        searchable: false
                    },
                    {
                        data: 'jabatan_pengusul',
                        name: 'jabatan_pengusul',
                        searchable: false
                    },                  
                    {
                        data: 'tanggal_mulai',
                        name: 'tanggal_mulai',
                        searchable: false
                    },
                    {
                        data: 'tanggal_berakhir',
                        name: 'tanggal_berakhir',
                        searchable: false
                    },
                    {
                        data: 'metode_pertemuan',
                        name: 'metode_pertemuan',
                        searchable: false
                    },
                    {
                        data: 'tanggal_pertemuan',
                        name: 'tanggal_pertemuan',
                        searchable: false
                    },
                    {
                        data: 'waktu_pertemuan',
                        name: 'waktu_pertemuan',
                        searchable: false
                    },
                    {
                        data: 'nama_file',
                        name: 'nama_file',
                        searchable: false
                    },
                ],                              
            })       
        }

        function rekapMoa(data){
            $("#dt-moa").DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "/rekapitulasiresult",
                    data: data
                },
                destroy  : true,
                dom: 'lBfrtip',
                buttons : [
                        {
                        extend: 'excel',
                        className: 'btn btn-sm btn-info mt-1 mb-2 btn-export-table d-inline ml-3 font-weight',                        
                        text: '<i class="fas fa-file-excel"></i> {{__("pages/master/rekapitulasi.ekspor_excel")}}',
                        exportOptions: {
                            modifier: {
                                // DataTables core
                                order: 'index', // 'current', 'applied', 'index',  'original'
                                page: 'all', // 'all',     'current'
                                search: 'none' // 'none',    'applied', 'removed'
                            }
                        }

                    }
                ],  
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],                                         
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        className: 'text-center',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                        className: 'text-center',
                        searchable: false
                    },
                    {
                        data: 'program',
                        name: 'program',
                        searchable: true
                    },
                    {
                        data: 'tanggal_pembuatan',
                        name: 'tanggal_pembuatan',
                        searchable: false

                    },
                    {
                        data: 'waktu_pembuatan',
                        name: 'waktu_pembuatan',
                        searchable: false
                    },
                    {
                        data: 'penginput',
                        name: 'users.nama',
                        searchable: true
                    },                    
                    {
                        data: 'pengusul',
                        name: 'pengusul.nama',
                        searchable: true
                    },
                    {
                        data: 'negara',
                        name: 'negara',
                        searchable: false
                    },
                    {
                        data: 'provinsi',
                        name: 'provinsi',      
                        searchable: false                                  
                    },
                    {
                        data: 'kota',
                        name: 'kota',
                        searchable: false
                    },
                    {
                        data: 'kecamatan',
                        name: 'kecamatan',
                        searchable: false
                    },
                    {
                        data: 'kelurahan',
                        name: 'kelurahan',
                        searchable: false
                    },
                    {
                        data: 'alamat',
                        name: 'alamat',
                        searchable: false
                    },
                    {
                        data: 'latitude',
                        name: 'latitude',
                        searchable: false
                    },
                    {
                        data: 'longitude',
                        name: 'longitude',
                        searchable: false
                    },
                    {
                        data: 'telepon',
                        name: 'telepon',
                        searchable: false
                    },                                            
                    {
                        data: 'nomor_moa',
                        name: 'nomor_moa',
                        searchable: false                            
                    },
                    {
                        data: 'nomor_moa_pengusul',
                        name: 'nomor_moa_pengusul',
                        searchable: false
                    },
                    {
                        data: 'nomor_mou',
                        name: 'nomor_mou',
                        searchable: false                            
                    },
                    {
                        data: 'nomor_mou_pengusul',
                        name: 'nomor_mou_pengusul',
                        searchable: false
                    },     
                    {
                        data: 'pejabat_penandatangan',
                        name: 'pejabat_penandatangan',
                        searchable: true
                    },
                    {
                        data: 'nik_nip_pengusul',
                        name: 'nik_nip_pengusul',
                        searchable: false
                    },
                    {
                        data: 'jabatan_pengusul',
                        name: 'jabatan_pengusul',
                        searchable: false
                    },               
                    {
                        data: 'tanggal_mulai',
                        name: 'tanggal_mulai',
                        searchable: false
                    },
                    {
                        data: 'tanggal_berakhir',
                        name: 'tanggal_berakhir',
                        searchable: false
                    },
                    {
                        data: 'metode_pertemuan',
                        name: 'metode_pertemuan',
                        searchable: false
                    },
                    {
                        data: 'tanggal_pertemuan',
                        name: 'tanggal_pertemuan',
                        searchable: false
                    },
                    {
                        data: 'waktu_pertemuan',
                        name: 'waktu_pertemuan',
                        searchable: false
                    },
                    {
                        data: 'nama_file',
                        name: 'nama_file',
                        searchable: false
                    },
                ],                              
            })       
        }

        function rekapIa(data){
            $("#dt-ia").DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "/rekapitulasiresult",
                    data: data
                },
                destroy  : true,
                dom: 'lBfrtip',
                buttons : [
                        {
                        extend: 'excel',
                        className: 'btn btn-sm btn-info mt-1 mb-2 btn-export-table d-inline ml-3 font-weight',                        
                        text: '<i class="fas fa-file-excel"></i> {{__("pages/master/rekapitulasi.ekspor_excel")}}',
                        exportOptions: {
                            modifier: {
                                // DataTables core
                                order: 'index', // 'current', 'applied', 'index',  'original'
                                page: 'all', // 'all',     'current'
                                search: 'none' // 'none',    'applied', 'removed'
                            }
                        }

                    }
                ],  
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],                                         
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        className: 'text-center',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                        className: 'text-center',
                        searchable: false
                    },
                    {
                        data: 'program',
                        name: 'program',
                        searchable: true
                    },
                    {
                        data: 'tanggal_pembuatan',
                        name: 'tanggal_pembuatan',
                        searchable: false

                    },
                    {
                        data: 'waktu_pembuatan',
                        name: 'waktu_pembuatan',
                        searchable: false
                    },
                    {
                        data: 'penginput',
                        name: 'users.nama',
                        searchable: true
                    },                    
                    {
                        data: 'pengusul',
                        name: 'pengusul.nama',
                        searchable: true
                    },
                    {
                        data: 'negara',
                        name: 'negara',
                        searchable: false
                    },
                    {
                        data: 'provinsi',
                        name: 'provinsi',      
                        searchable: false                                  
                    },
                    {
                        data: 'kota',
                        name: 'kota',
                        searchable: false
                    },
                    {
                        data: 'kecamatan',
                        name: 'kecamatan',
                        searchable: false
                    },
                    {
                        data: 'kelurahan',
                        name: 'kelurahan',
                        searchable: false
                    },
                    {
                        data: 'alamat',
                        name: 'alamat',
                        searchable: false
                    },
                    {
                        data: 'latitude',
                        name: 'latitude',
                        searchable: false
                    },
                    {
                        data: 'longitude',
                        name: 'longitude',
                        searchable: false
                    },
                    {
                        data: 'telepon',
                        name: 'telepon',
                        searchable: false
                    },                                            
                    {
                        data: 'nomor_ia',
                        name: 'nomor_ia',
                        searchable: false                            
                    },
                    {
                        data: 'nomor_ia_pengusul',
                        name: 'nomor_ia_pengusul',
                        searchable: false
                    },
                    {
                        data: 'nomor_moa',
                        name: 'nomor_moa',
                        searchable: false                            
                    },
                    {
                        data: 'nomor_moa_pengusul',
                        name: 'nomor_moa_pengusul',
                        searchable: false
                    },
                    {
                        data: 'nomor_mou',
                        name: 'nomor_mou',
                        searchable: false                            
                    },
                    {
                        data: 'nomor_mou_pengusul',
                        name: 'nomor_mou_pengusul',
                        searchable: false
                    },   
                    {
                        data: 'pejabat_penandatangan',
                        name: 'pejabat_penandatangan',
                        searchable: true
                    },
                    {
                        data: 'nik_nip_pengusul',
                        name: 'nik_nip_pengusul',
                        searchable: false
                    },
                    {
                        data: 'jabatan_pengusul',
                        name: 'jabatan_pengusul',
                        searchable: false
                    },                
                    {
                        data: 'tanggal_mulai',
                        name: 'tanggal_mulai',
                        searchable: false
                    },
                    {
                        data: 'tanggal_berakhir',
                        name: 'tanggal_berakhir',
                        searchable: false
                    },
                    {
                        data: 'metode_pertemuan',
                        name: 'metode_pertemuan',
                        searchable: false
                    },
                    {
                        data: 'tanggal_pertemuan',
                        name: 'tanggal_pertemuan',
                        searchable: false
                    },
                    {
                        data: 'waktu_pertemuan',
                        name: 'waktu_pertemuan',
                        searchable: false
                    },
                    {
                        data: 'nama_file',
                        name: 'nama_file',
                        searchable: false
                    },
                ],                              
            })       
        }
      
      

                                       

        const printErrorMsg = (msg) => {
            $.each(msg, function (key, value) {
                $('.' + key + '-error').text(value);
            });
        }

        function resetForm(){
            $('.jenis_dokumen-error').text('');
            $('.status-error').text('');
            $('.dibuat_oleh-error').text('');
            $('.dari_tanggal-error').text('');           
            $('.sampai_tanggal-error').text('');           
        } 
    </script>
@endpush
