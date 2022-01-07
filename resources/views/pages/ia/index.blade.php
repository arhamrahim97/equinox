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
    @endcomponent

    <div class="modal fade" id="upload-lpj" tabindex="-1" role="dialog" aria-labelledby="upload-lpj" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><h1>sementara proses</h1></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Document (.pdf) :</label>
                        <input type="file" class="form-control form-control-file" id="dokumen" name="dokumen">
                        <span class="text-danger error-text dokumen-error"></span>                              
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('script')
@endpush
