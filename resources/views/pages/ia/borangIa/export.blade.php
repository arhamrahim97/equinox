<table>
    <thead>
        <tr>
            <th></th>
        </tr>
        <tr>
            <th></th>
            <th colspan="2" style="vertical-align: center;font-weight : bold">
                {{__('components/table.tipe_kerjasama')}} :</th>
            <th colspan="2" style="vertical-align: center;font-weight : bold">
                @if (!$requestJenisKerjasama)
                {{__('pages/ia/borangIa/index.penelitian')}}, {{__('pages/ia/borangIa/index.pendidikan')}},
                {{__('pages/ia/borangIa/index.pengabdian_kepada_masyarakat')}}
                @else
                @php
                $totalJenisKerjasama = count($requestJenisKerjasama);
                $index = 1;
                for ($i=0; $i < $totalJenisKerjasama; $i++) { if ($requestJenisKerjasama[$i]=='Penelitian' ){ echo
                    __('pages/ia/borangIa/index.penelitian'); } else if ($requestJenisKerjasama[$i]=='Pendidikan' ){
                    echo __('pages/ia/borangIa/index.penelitian'); } else { echo
                    __('pages/ia/borangIa/index.pengabdian_kepada_masyarakat'); } if ($index !=$totalJenisKerjasama){
                    echo ", " ; } $index++; } @endphp @endif </th>
        </tr>
        <tr>
            <th></th>
            <th colspan="2" style="vertical-align: center;font-weight : bold">
                {{__('components/table.tingkat')}} :</th>
            <th colspan="2" style="vertical-align: center;font-weight : bold">
                @if (!$requestTingkat)
                {{__('pages/ia/borangIa/index.internasional')}}, {{__('pages/ia/borangIa/index.nasional')}},
                {{__('pages/ia/borangIa/index.lokal')}}
                @else
                @php
                $totalTingkat = count($requestTingkat);
                $index = 1;
                for ($i=0; $i < $totalTingkat; $i++) { if ($requestTingkat[$i]=='internasional' ){ echo
                    __('pages/ia/borangIa/index.internasional'); } else if ($requestTingkat[$i]=='nasional' ){ echo
                    __('pages/ia/borangIa/index.nasional'); } else { echo __('pages/ia/borangIa/index.lokal'); } if
                    ($index !=$totalTingkat){ echo ", " ; } $index++; } @endphp @endif </th>
        </tr>
        @if ($requestDariTanggal && $requestSampaiTanggal)
        <tr>
            <th></th>
            <th colspan="2" style="vertical-align: center;font-weight : bold">
                {{__('pages/ia/borangIa/index.tanggal_pembuatan')}} </th>
            <th colspan="2" style="vertical-align: center;font-weight : bold">
                {{\Carbon\Carbon::parse($requestDariTanggal)->translatedFormat('d F Y')}} -
                {{\Carbon\Carbon::parse($requestSampaiTanggal)->translatedFormat('d F Y')}}
            </th>
        </tr>
        @endif
    </thead>
</table>

