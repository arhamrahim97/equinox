<div class="row">
    <div class="col-md-12">
        <div class="card card-space">
            <div class="card-header">
                <h4 class="card-title">{{$program}}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-2">
                        <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons" id="v-pills-tab" role="tablist" aria-orientation="vertical">   
                            <a class="nav-link" id="v-pills-profile-tab-icons" data-toggle="pill" href="#v-pills-profile-icons" role="tab" aria-controls="v-pills-profile-icons" aria-selected="false">
                                <i class="flaticon-user-4"></i>
                                Profil Pengusul
                            </a>
                            <a class="nav-link active show" id="v-pills-dokumen-tab-icons" data-toggle="pill" href="#v-pills-dokumen-icons" role="tab" aria-controls="v-pills-dokumen-icons" aria-selected="true">
                                <i class="flaticon-file"></i>
                                {{$type_doc}}
                            </a>      
                            <a class="nav-link" id="v-pills-meeting-tab-icons" data-toggle="pill" href="#v-pills-meeting-icons" role="tab" aria-controls="v-pills-meeting-icons" aria-selected="true">
                                <i class="flaticon-calendar"></i>
                                Pertemuan
                            </a>                            
                        </div>
                    </div>
                    <div class="col-12 col-md-10">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane" id="v-pills-profile-icons" role="tabpanel" aria-labelledby="v-pills-profile-tab-icons">                               
                                <div class="card-pricing">                                                              
                                    <ul class="specification-list" style="text-transform: capitalize; ">
                                        <li>
                                            <span class="name-specification">{{__('components/form_mou_moa_ia.pengusul')}}</span>
                                            <span class="status-specification">{{$pengusul}}</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">{{__('components/form_mou_moa_ia.negara')}}</span>
                                            <span class="status-specification">{{$negara}}</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">{{__('components/form_mou_moa_ia.provinsi')}}</span>
                                            <span class="status-specification">{{$provinsi}}</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">{{__('components/form_mou_moa_ia.kabupaten')}}</span>
                                            <span class="status-specification">{{$kota}}</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">{{__('components/form_mou_moa_ia.kecamatan')}}</span>
                                            <span class="status-specification">{{$kecamatan}}</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">{{__('components/form_mou_moa_ia.kelurahan')}}</span>
                                            <span class="status-specification">{{$kelurahan}}</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">{{__('components/form_mou_moa_ia.alamat')}}</span>
                                            <span class="status-specification">{{$alamat}}</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">Latitude | Longitude</span>
                                            <span class="status-specification">{{$latitude_longitude}}</span>
                                        </li>                                        
                                    </ul>                                                                        
                                </div>
                            </div>
                            <div class="tab-pane fade active show" id="v-pills-dokumen-icons" role="tabpanel" aria-labelledby="v-pills-dokumen-tab-icons">
                                <div class="card-pricing">                                                                    
                                    <ul class="specification-list" style="text-transform: capitalize; ">
                                        {{-- <li>
                                            <span class="name-specification">{{$title_nomor}}</span>
                                            <span class="status-specification">{{$nomor_mou}}</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">{{$title_nomor_pengusul}}</span>
                                            <span class="status-specification">{{$nomor_mou_pengusul}}</span>
                                        </li> --}}
                                        {{-- @if ($type_doc == 'IA')
                                            <li>
                                                <span class="name-specification">{{$title_nomor}}</span>
                                                <span class="status-specification">{{$nomor_mou}}</span>
                                            </li>
                                            <li>
                                                <span class="name-specification">{{$title_nomor_pengusul}}</span>
                                                <span class="status-specification">{{$nomor_mou_pengusul}}</span>
                                            </li>        
                                        @endif --}}
                                        @if (($type_doc == 'MOU') || ($type_doc == 'MOA') || ($type_doc == 'IA'))
                                            @if ($type_doc == 'IA')
                                                <li>
                                                    <span class="name-specification">{{$title_nomor_ia}}</span>
                                                    <span class="status-specification">{{$nomor_ia}}</span>
                                                </li>
                                                <li>
                                                    <span class="name-specification">{{$title_nomor_pengusul_ia}}</span>
                                                    <span class="status-specification">{{$nomor_ia_pengusul}}</span>
                                                </li>   
                                            @endif  
                                            @if (($type_doc == 'MOA') || ($type_doc == 'IA'))
                                                <li>
                                                    <span class="name-specification">{{$title_nomor_moa}}</span>
                                                    <span class="status-specification">{{$nomor_moa}}</span>
                                                </li>
                                                <li>
                                                    <span class="name-specification">{{$title_nomor_pengusul_moa}}</span>
                                                    <span class="status-specification">{{$nomor_moa_pengusul}}</span>
                                                </li>    
                                            @endif  

                                            <li>
                                                <span class="name-specification">{{$title_nomor_mou}}</span>
                                                <span class="status-specification">{{$nomor_mou}}</span>
                                            </li>
                                            <li>
                                                <span class="name-specification">{{$title_nomor_pengusul_mou}}</span>
                                                <span class="status-specification">{{$nomor_mou_pengusul}}</span>
                                            </li>                                                                                                               
                                        @endif  
                                        <li>
                                            <span class="name-specification">{{__('components/form_mou_moa_ia.nik_nip_pengusul')}}</span>
                                            <span class="status-specification">{{$nik_nip_pengusul}}</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">{{__('components/form_mou_moa_ia.jabatan_pengusul')}}</span>
                                            <span class="status-specification">{{$jabatan_pengusul}}</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">{{__('components/form_mou_moa_ia.program')}}</span>
                                            <span class="status-specification">{{$program}}</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">{{__('components/form_mou_moa_ia.tanggal_mulai_')}}</span>
                                            <span class="status-specification">{{$tanggal_mulai}}</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">{{__('components/form_mou_moa_ia.tanggal_berakhir_')}}</span>
                                            <span class="status-specification">{{$tanggal_berakhir}}</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">{{__('components/form_mou_moa_ia.dokumen')}} MOU</span>
                                            <span class="status-specification">@component('components.buttons.download_badge')
                                            @slot('url')
                                                {{$download_mou}}
                                            @endslot
                                            @endcomponent</span>
                                        </li>     
                                        @if (($type_doc == 'MOA') || ($type_doc == 'IA'))
                                            <li>
                                                <span class="name-specification">{{__('components/form_mou_moa_ia.dokumen')}} MOA</span>
                                                <span class="status-specification">@component('components.buttons.download_badge')
                                                @slot('url')
                                                    {{$download_moa}}
                                                @endslot
                                                @endcomponent</span>
                                            </li>                                                                           
                                        @endif  
                                        @if ($type_doc == 'MOA')
                                            {{$anggota_fakultas}}
                                        @endif
                                        @if ($type_doc == "IA")
                                            <li>
                                                <span class="name-specification">{{__('components/form_mou_moa_ia.dokumen')}} IA</span>
                                                <span class="status-specification">@component('components.buttons.download_badge')
                                                @slot('url')
                                                    {{$download_ia}}
                                                @endslot
                                                @endcomponent</span>
                                            </li>                         
                                            <li>
                                                <span class="name-specification">{{__('components/form_mou_moa_ia.laporan_pelaksanaan')}}</span>
                                                <span class="status-specification">
                                                    {{$download_laporan_pelaksanaan}}
                                                </span>
                                            </li>      
                                            {{$anggota_fakultas}}                           
                                            {{$anggota_prodi}}
                                            <li>
                                                <span class="name-specification">{{__('components/form_mou_moa_ia.nilai_uang')}}</span>
                                                <span class="status-specification" class="rupiah">{{$nilai_uang}}</span>
                                            </li>
                                            {{-- <li>
                                                <span class="name-specification">{{__('components/form_mou_moa_ia.program_studi_')}}</span>
                                                <span class="status-specification">
                                                    {{$anggota_prodi}}
                                                </span>
                                            </li>      --}}
                                        @endif
                                    </ul>                                                                        
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-meeting-icons" role="tabpanel" aria-labelledby="v-pills-meeting-tab-icons">
                                <div class="card-pricing">                                                                    
                                    <ul class="specification-list" style="text-transform: capitalize; ">
                                        <li>
                                            <span class="name-specification">{{__('components/form_mou_moa_ia.metode_pertemuan')}}</span>
                                            <span class="status-specification">{{$metode_pertemuan}}</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">{{__('components/form_mou_moa_ia.tanggal_pertemuan_')}}</span>
                                            <span class="status-specification">{{ date('d-m-Y', strtotime($tanggal_pertemuan))}}</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">{{__('components/form_mou_moa_ia.waktu_pertemuan_')}}</span>
                                            <span class="status-specification">{{ date('H:i', strtotime($waktu_pertemuan)) }}</span>
                                        </li>
                                        <li>
                                            <span class="name-specification">{{__('components/form_mou_moa_ia.tempat_pertemuan')}}</span>
                                            <span class="status-specification">{{$tempat_pertemuan}}</span>
                                        </li>     
                                    </ul>                                                                        
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</div>
</div>

@push('script')
{{-- <script>
    $('.rupiah').mask('000.000.000.000.000', {reverse: true})
</script> --}}
@endpush