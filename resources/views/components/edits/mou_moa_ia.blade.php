@push('style')
    <!-- Map -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""
    />
    <script
      src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
      integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
      crossorigin=""
    ></script>
    <style>
        #peta {
            height: 300px;
        }      
        .tambahPengusul a{
            width: 100%
        }          
    </style>
@endpush

<form id="{{$form_id}}" method="POST" enctype="multipart/form-data" action="#">
    @csrf    
    @method('PUT')
    <div class="card-body"> 
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.instansi_pengusul')}} :</label>
                    <div class="row">
                        <div class="col-lg-10 col-md-9 col-sm-12">
                            <select id="pengusul" name="pengusul_id" class="form-control select2">
                                <option value="">{{__('components/form_mou_moa_ia.pilih_salah_satu')}}</option>
                                {{$pengusul}}                                
                            </select>    
                            <span class="text-danger error-text pengusul_id-error"></span>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-12 tambahPengusul">
                            @component('components.buttons.add')
                                @slot('href')
                                    /pengusul/create
                                @endslot
                            @endcomponent
                        </div>   
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.daerah')}} :</label>
                    <input name="daerah" id="daerah" type="text" class="form-control" disabled>
                    <span class="text-danger error-text daerah-error"></span>
                </div>    
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.negara')}} :</label>
                    <input name="negara" id="negara" type="text" class="form-control" disabled>
                    <span class="text-danger error-text negara-error"></span>
                </div>    
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.provinsi')}} :</label>
                    <input name="provinsi" id="provinsi" type="text" class="form-control" disabled>
                    <span class="text-danger error-text provinsi-error"></span>
                </div>  
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.kabupaten')}} :</label>
                    <input name="kabupaten" id="kota" type="text" class="form-control" disabled>
                    <span class="text-danger error-text kota-error"></span>
                </div>  
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.kecamatan')}} :</label>
                    <input name="kecamatan" id="kecamatan" type="text" class="form-control" disabled>
                    <span class="text-danger error-text kecamatan-error"></span>
                </div>    
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.kelurahan')}} :</label>
                    <input name="kelurahan" id="kelurahan" type="text" class="form-control" disabled>
                    <span class="text-danger error-text kelurahan-error"></span>
                </div>  
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.alamat')}} :</label>
                    <input name="alamat" id="alamat" type="text" class="form-control" disabled>
                    <span class="text-danger error-text alamat-error"></span>
                </div>  
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>{{__('components/form_mou_moa_ia.titik_koordinat')}} :</label> 
                            <div class="cover">
                                @if ($form_id == 'form_mou')
                                <div id="peta" style="position: relative;  pointer-events: none;">
                                    <div class="overlay" style="background: rgba(0, 0, 0, 0.3); cursor: not-allowed; position: absolute; top: 0; z-index: 500; width: 100%; height: 300px">              
                                    </div>                                                       
                                </div> 
                                @else 
                                    <div id="peta">                                                
                                    </div>                
                                @endif                             
                            </div> 
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <input name="latitude"
                                    id="latitude"
                                    type="text"
                                    class="form-control"
                                    placeholder="Latitude"
                                    aria-label="Latitude" disabled 
                                    />
                                    <span class="text-danger error-text latitude-error"></span>
                                </div>
                                <div class="col-md-6">
                                    <input name="longitude"
                                    id="longitude"
                                    type="text"
                                    class="form-control"
                                    placeholder="Longitude"
                                    aria-label="Longitude" disabled
                                    />
                                    <span class="text-danger error-text longitude-error"></span>
                                </div>
                            </div>                    
                        </div>  
                    </div>
                </div>                
            </div>  

            <div class="col-lg-12">
                <div class="separator-solid mt-5 mb-4"></div>
            </div>
            @if ($form_id == 'form_mou')
            {{-- if MOU --}}
            <div class="col-lg-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.nomor_mou')}} :</label>
                    <input name="nomor_mou" id="nomor_mou" type="text" class="form-control" value="{{$nomor_mou}}">
                    <span class="text-danger error-text nomor_mou-error"></span>
                </div>   
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.nomor_mou_pengusul')}} :</label>
                    <input name="nomor_mou_pengusul" id="nomor_mou_pengusul" type="text" class="form-control" value="{{$nomor_mou_pengusul}}">
                    <span class="text-danger error-text nomor_mou_pengusul-error"></span>
                </div> 
            </div>
            {{-- if MOU --}}

            @elseif($form_id == 'form_moa')
            {{-- if MOA --}}                         
            <div class="col-lg-12 col-md-12">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.nomor_mou_pengusul')}} :</label>
                    <select id="nomor_mou_pengusul_select" name="nomor_mou_pengusul" id="nomor_mou_pengusul" class="form-control select2">
                        <option value="">{{__('components/form_mou_moa_ia.pilih_salah_satu')}}</option>
                        {{$nomor_mou_pengusul}}
                    </select>    
                    <span class="text-danger error-text nomor_mou_pengusul-error"></span>     
                </div>   
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.nomor_moa')}} :</label>
                    <input name="nomor_moa" id="nomor_moa" type="text" class="form-control" value="{{$nomor_moa}}">
                    <span class="text-danger error-text nomor_moa-error"></span>                 
                </div>   
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.nomor_moa_pengusul')}} :</label>
                    <input name="nomor_moa_pengusul" id="nomor_moa_pengusul" type="text" class="form-control" value="{{$nomor_moa_pengusul}}">
                    <span class="text-danger error-text nomor_moa_pengusul-error"></span>                 
                </div> 
            </div>                                             
            {{-- if MOA --}}

            @elseif($form_id == 'form_ia')
            {{-- if IA --}}    
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.nomor_moa_pengusul')}} :</label>
                    <select id="nomor_moa_pengusul" name="nomor_moa_pengusul" class="form-control select2">
                        <option value="">{{__('components/form_mou_moa_ia.pilih_salah_satu')}}</option>
                        {{$nomor_moa_pengusul}}                                 
                    </select>      
                    <span class="text-danger error-text nomor_moa_pengusul-error"></span>                 
                </div>   
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.nomor_mou_pengusul')}} :</label>
                    <input name="nomor_mou_pengusul" id="nomor_mou_pengusul" type="text" class="form-control" disabled value="{{$nomor_mou_pengusul}}">
                    <span class="text-danger error-text nomor_mou_pengusul-error"></span>                 
                </div>   
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.nomor_ia')}} :</label>
                    <input name="nomor_ia" id="nomor_ia" type="text" class="form-control" value="{{$nomor_ia}}" >
                    <span class="text-danger error-text nomor_ia-error"></span>                 
                </div>   
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.nomor_ia_pengusul')}} :</label>
                    <input name="nomor_ia_pengusul" id="nomor_ia_pengusul" type="text" class="form-control" value="{{$nomor_ia_pengusul}}">
                    <span class="text-danger error-text nomor_ia_pengusul-error"></span>                 
                </div> 
            </div>            
            {{-- if IA --}}                    
            @endif
            
            <div class="col-12">                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>{{__('components/form_mou_moa_ia.program')}} {{$document_category}} :</label>
                            <textarea class="form-control" name="program" id="program" cols="30" rows="2">{{$program}}</textarea>
                            <span class="text-danger error-text program-error"></span>                                         
                        </div>       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>{{__('components/form_mou_moa_ia.tanggal_mulai')}} :</label>
                            <input name="tanggal_mulai" id="tanggal_mulai" type="text" class="form-control tanggal" value="{{$tanggal_mulai}} ">
                            <span class="text-danger error-text tanggal_mulai-error"></span>                              
                        </div>   
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>{{__('components/form_mou_moa_ia.tanggal_berakhir')}} :</label>
                            <input name="tanggal_berakhir" id="tanggal_berakhir" type="text" class="form-control tanggal" value="{{$tanggal_berakhir}}">
                            <span class="text-danger error-text tanggal_berakhir-error"></span>                              
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">{{__('components/form_mou_moa_ia.dokumen')}} (.pdf) :</label>
                            <input type="file" class="form-control form-control-file" id="dokumen" name="dokumen">
                            <span class="text-warning error-text">{{__('components/form_mou_moa_ia.dokumen_ubah')}}</span>  
                            <span class="text-danger error-text dokumen-error"></span>                              
                        </div>        
                    </div>
                </div>
                @if ($form_id == 'form_ia')
                    @if (in_array(Auth::user()->role, array('LPPM', 'Fakultas', 'Pascasarjana', 'PSDKU')))
                        {{-- IF IA && role == Fakultas, Pasca Sarjana, PSDKU --}}
                        @if (in_array(Auth::user()->role, array('Fakultas', 'Pascasarjana', 'PSDKU')))
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>{{__('components/form_mou_moa_ia.program_studi')}} :</label>
                                        <div class="select2-input select2-warning">
                                            <select id="program_studi" name="program_studi[]" id="program_studi" class="form-control select2" multiple="multiple">
                                                <option value="">{{__('components/form_mou_moa_ia.pilih_salah_satu')}}</option>
                                                {{$prodi_fakultas}}  
                                            </select>
                                            <span class="text-danger error-text program_studi-error"></span>                              
                                        </div>
                                    </div>
                                </div>
                            </div>           
                        @endif
                        {{-- IF IA && role == LPPM --}}
                        @if (Auth::user()->role == 'LPPM')
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>{{__('components/form_mou_moa_ia.fakultas')}} :</label>
                                        <div class="select2-input select2-warning">
                                            <select id="fakultas" name="fakultas[]" class="form-control select2" multiple="multiple">
                                                {{-- <option value="">{{__('components/form_mou_moa_ia.pilih_salah_satu')}}</option> --}}
                                                {{$fakultas_all}}
                                            </select>
                                            <span class="text-danger error-text fakultas-error"></span>                              
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>{{__('components/form_mou_moa_ia.program_studi')}} :</label>
                                        <div class="select2-input select2-warning">
                                            <select id="program_studi" name="program_studi[]" class="form-control select2" multiple="multiple">
                                                {{-- <option value="">{{__('components/form_mou_moa_ia.pilih_salah_satu')}}</option>
                                                {{$prodi_all}} --}}
                                            </select>
                                            <span class="text-danger error-text program_studi-error"></span>                              
                                        </div>
                                    </div>
                                </div>                
                            </div>                  
                        @endif       
                        {{-- IF IA && role == prodi --}}
                    @else                            
                    @endif        
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>{{__('components/form_mou_moa_ia.manfaat')}} :</label>
                                <textarea class="form-control" name="manfaat" id="manfaat" cols="30" rows="2">{{$manfaat}}</textarea>
                                <span class="text-danger error-text manfaat-error"></span>                                         
                            </div>       
                        </div>                
                    </div>                                       
                    <div class="row">                            
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>{{__('components/form_mou_moa_ia.jenis_kerjasama')}} :</label>
                                <div class="select2-input select2-warning">
                                    <select id="jenis_kerjasama" name="jenis_kerjasama[]" class="form-control select2" multiple="multiple">
                                        {{$jenis_kerjasama}}                                        
                                    </select>
                                    <span class="text-danger error-text jenis_kerjasama-error"></span>                              
                                </div>
                            </div>
                        </div>                                               
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>{{__('components/form_mou_moa_ia.nilai_uang')}} :</label>
                                <input name="nilai_uang" id="nilai_uang" type="text" class="form-control rupiah" value="{{$nilai_uang}}">
                                <span class="text-danger error-text nilai_uang-error"></span>                              
                            </div>   
                        </div>
                    </div>          
                @endif       
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>{{__('components/form_mou_moa_ia.pejabat_penandatangan')}} :</label>
                            <input name="pejabat_penandatangan" id="pejabat_penandatangan" type="text" class="form-control" value="{{$pejabat_penandatangan}}">
                            <span class="text-danger error-text pejabat_penandatangan-error"></span>                 
                        </div>   
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>{{__('components/form_mou_moa_ia.nik_nip_pengusul')}} :</label>
                            <input name="nik_nip_pengusul" id="nik_nip_pengusul" type="text" class="form-control" value="{{$nik_nip_pengusul}}">
                            <span class="text-danger error-text nik_nip_pengusul-error"></span>                 
                        </div>   
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>{{__('components/form_mou_moa_ia.jabatan_pengusul')}} :</label>
                            <input name="jabatan_pengusul" id="jabatan_pengusul" type="text" class="form-control" value="{{$jabatan_pengusul}}">
                            <span class="text-danger error-text jabatan_pengusul-error"></span>                 
                        </div> 
                    </div>
                </div>         
                <div class="row">
                    <div class="col-12">
                        <div class="separator-solid mt-5 mb-4"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-check">
                            <label>{{__('components/form_mou_moa_ia.metode_pertemuan')}} :</label><br>
                            <label class="form-radio-label">
                                <input class="form-radio-input" type="radio" id="desktodesk" name="metode_pertemuan" value="Desk to Desk" @if ($metode_pertemuan == 'Desk to Desk') checked @endif>
                                <span class="form-radio-sign">{{__('components/form_mou_moa_ia.desktodesk')}}</span>
                            </label>
                            <label class="form-radio-label ml-5">
                                <input class="form-radio-input" type="radio" id="ceremonial" name="metode_pertemuan" value="Ceremonial" @if ($metode_pertemuan == 'Ceremonial')
                                    checked
                                @endif>
                                <span class="form-radio-sign">{{__('components/form_mou_moa_ia.ceremonial')}}</span>
                            </label>
                            <div>
                                <span class="text-danger error-text metode_pertemuan-error"></span>                              
                            </div>
                        </div>
                    </div>        
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>{{__('components/form_mou_moa_ia.tanggal_pertemuan')}} :</label>
                            <input name="tanggal_pertemuan" id="tanggal_pertemuan" type="text" class="form-control tanggal" value="{{$tanggal_pertemuan}} ">
                            <span class="text-danger error-text tanggal_pertemuan-error"></span>                              
                        </div>   
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>{{__('components/form_mou_moa_ia.waktu_pertemuan')}} :</label>
                            <input name="waktu_pertemuan" id="waktu_pertemuan" type="text" class="form-control waktu" value="{{$waktu_pertemuan}}">
                            <span class="text-danger error-text waktu_pertemuan-error"></span>                              
                        </div> 
                    </div>        
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>{{__('components/form_mou_moa_ia.tempat_pertemuan')}} :</label>
                            <textarea class="form-control" name="tempat_pertemuan" id="tempat_pertemuan" cols="30" rows="2">{{$tempat_pertemuan}}</textarea>
                            <span class="text-danger error-text tempat_pertemuan-error"></span>                                                 
                        </div>     
                    </div>
                </div>
            </div>
        </div>        
    </div>

    <div class="card-action">
        <div class="row">
            <div class="col-md-12 text-right">
                @component('components.buttons.submit')                                    
                @endcomponent                                
            </div>										
        </div>
    </div>
