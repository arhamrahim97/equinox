@extends('templates/dashboard')

@section('title-tab')
| {{__('pages/ia/index.title')}}
@endsection

@section('title')
{{__('pages/ia/index.title')}}
@endsection

@section('subTitle')
{{__('pages/ia/index.subTitle')}}
@endsection

@push('style')

@endpush

@section('content')
<section>    
    @if (in_array(Auth::user()->role, array('Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM', 'Prodi', 'Unit Kerja')))
        <div class="row mb-3">
            <div class="col-12">
                @component('components.buttons.add')
                    @slot('href')
                        /ia/create
                    @endslot
                @endcomponent
            </div>
        </div>   
    @endif

    @component('components.tables.mou_moa_ia')
        @slot('thead_nomor')
            {{__('components/table.nomor')}}
        @endslot
        @slot('thead_nomor_mou_moa_ia')
            {{__('components/table.nomor_ia_pengusul')}}
        @endslot    
        @slot('thead_pengusul')
            {{__('components/table.pengusul')}}
        @endslot
        @slot('thead_tanggal_mulai')
            {{__('components/table.tanggal_mulai')}}
        @endslot
        @slot('thead_tanggal_berakhir')
            {{__('components/table.tanggal_berakhir')}}            
        @endslot
        @slot('thead_dibuat_oleh')
            {{__('components/table.dibuat_oleh')}}            
        @endslot
        @slot('thead_aksi')
            {{__('components/table.aksi')}}            
        @endslot

        @slot('tbody_nomor_mou_moa_ia') 
            nomor_ia_pengusul
        @endslot
        
        @slot('link')
            ia/
        @endslot
        @slot('filterStatus')
        <div class="row mb-3">                             
            <div class="col-lg-6 col-12">
                <div class="form-group px-0">
                    <label for="my-select" class="font-weight-bold">{{__('components/table.dibuat_oleh')}}</label>
                    <select id="dibuat-oleh" class="form-control select2">                 
                        <option value="">{{__('components/table.semua')}}</option>
                        @forelse ($user as $item)
                        <option value="{{ $item->nama }}">{{ $item->nama }}</option>                                            
                        @empty
                            <option value="">{{__('components/table.tidak_ada')}}</option>                            
                        @endforelse                                                     
                    </select>
                </div>
            </div>       
            <div class="col-lg-6 col-12">
                <div class="form-group px-0">
                    <label for="my-select" class="font-weight-bold">Status</label>
                    <select id="status" class="form-control select2">
                        <option value="">{{__('components/table.semua')}}</option>
                        <option value="aktif">{{__('components/span.aktif')}}</option>                        
                        <option value="melewati_batas">{{__('components/span.melewati_batas')}}</option>                   
                        <option value="selesai">{{__('components/span.selesai')}}</option>                   
                    </select>
                </div>
            </div>
        </div>
        @endslot

    @endcomponent
    <form id="upload_laporan_pelaksanaan" method="POST" enctype="multipart/form-data" action="#">
        @csrf            
        <div class="modal fade" id="upload-lpj" tabindex="-1" role="dialog" aria-labelledby="upload-lpj" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{__('pages/ia/index.upload')}} {{__('pages/ia/index.laporan_pelaksanaan')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">                            
                            <label for="exampleFormControlFile1">{{__('components/form_mou_moa_ia.dokumen')}} (.pdf) :</label>
                            <input type="hidden" value="" id="ia_id_" name="id_ia_">
                            <input type="file" class="form-control form-control-file" id="dokumen" name="dokumen">
                            <span class="text-danger error-text dokumen-error"></span>                              
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fas fa-times"></i> {{__('pages/ia/index.tutup')}}</button>
                        @component('components.buttons.upload')                        
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

@endsection

@push('script')
<script>
    function showModal(id){                
        // $('form').attr('action', '/ia/upload_laporan_pelaksanaan/'+id);        
        $('#ia_id_').val(id)
        $('#upload-lpj').modal('show')        
    }

    $('#upload_laporan_pelaksanaan').submit(function(e) {            
        e.preventDefault();            
        $('.dokumen-error').text('');
        var formData = new FormData(this)                 
        $.ajax({             
            type: "POST",
            url: "/ia/upload_laporan_pelaksanaan/" + $('#ia_id_').val(),
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            data: formData,
            cache : false,
            processData: false,
            contentType: false,
            success: function (data) {                                    
                if ($.isEmptyObject(data.error)) {
                    // console.log(data)
                    swal("{{__('components/sweetalert.alertBerhasil')}}",
                        "{{__('components/sweetalert.msgUploadBerhasil', ['nama' => 'Laporan Hasil Pelaksanaan'])}}", {
                            icon: "success",
                            buttons: false,
                        });
                    $('.dokumen-error').text('');                    
                    setTimeout(
                    function () {
                        $(location).attr('href', '/ia');
                    }, 2000);
                }
                else{
                    printErrorMsg(data.error);                
                }
            },
        })
    })

    const printErrorMsg = (msg) => {
        $.each(msg, function (key, value) {
            $('.' + key + '-error').text(value);
        });
    }

    var size = 0
        $('#dokumen').change(function(){
            var arr = ['PDF', 'pdf'];            
            if(jQuery.inArray($(this).val().split('.').pop(), arr)  == -1){                 
                swal("{{__('components/sweetalert.bukanPDF')}}", {
                        icon: "warning",                        
                });
                $(this).val('')
                size = 0
            }   
            else{
                size = $(this)[0].files[0].size
            }
            if (size != 0) {
                if(parseFloat($(this)[0].files[0].size / 1024) > 10240){
                    swal("{{__('components/sweetalert.sizePDF')}}", {
                        icon: "warning",                        
                    });
                    $(this).val('')
                }
            }
        })
</script>
@endpush