<table style="border: 1px solid black;background-color : #C8C8C8">
    <thead align="center">
        <tr style="border: 1px solid black">
            <th width="5"></th>
            <th align="center"
                style="vertical-align: center;border: 1px solid black;font-weight : bold;background-color : #C8C8C8"
                width="10" rowspan="2">
                {{{__('components/table.nomor')}}}
            </th>
            <th align="center"
                style="vertical-align: center;border: 1px solid black;font-weight : bold;background-color : #C8C8C8"
                width="40" rowspan="2">
                {{__('components/table.lembaga_mitra')}}</th>
            <th align="center"
                style="vertical-align: center;border: 1px solid black;font-weight : bold;background-color : #C8C8C8"
                width="40" rowspan="2">
                {{__('components/table.tipe_kerjasama')}}</th>
            <th align="center"
                style="vertical-align: center;border: 1px solid black;font-weight : bold;background-color : #C8C8C8"
                width="20" colspan="3">
                {{__('components/table.tingkat')}}
            </th>
            <th align="center"
                style="vertical-align: center;border: 1px solid black;font-weight : bold;background-color : #C8C8C8"
                width="60" rowspan="2">
                {{__('components/table.judul_kegiatan_kerjasama')}}</th>
            <th align="center"
                style="vertical-align: center;border: 1px solid black;font-weight : bold;background-color : #C8C8C8"
                width="60" rowspan="2">
                {{__('components/table.manfaat')}}
            </th>
            <th align="center"
                style="vertical-align: center;border: 1px solid black;font-weight : bold;background-color : #C8C8C8"
                width="40" rowspan="2">
                {{__('components/table.waktu_dan_durasi')}}</th>
            <th align="center"
                style="vertical-align: center;border: 1px solid black;font-weight : bold;background-color : #C8C8C8"
                width="60" rowspan="2">
                {{__('components/table.bukti_kerjasama')}}</th>
        </tr>
        <tr style="border: 1px solid black">
            <th></th>
            <th align="center"
                style="vertical-align: center;border: 1px solid black;font-weight : bold;background-color : #C8C8C8"
                width="20">
                {{__('components/table.internasional')}}</th>
            <th align="center"
                style="vertical-align: center;border: 1px solid black;font-weight : bold;background-color : #C8C8C8"
                width="20">
                {{__('components/table.nasional')}}</th>
            <th align="center"
                style="vertical-align: center;border: 1px solid black;font-weight : bold;background-color : #C8C8C8"
                width="20">
                {{__('components/table.lokal')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($daftarIa as $ia)
        <tr style="border: 1px solid black">
            <th></th>
            <td align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                {{$loop->iteration}}</td>
            <td align="center" style="vertical-align: center;border: 1px solid black">{{$ia->pengusul->nama}}</td>
            <td style="vertical-align: center;border: 1px solid black">
                @foreach ($ia->jenisKerjasama as $jenisKerjasama)
                <p> ●
                    @php
                    if ($jenisKerjasama->jenis_kerjasama == 'Penelitian' ){
                    echo __('pages/ia/borangIa/index.penelitian');
                    } else if ($jenisKerjasama->jenis_kerjasama == 'Pendidikan' ){
                    echo __('pages/ia/borangIa/index.pendidikan');
                    } else {
                    echo __('pages/ia/borangIa/index.pengabdian_kepada_masyarakat');
                    }
                    @endphp
                </p>
                @endforeach
            </td>
            <td align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                {!!$ia->pengusul->negara_id != 102
                ? "✓" : ''!!}</td>
            <td align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                {{$ia->pengusul->negara_id == 102
                &&
                $ia->pengusul->provinsi_id != 26 ? "✓" : ''}}</td>
            <td align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                {{$ia->pengusul->negara_id == 102
                &&
                $ia->pengusul->provinsi_id == 26 ? "✓" : ''}}</td>
            <td align="center" style="vertical-align: center;border: 1px solid black">{{$ia->program}}</td>
            <td align="center" style="vertical-align: center;border: 1px solid black">{{$ia->manfaat}}</td>
            <td align="center" style="vertical-align: center;border: 1px solid black">
                @php
                $tanggal_mulai = \Carbon\Carbon::parse($ia->tanggal_mulai);
                $tanggal_berakhir = \Carbon\Carbon::parse($ia->tanggal_berakhir);
                $durasi = $tanggal_mulai->diff($tanggal_berakhir)->format('%y ' . __('pages/ia/borangIa/index.tahun') .
                ', %m ' . __('pages/ia/borangIa/index.bulan') . ' dan %d ' .
                __('pages/ia/borangIa/index.hari'));
                $waktu = \Carbon\Carbon::parse($ia->tanggal_mulai)->translatedFormat('d F Y') . " - " .
                \Carbon\Carbon::parse($ia->tanggal_berakhir)->translatedFormat('d F Y');
                echo $waktu . "<br>" . $durasi;
                @endphp
            </td>
            <td align="center" style="vertical-align: center;border: 1px solid black">
                {{$ia->moa->mou ? "MOU" : ""}}
                {{$ia->moa ? ",MOA" : ""}}
                {{$ia->dokumen ? ",IA" : ""}}
                {{$ia->surat_tugas ? ", " . __('pages/ia/borangIa/index.surat_tugas') : ''}}
                {{$ia->laporan_hasil_pelaksanaan ? ", " . __('pages/ia/borangIa/index.laporan_pelaksanaan') : ''}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