</form>

@push('script')
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>

    <script>
        $(function() {      
            getListProdiEdit()                 

            $('.tanggal').mask('00-00-0000');
            $('.rupiah').mask('000.000.000.000.000', {reverse: true})
            $('.waktu').mask('00:00');
            $('#nik_nip_pengusul').mask('00000000000000000000');

            $('#latitude').val('{{$latitude}}')
            $('#longitude').val('{{$longitude}}')            
            $('#alamat').val($('#pengusul').find('option:selected').attr('alamat'))
            $('#daerah').val($('#pengusul').find('option:selected').attr('daerah'))
            $('#negara').val($('#pengusul').find('option:selected').attr('negara'))
            $('#provinsi').val($('#pengusul').find('option:selected').attr('provinsi'))
            $('#kota').val($('#pengusul').find('option:selected').attr('kota'))
            $('#kecamatan').val($('#pengusul').find('option:selected').attr('kecamatan'))
            $('#kelurahan').val($('#pengusul').find('option:selected').attr('kelurahan'))
            return updateMarker($("#latitude").val(), $("#longitude").val());        
        });

        $('#pengusul').change(function(){
            $('#nik_nip_pengusul').val('')
            $('#jabatan_pengusul').val('')
            $('#pejabat_penandatangan').val('')
            $('#alamat').val($(this).find('option:selected').attr('alamat'))
            $('#latitude').val($(this).find('option:selected').attr('latitude'))
            $('#longitude').val($(this).find('option:selected').attr('longitude'))
            $('#daerah').val($(this).find('option:selected').attr('daerah'))
            $('#negara').val($(this).find('option:selected').attr('negara'))
            $('#provinsi').val($(this).find('option:selected').attr('provinsi'))
            $('#kota').val($(this).find('option:selected').attr('kota'))
            $('#kecamatan').val($(this).find('option:selected').attr('kecamatan'))
            $('#kelurahan').val($(this).find('option:selected').attr('kelurahan'))
            return updateMarker($("#latitude").val(), $("#longitude").val());        
        })

        function getListProdi() {
            var idFakultas = $('#fakultas').val();            
                $.ajax({
                    url: "/getProdi",
                    type: "GET",
                    data: {
                        idFakultas: idFakultas,                        
                    },
                    success: function (data) {
                        // console.log(data)                        
                        $('#program_studi').empty();
                        $('#program_studi').append(data.html);                       
                    },
                })            
        }

        function getListProdiEdit() {
            var idFakultas = $('#fakultas').val();  
            var idIa = '{{$id_ia}}'
                $.ajax({
                    url: "/getProdiEdit",
                    type: "GET",
                    data: {
                        idFakultas: idFakultas,       
                        idIa: idIa                 
                    },
                    success: function (data) {                                             
                        $('#program_studi').empty();
                        $('#program_studi').append(data.html);                       
                    },
                })            
        }

        $('#fakultas').change(function(){
            getListProdi()            
        })


        $('#nomor_moa_pengusul').change(function(){
            $('#nomor_mou_pengusul').val($(this).find('option:selected').attr('nomor_mou_pengusul'))
        })

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

        $('#{{$form_id}}').submit(function(e) {
            $('#latitude').attr('disabled', false)
            $('#longitude').attr('disabled', false)            
            $('#nilai_uang').unmask()            
            e.preventDefault();            
            resetForm();                 
            var formData = new FormData(this)                 
            $.ajax({             
                type: "{{$form_method}}",
                url: "{{$form_action}}",
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                data: formData,
                cache : false,
                processData: false,
                contentType: false,
                success: function (data) {                    
                    $('#latitude').attr('disabled', true)
                    $('#longitude').attr('disabled', true)
                    $('.rupiah').mask('000.000.000.000.000', {reverse: true})
                    if ($.isEmptyObject(data.error)) {
                        // console.log(data)
                        swal("{{__('components/sweetalert.alertBerhasil')}}",
                            "{{__('components/sweetalert.msgUbahBerhasil', ['nama' => "$document_category "])}}", {
                                icon: "success",
                                buttons: false,
                            });
                        resetForm();
                        setTimeout(
                        function () {
                            $(location).attr('href', '{{$back}}');
                        }, 2000);
                    }
                    else{
                        printErrorMsg(data.error);
                        swal("{{__('components/sweetalert.kesalahanInput')}}", {
                            icon: "warning",                        
                        });
                    }
                },
            })
        })

        const printErrorMsg = (msg) => {
            $.each(msg, function (key, value) {
                $('.' + key + '-error').text(value);
            });
        }

        function resetForm(){
            $('.pengusul_id-error').text('');
            $('.latitude-error').text('');
            $('.longitude-error').text('');
            $('.nomor_mou-error').text('');
            $('.nomor_mou_pengusul-error').text('');
            $('.nomor_moa-error').text('');
            $('.nomor_moa_pengusul-error').text('');
            $('.nomor_ia-error').text('');
            $('.nomor_ia_pengusul-error').text('');
            $('.nik_nip_pengusul-error').text('');
            $('.jabatan_pengusul-error').text('');
            $('.program-error').text('');
            $('.tanggal_mulai-error').text('');
            $('.tanggal_berakhir-error').text('');
            $('.dokumen-error').text('');
            $('.program_studi-error').text('');
            $('.fakultas-error').text('');
            $('.metode_pertemuan-error').text('');
            $('.tanggal_pertemuan-error').text('');
            $('.waktu_pertemuan-error').text('');
            $('.tempat_pertemuan-error').text('');
        } 

          


    </script>    

    <!-- Map -->
    <script>
        // function refreshMap() {
            var map = L.map("peta").setView([$("#latitude").val(), $("#longitude").val()], 13);

            var tiles = L.tileLayer(
                "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYW1pcnVsaGlkYXlhaCIsImEiOiJja3hlNGxicnQxY3lyMndxOTVxNndpMGdjIn0.WvONFefMPNi0U8JZEsJcIw",
                {
                maxZoom: 12,
                attribution:
                    'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: "mapbox/streets-v11",
                tileSize: 512,
                zoomOffset: -1,
                }
            ).addTo(map);

            var marker = L.marker([$("#latitude").val(), $("#longitude").val()]).addTo(map);

            function updateMarker(lat, lng) {
                marker
                .setLatLng([lat, lng])
                .bindPopup("Lokasi Pilihan : " + marker.getLatLng().toString())
                .openPopup();
                map.flyTo([lat, lng], 12);
                return false;
            }

            map.on("click", function (e) {
                let latitude = e.latlng.lat.toString().substring(0, 15);
                let longitude = e.latlng.lng.toString().substring(0, 15);
                $("#latitude").val(latitude);
                $("#longitude").val(longitude);
                updateMarker(latitude, longitude);
                
            });

            // function flyToLatLng(lat, lng) {
            //     mymap.flyTo([lat, lng], 15);
            // };

            var updateMarkerByInputs = function () {
                return updateMarker($("#latitude").val(), $("#longitude").val());
            };

            $("#latitude").on("input", updateMarkerByInputs);
            $("#longitude").on("input", updateMarkerByInputs);

        // }
    </script>
    <!-- Map -->
@endpush

