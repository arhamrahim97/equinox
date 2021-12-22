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
    </style>
@endpush

<form method="{{$form_method}}" id="{{$form_id}}" enctype="multipart/form-data" action="{{$form_action}}">
    <div class="card-body"> 
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.pengusul')}} :</label>
                    <div class="row">
                        <div class="col-lg-10 col-md-9 col-sm-12">
                            <select id="pengusul_select" name="pengusul" class="form-control select2">
                                <option value="">&nbsp;</option>
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">California</option>
                                    <option value="NV" >Nevada</option>
                                    <option value="OR">Oregon</option>
                                    <option value="WA">Washington</option>
                                </optgroup>                                 
                            </select>                   
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-12 text-right">
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
                    <input name="daerah" type="text" class="form-control" disabled>
                </div>    
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.negara')}} :</label>
                    <input name="negara" type="text" class="form-control" disabled>
                </div>    
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.provinsi')}} :</label>
                    <input name="provinsi" type="text" class="form-control" disabled>
                </div>  
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.kabupaten')}} :</label>
                    <input name="kabupaten" type="text" class="form-control" disabled>
                </div>  
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.kecamatan')}} :</label>
                    <input name="kecamatan" type="text" class="form-control" disabled>
                </div>    
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.kelurahan')}} :</label>
                    <input name="kelurahan" type="text" class="form-control" disabled>
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
                                </div>
                                <div class="col-md-6">
                                    <input name="longitude"
                                    id="longitude"
                                    type="text"
                                    class="form-control"
                                    placeholder="Longitude"
                                    aria-label="Longitude" disabled
                                    />
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
                    <input name="nomor_mou_universitas" type="text" class="form-control" required="">
                </div>   
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.nomor_mou_pengusul')}} :</label>
                    <input name="nomor_mou_pengusul" type="text" class="form-control" required="">
                </div> 
            </div>
            {{-- if MOU --}}

            @elseif($form_id == 'form_moa')
            {{-- if MOA --}}                         
            <div class="col-lg-12 col-md-12">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.nomor_mou_pengusul')}} :</label>
                    <select id="nomor_mou_pengusul_select" name="nomor_mou_pengusul" class="form-control select2">
                        <option value="">&nbsp;</option>                        
                        <option value="AK">Alaska</option>
                        <option value="HI">Hawaii</option>                       
                        <option value="WA">Washington</option>                              
                    </select>         
                </div>   
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.nomor_moa')}} :</label>
                    <input name="nomor_moa" type="text" class="form-control" required="">
                </div>   
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.nomor_moa_pengusul')}} :</label>
                    <input name="nomor_moa_pengusul" type="text" class="form-control" required="">
                </div> 
            </div>                                             
            {{-- if MOA --}}

            @elseif($form_id == 'form_ia')
            {{-- if IA --}}    
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.nomor_moa_pengusul')}} :</label>
                    <select id="nomor_moa_pengusul_select" name="nomor_moa_pengusul" class="form-control select2">
                        <option value="">&nbsp;</option>                        
                        <option value="AK">Alaska</option>
                        <option value="HI">Hawaii</option>                       
                        <option value="WA">Washington</option>                              
                    </select>       
                </div>   
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.nomor_mou_pengusul')}} :</label>
                    <input name="nomor_mou_pengusul" type="text" class="form-control" required="" disabled>
                </div>   
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.nomor_ia')}} :</label>
                    <input name="nomor_ia" type="text" class="form-control" required="">
                </div>   
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>{{__('components/form_mou_moa_ia.nomor_ia_pengusul')}} :</label>
                    <input name="nomor_ia_pengusul" type="text" class="form-control" required="">
                </div> 
            </div>            
            {{-- if IA --}}                    
            @endif
            
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>{{__('components/form_mou_moa_ia.nik_nip_pengusul')}} :</label>
                            <input name="nik_nip_pengusul" type="text" class="form-control" required="">
                        </div>   
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>{{__('components/form_mou_moa_ia.jabatan_pengusul')}} :</label>
                            <input name="jabatan_pengusul" type="text" class="form-control" required="">
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>{{__('components/form_mou_moa_ia.program')}} {{$document_category}} :</label>
                            <textarea class="form-control" name="" id="" cols="30" rows="2"></textarea>
                        </div>       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>{{__('components/form_mou_moa_ia.tanggal_mulai')}} :</label>
                            <input name="tanggal_mulai" type="text" class="form-control" required="">
                        </div>   
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>{{__('components/form_mou_moa_ia.tanggal_berakhir')}} :</label>
                            <input name="tanggal_berakhir" type="text" class="form-control" required="">
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">{{__('components/form_mou_moa_ia.unggah_dokumen')}} :</label>
                            <input type="file" class="form-control form-control-file" id="exampleFormControlFile1">
                        </div>        
                    </div>
                </div>
                {{-- IF IA && role == Fakultas, Pasca Sarjana, PSDKU --}}
                @if (($form_id == 'form_ia'))
                    <div class="row" style="border: 1px solid green">
                        <div class="col">
                            <div class="form-group">
                                <label>{{__('components/form_mou_moa_ia.program_studi')}} :</label>
                                <div class="select2-input select2-warning">
                                    <select id="program_studi1" name="program_studi[]" class="form-control select2" multiple="multiple">
                                        <option value="">&nbsp;</option>                    
                                        <option value="AL">Alabama</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TX">Texas</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="WI">Wisconsin</option>                   
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>            
                @endif
    
                {{-- IF IA && role == LPPM --}}
                @if (($form_id == 'form_ia'))
                    <div class="row" style="border: 1px solid tomato">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>{{__('components/form_mou_moa_ia.fakultas')}} :</label>
                                <div class="select2-input select2-warning">
                                    <select id="fakultas" name="fakultas[]" class="form-control select2" multiple="multiple">
                                        <option value="">&nbsp;</option>                    
                                        <option value="AL">Alabama</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TX">Texas</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="WI">Wisconsin</option>                   
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>{{__('components/form_mou_moa_ia.program_studi')}} :</label>
                                <div class="select2-input select2-warning">
                                    <select id="program_studi2" name="program_studi[]" class="form-control select2" multiple="multiple">
                                        <option value="">&nbsp;</option>                    
                                        <option value="AL">Alabama</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TX">Texas</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="WI">Wisconsin</option>                   
                                    </select>
                                </div>
                            </div>
                        </div>                
                    </div>            
                @endif
                
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
                                <input class="form-radio-input" type="radio" name="optionsRadios" value="" checked="">
                                <span class="form-radio-sign">{{__('components/form_mou_moa_ia.desktodesk')}}</span>
                            </label>
                            <label class="form-radio-label ml-5">
                                <input class="form-radio-input" type="radio" name="optionsRadios" value="">
                                <span class="form-radio-sign">{{__('components/form_mou_moa_ia.ceremonial')}}</span>
                            </label>
                        </div>
                    </div>        
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>{{__('components/form_mou_moa_ia.tanggal_pertemuan')}} :</label>
                            <input name="tanggal_mulai" type="text" class="form-control" required="">
                        </div>   
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>{{__('components/form_mou_moa_ia.waktu_pertemuan')}} :</label>
                            <input name="tanggal_berakhir" type="text" class="form-control" required="">
                        </div> 
                    </div>        
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>{{__('components/form_mou_moa_ia.tempat_pertemuan')}} :</label>
                            <textarea class="form-control" name="" id="" cols="30" rows="2"></textarea>
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
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
      integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>

    <!-- Map -->
    <script>
      var map = L.map("peta").setView([-0.813367, 120.1366159], 13);

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

      var marker = L.marker([-0.813367, 120.1366159]).addTo(map);

      function updateMarker(lat, lng) {
        marker
          .setLatLng([lat, lng])
          .bindPopup("Lokasi Pilihan : " + marker.getLatLng().toString())
          .openPopup();
        return false;
      }

      map.on("click", function (e) {
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);
        $("#latitude").val(latitude);
        $("#longitude").val(longitude);
        updateMarker(latitude, longitude);
      });

      var updateMarkerByInputs = function () {
        return updateMarker($("#latitude").val(), $("#longitude").val());
      };

      $("#latitude").on("input", updateMarkerByInputs);
      $("#longitude").on("input", updateMarkerByInputs);
    </script>
    <!-- Map -->
@endpush

