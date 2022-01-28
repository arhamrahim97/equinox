<table style="border: 1px solid black;background-color : #C8C8C8">
    <thead align="center">
        <tr style="border: 1px solid black">
            <th align="center"
                style="vertical-align: center;border: 1px solid black;font-weight : bold;background-color : #C8C8C8"
                width="10" rowspan="2">
                {{__('components/table.nomor')}}
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
            <td align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                {{$loop->iteration}}</td>
            <td align="center" style="vertical-align: center;border: 1px solid black">{{$ia->pengusul->nama}}</td>
            <td align="center" style="vertical-align: center;border: 1px solid black">-</td>
            <td align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                {!!$ia->pengusul->negara_id != 102
                ? "✓" : ''!!}</td>
            <td align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                {{$ia->pengusul->negara_id != 102
                &&
                $ia->pengusul->provinsi_id != 26 ? "✓" : ''}}</td>
            <td align="center" style="vertical-align: center;border: 1px solid black;font-weight : bold">
                {{$ia->pengusul->negara_id == 102
                &&
                $ia->pengusul->provinsi_id == 26 ? "✓" : ''}}</td>
            <td align="center" style="vertical-align: center;border: 1px solid black">{{$ia->program}}</td>
            <td align="center" style="vertical-align: center;border: 1px solid black">-</td>
            <td align="center" style="vertical-align: center;border: 1px solid black">
                @php
                $tanggal_mulai = \Carbon\Carbon::parse($ia->tanggal_mulai);
                $tanggal_berakhir = \Carbon\Carbon::parse($ia->tanggal_berakhir);
                $durasi = $tanggal_mulai->diff($tanggal_berakhir)->format('%y Tahun, %m Bulan dan %d Hari');
                $waktu = \Carbon\Carbon::parse($ia->tanggal_mulai)->translatedFormat('d F Y') . " - " .
                \Carbon\Carbon::parse($ia->tanggal_berakhir)->translatedFormat('d F Y');
                echo $waktu . "<br>" . $durasi;
                @endphp
            </td>
            <td align="center" style="vertical-align: center;border: 1px solid black">
                MOU, MOA, IA
                {{$ia->laporan_hasil_pelaksanaan ? ", Laporan Hasil Pelaksanaan" : ''}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
