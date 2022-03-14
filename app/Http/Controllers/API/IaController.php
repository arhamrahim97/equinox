<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\AnggotaFakultas;
use App\Models\AnggotaProdi;
use App\Models\Ia;
use App\Models\JenisKerjasama;
use App\Models\Pengusul;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class IaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fakultas_id = auth()->user()->fakultas_id;
        $prodi_id = auth()->user()->prodi_id;
        $role = auth()->user()->role;
        $status = $request->status;
        $cari = $request->cari;
        $hariIni = Carbon::now();
        if (in_array($role, array('Fakultas', 'Pascasarjana', 'PSDKU'))) {
            // TotalIa
            $data = Ia::with(['pengusul', 'moa', 'jenisKerjasama', 'anggotaFakultas', 'anggotaProdi', 'user'])->whereHas('anggotaFakultas', function ($anggotaFakultas) use ($fakultas_id) {
                $anggotaFakultas->where('fakultas_id', $fakultas_id);
            })->where(function ($ia) use ($status, $hariIni) {
                if ($status) {
                    if ($status == "Aktif") {
                        $ia->where(function ($statusIa) {
                            $statusIa->where('laporan_hasil_pelaksanaan', '=', 'NULL');
                            $statusIa->orWhere('laporan_hasil_pelaksanaan', '=', '');
                        })->where('tanggal_berakhir', '>=', $hariIni);
                    } else if ($status == "Selesai") {
                        $ia->whereNotNull('laporan_hasil_pelaksanaan');
                        $ia->where('laporan_hasil_pelaksanaan', '!=', '');
                    } else {
                        $ia->where(function ($statusIa) {
                            $statusIa->whereNull('laporan_hasil_pelaksanaan');
                            $statusIa->orWhere('laporan_hasil_pelaksanaan', '=', '');
                        })->where('tanggal_berakhir', '<', $hariIni);
                    }
                }
            })->whereHas('pengusul', function ($pengusul) use ($cari) {
                if ($cari) {
                    $pengusul->where('nama', 'LIKE', '%' . $cari . '%');
                }
            })->paginate(10);
        } else if ($role == 'LPPM') {
            // Total Ia
            $data = Ia::with(['pengusul', 'moa', 'jenisKerjasama', 'anggotaFakultas', 'anggotaProdi', 'user'])->whereHas('user', function ($user) use ($role) {
                $user->where('role', $role);
            })->where(function ($ia) use ($status, $hariIni) {
                if ($status) {
                    if ($status == "Aktif") {
                        $ia->where(function ($statusIa) {
                            $statusIa->where('laporan_hasil_pelaksanaan', '=', 'NULL');
                            $statusIa->orWhere('laporan_hasil_pelaksanaan', '=', '');
                        })->where('tanggal_berakhir', '>=', $hariIni);
                    } else if ($status == "Selesai") {
                        $ia->whereNotNull('laporan_hasil_pelaksanaan');
                        $ia->where('laporan_hasil_pelaksanaan', '!=', '');
                    } else {
                        $ia->where(function ($statusIa) {
                            $statusIa->whereNull('laporan_hasil_pelaksanaan');
                            $statusIa->orWhere('laporan_hasil_pelaksanaan', '=', '');
                        })->where('tanggal_berakhir', '<', $hariIni);
                    }
                }
            })->whereHas('pengusul', function ($pengusul) use ($cari) {
                if ($cari) {
                    $pengusul->where('nama', 'LIKE', '%' . $cari . '%');
                }
            })->paginate(10);
        } else if (in_array($role, array('Prodi', 'Unit Kerja'))) {

            // Total Ia
            $data = Ia::with(['pengusul', 'moa', 'jenisKerjasama', 'anggotaFakultas', 'anggotaProdi', 'user'])->whereHas('anggotaProdi', function ($anggotaProdi) use ($prodi_id) {
                $anggotaProdi->where('prodi_id', $prodi_id);
            })->where(function ($ia) use ($status, $hariIni) {
                if ($status) {
                    if ($status == "Aktif") {
                        $ia->where(function ($statusIa) {
                            $statusIa->where('laporan_hasil_pelaksanaan', '=', 'NULL');
                            $statusIa->orWhere('laporan_hasil_pelaksanaan', '=', '');
                        })->where('tanggal_berakhir', '>=', $hariIni);
                    } else if ($status == "Selesai") {
                        $ia->whereNotNull('laporan_hasil_pelaksanaan');
                        $ia->where('laporan_hasil_pelaksanaan', '!=', '');
                    } else {
                        $ia->where(function ($statusIa) {
                            $statusIa->whereNull('laporan_hasil_pelaksanaan');
                            $statusIa->orWhere('laporan_hasil_pelaksanaan', '=', '');
                        })->where('tanggal_berakhir', '<', $hariIni);
                    }
                }
            })->whereHas('pengusul', function ($pengusul) use ($cari) {
                if ($cari) {
                    $pengusul->where('nama', 'LIKE', '%' . $cari . '%');
                }
            })->paginate(10);
        } else {
            // Total Ia
            $data = Ia::with(['pengusul', 'moa', 'jenisKerjasama', 'anggotaFakultas', 'anggotaProdi', 'user'])->where(function ($ia) use ($status, $hariIni) {
                if ($status) {
                    if ($status == "Aktif") {
                        $ia->where(function ($statusIa) {
                            $statusIa->where('laporan_hasil_pelaksanaan', '=', 'NULL');
                            $statusIa->orWhere('laporan_hasil_pelaksanaan', '=', '');
                        })->where('tanggal_berakhir', '>=', $hariIni);
                    } else if ($status == "Selesai") {
                        $ia->whereNotNull('laporan_hasil_pelaksanaan');
                        $ia->where('laporan_hasil_pelaksanaan', '!=', '');
                    } else {
                        $ia->where(function ($statusIa) {
                            $statusIa->whereNull('laporan_hasil_pelaksanaan');
                            $statusIa->orWhere('laporan_hasil_pelaksanaan', '=', '');
                        })->where('tanggal_berakhir', '<', $hariIni);
                    }
                }
            })->whereHas('pengusul', function ($pengusul) use ($cari) {
                if ($cari) {
                    $pengusul->where('nama', 'LIKE', '%' . $cari . '%');
                }
            })->paginate(10);
        }

        if ($data) {
            return ResponseFormatter::success(
                $data,
                'Data IA Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data IA Tidak Ada',
                404
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = auth()->user()->role;
        $users_id = auth()->user()->id;
        $prodi_id = auth()->user()->prodi_id;
        $fakultas_id = auth()->user()->fakultas_id;

        if (in_array($role, array('Admin', 'LPPM', 'Fakultas', 'Pascasarjana', 'PSDKU'))) {
            if (in_array($role, array('Admin', 'LPPM'))) {
                $fakultas_req = 'required';
                $fakultas = $request->fakultas;
                $prodi_req = 'required';
                $prodi = $request->program_studi;
            } else {
                $fakultas_req = '';
                $fakultas = 0;
                $prodi_req = 'required';
                $prodi = $request->program_studi;
            }
        } else { // role == prodi, unit kerja
            $fakultas_req = '';
            $prodi_req = '';
            $prodi = 0;
            $fakultas = 0;
        }

        $validator = Validator::make(
            $request->all(),
            [
                'pengusul_id' => 'required',
                'nomor_moa_pengusul' => 'required',
                'nomor_ia' => ['required', Rule::unique('ia')->withoutTrashed()],
                'nomor_ia_pengusul' => ['required', Rule::unique('ia')->withoutTrashed()],
                'pejabat_penandatangan' => 'required',
                'nik_nip_pengusul' => 'required',
                'jabatan_pengusul' => 'required',
                'program' => 'required',
                'tanggal_mulai' => 'required',
                'tanggal_berakhir' => 'required',
                'dokumen' => 'required',
                'fakultas' => $fakultas_req,
                'program_studi' => $prodi_req,
                'manfaat' => 'required',
                'jenis_kerjasama' => 'required',
                'nilai_uang' => 'required',
                'metode_pertemuan' => 'required',
                'tanggal_pertemuan' => 'required',
                'waktu_pertemuan' => 'required',
                'tempat_pertemuan' => 'required',
            ],
            [
                'pengusul_id.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.pengusul')]),
                'nomor_moa_pengusul.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nomor_moa_pengusul')]),
                'nomor_ia.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nomor_ia')]),
                'nomor_ia.unique' => __('components/validation.unique', ['nama' => __('components/form_mou_moa_ia.nomor_ia')]),
                'nomor_ia_pengusul.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nomor_ia_pengusul')]),
                'nomor_ia_pengusul.unique' => __('components/validation.unique', ['nama' => __('components/form_mou_moa_ia.nomor_ia_pengusul')]),

                'pejabat_penandatangan.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.pejabat_penandatangan')]),
                'nik_nip_pengusul.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nik_nip_pengusul')]),
                'jabatan_pengusul.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.jabatan_pengusul')]),
                'program.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.program')]),
                'tanggal_mulai.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.tanggal_mulai')]),
                'tanggal_berakhir.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.tanggal_berakhir')]),
                'dokumen.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.dokumen')]),
                'fakultas.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.fakultas')]),
                'program_studi.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.program_studi')]),
                'manfaat.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.manfaat')]),
                'jenis_kerjasama.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.jenis_kerjasama')]),
                'nilai_uang.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nilai_uang')]),
                'metode_pertemuan.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.metode_pertemuan')]),
                'tanggal_pertemuan.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.tanggal_pertemuan')]),
                'waktu_pertemuan.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.waktu_pertemuan')]),
                'tempat_pertemuan.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.tempat_pertemuan')]),
            ]
        );

        if ($validator->fails()) {
            return ResponseFormatter::error(
                $validator->errors(),
                'Gagal Menyimpan Data IA',
                404
            );
        }

        $pengusul = Pengusul::find($request->pengusul_id);
        $namaFileBerkas = 'IA - ' . $pengusul->nama . ' - ' . Carbon::now()->format('YmdHs') . ".pdf";
        $request->file('dokumen')->storeAs(
            'dokumen/ia',
            $namaFileBerkas
        );


        $data = [
            'users_id' => $users_id,
            'pengusul_id' => $request->pengusul_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'moa_id' => $request->nomor_moa_pengusul,
            'nomor_ia' => $request->nomor_ia,
            'nomor_ia_pengusul' => $request->nomor_ia_pengusul,
            'pejabat_penandatangan' => $request->pejabat_penandatangan,
            'nik_nip_pengusul' => $request->nik_nip_pengusul,
            'jabatan_pengusul' => $request->jabatan_pengusul,
            'program' => $request->program,
            'manfaat' => $request->manfaat,
            'tanggal_mulai' => date("Y-m-d", strtotime($request->tanggal_mulai)),
            'tanggal_berakhir' => date("Y-m-d", strtotime($request->tanggal_berakhir)),
            'dokumen' => $namaFileBerkas,
            'nilai_uang' => $request->nilai_uang,
            'metode_pertemuan' => $request->metode_pertemuan,
            'tanggal_pertemuan' => date("Y-m-d", strtotime($request->tanggal_pertemuan)),
            'waktu_pertemuan' => $request->waktu_pertemuan,
            'tempat_pertemuan' => $request->tempat_pertemuan
        ];

        Ia::create($data);

        $ia_id = Ia::max('id');

        if ($prodi != 0) {
            foreach ($request->program_studi as $item) {
                $data = [
                    'ia_id' => $ia_id,
                    'prodi_id' => $item
                ];
                AnggotaProdi::create($data);
            }
        } else {
            $data = [
                'ia_id' => $ia_id,
                'prodi_id' => $prodi_id
            ];
            AnggotaProdi::create($data);
        }

        if ($fakultas != 0) {
            foreach ($request->fakultas as $item) {
                $data = [
                    'ia_id' => $ia_id,
                    'fakultas_id' => $item
                ];
                AnggotaFakultas::create($data);
            }
        } else {
            $data = [
                'ia_id' => $ia_id,
                'fakultas_id' => $fakultas_id
            ];
            AnggotaFakultas::create($data);
        }

        foreach ($request->jenis_kerjasama as $item) {
            $data = [
                'ia_id' => $ia_id,
                'jenis_kerjasama' => $item
            ];
            JenisKerjasama::create($data);
        }

        return ResponseFormatter::success(
            null,
            'Data IA Berhasil Disimpan'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ia  $ia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Ia::with(['pengusul', 'moa', 'jenisKerjasama', 'anggotaFakultas', 'anggotaProdi', 'user'])->where('id', $id)->first();
        if (!empty($data)) {
            return ResponseFormatter::success(
                $data,
                'Data Ia Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data IA Gagal Diambil',
                404
            );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ia  $ia
     * @return \Illuminate\Http\Response
     */
    public function edit(Ia $ia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ia  $ia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ia = Ia::where('id', $id)->first();
        $role = auth()->user()->role;
        $users_id = auth()->user()->id;
        $prodi_id = auth()->user()->prodi_id;
        $fakultas_id = auth()->user()->fakultas_id;

        if (in_array($role, array('Admin', 'LPPM', 'Fakultas', 'Pascasarjana', 'PSDKU'))) {
            if (in_array($role, array('Admin', 'LPPM'))) {
                $fakultas_req = 'required';
                $fakultas = $request->fakultas;
                $prodi_req = 'required';
                $prodi = $request->program_studi;
            } else { //'Fakultas', 'Pascasarjana', 'PSDKU'
                $fakultas_req = '';
                $fakultas = $fakultas_id;
                $prodi_req = 'required';
                $prodi = $request->program_studi;
            }
        } else { // role == prodi, unit kerja
            $fakultas_req = '';
            $prodi_req = '';
            $prodi = 0;
            $fakultas = 0;
        }

        if ($request->nomor_ia != $ia->nomor_ia) {
            $nomor_ia_req = ['required', Rule::unique('ia')->withoutTrashed()];
        } else {
            $nomor_ia_req = 'required';
        }

        if ($request->nomor_ia_pengusul != $ia->nomor_ia_pengusul) {
            $nomor_ia_pengusul_req = ['required', Rule::unique('ia')->withoutTrashed()];
        } else {
            $nomor_ia_pengusul_req = 'required';
        }


        $validator = Validator::make(
            $request->all(),
            [
                'pengusul_id' => 'required',
                'nomor_moa_pengusul' => 'required',
                'nomor_ia' => $nomor_ia_req,
                'nomor_ia_pengusul' => $nomor_ia_pengusul_req,
                'pejabat_penandatangan' => 'required',
                'nik_nip_pengusul' => 'required',
                'jabatan_pengusul' => 'required',
                'program' => 'required',
                'tanggal_mulai' => 'required',
                'tanggal_berakhir' => 'required',
                // 'dokumen' => 'required',
                'fakultas' => $fakultas_req,
                'program_studi' => $prodi_req,
                'manfaat' => 'required',
                'jenis_kerjasama' => 'required',
                'nilai_uang' => 'required',
                'metode_pertemuan' => 'required',
                'tanggal_pertemuan' => 'required',
                'waktu_pertemuan' => 'required',
                'tempat_pertemuan' => 'required',
            ],
            [
                'pengusul_id.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.pengusul')]),
                'nomor_moa_pengusul.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nomor_moa_pengusul')]),
                'nomor_ia.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nomor_ia')]),
                'nomor_ia.unique' => __('components/validation.unique', ['nama' => __('components/form_mou_moa_ia.nomor_ia')]),
                'nomor_ia_pengusul.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nomor_ia_pengusul')]),
                'nomor_ia_pengusul.unique' => __('components/validation.unique', ['nama' => __('components/form_mou_moa_ia.nomor_ia_pengusul')]),
                'pejabat_penandatangan.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.pejabat_penandatangan')]),
                'nik_nip_pengusul.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nik_nip_pengusul')]),
                'jabatan_pengusul.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.jabatan_pengusul')]),
                'program.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.program')]),
                'tanggal_mulai.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.tanggal_mulai')]),
                'tanggal_berakhir.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.tanggal_berakhir')]),
                'dokumen.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.dokumen')]),
                'fakultas.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.fakultas')]),
                'program_studi.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.program_studi')]),
                'manfaat.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.manfaat')]),
                'jenis_kerjasama.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.jenis_kerjasama')]),
                'nilai_uang.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nilai_uang')]),
                'metode_pertemuan.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.metode_pertemuan')]),
                'tanggal_pertemuan.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.tanggal_pertemuan')]),
                'waktu_pertemuan.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.waktu_pertemuan')]),
                'tempat_pertemuan.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.tempat_pertemuan')]),
            ]
        );

        if ($validator->fails()) {
            return ResponseFormatter::error(
                $validator->errors(),
                'Data IA Gagal Diubah',
                404
            );
        }

        $data = [
            // 'users_id' => Auth::user()->id,
            'pengusul_id' => $request->pengusul_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'moa_id' => $request->nomor_moa_pengusul,
            'nomor_ia' => $request->nomor_ia,
            'nomor_ia_pengusul' => $request->nomor_ia_pengusul,
            'pejabat_penandatangan' => $request->pejabat_penandatangan,
            'nik_nip_pengusul' => $request->nik_nip_pengusul,
            'jabatan_pengusul' => $request->jabatan_pengusul,
            'program' => $request->program,
            'manfaat' => $request->manfaat,
            'tanggal_mulai' => date("Y-m-d", strtotime($request->tanggal_mulai)),
            'tanggal_berakhir' => date("Y-m-d", strtotime($request->tanggal_berakhir)),
            'nilai_uang' => $request->nilai_uang,
            'metode_pertemuan' => $request->metode_pertemuan,
            'tanggal_pertemuan' => date("Y-m-d", strtotime($request->tanggal_pertemuan)),
            'waktu_pertemuan' => $request->waktu_pertemuan,
            'tempat_pertemuan' => $request->tempat_pertemuan
        ];

        if ($request->dokumen) {
            if (Storage::exists('dokumen/ia/' . $ia->dokumen)) {
                Storage::delete('dokumen/ia/' . $ia->dokumen);
            }
            $namaFileBerkas = 'IA - ' . $ia->pengusul->nama . ' - ' . Carbon::now()->format('YmdHs') . ".pdf";
            $request->file('dokumen')->storeAs(
                'dokumen/ia',
                $namaFileBerkas
            );
            $data['dokumen'] = $namaFileBerkas;
        }

        Ia::where('id', $ia->id)->update($data);

        $ia_id = $ia->id;

        if (!in_array($role, array('Prodi', 'Unit Kerja'))) {
            if (in_array($role, array('LPPM', 'Admin'))) {
                $del_prodi = AnggotaProdi::where('ia_id', $ia_id);
                $del_prodi->delete();
                $del_fakultas = AnggotaFakultas::where('ia_id', $ia_id);
                $del_fakultas->delete();
            } else { // Fakultas dkk
                $del_prodi = AnggotaProdi::where('ia_id', $ia_id);
                $del_prodi->delete();
            }
        }

        if ($prodi != 0) {
            foreach ($request->program_studi as $item) {
                $data = [
                    'ia_id' => $ia_id,
                    'prodi_id' => $item
                ];
                AnggotaProdi::create($data);
            }
        }

        if ($fakultas != 0) {
            if (($role == 'LPPM') || ($role == 'Admin')) {
                foreach ($request->fakultas as $item) {
                    $data = [
                        'ia_id' => $ia_id,
                        'fakultas_id' => $item
                    ];
                    AnggotaFakultas::create($data);
                }
            }
        }

        $del_kerjasama = JenisKerjasama::where('ia_id', $ia_id);
        $del_kerjasama->delete();
        foreach ($request->jenis_kerjasama as $item) {
            $data = [
                'ia_id' => $ia_id,
                'jenis_kerjasama' => $item
            ];
            JenisKerjasama::create($data);
        }

        return ResponseFormatter::success(
            null,
            'Data IA Berhasil Diupdate'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ia  $ia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ia = Ia::where('id', $id)->first();
        if (Storage::exists('dokumen/ia/' . $ia->dokumen)) {
            Storage::delete('dokumen/ia/' . $ia->dokumen);
        }

        if (Storage::exists('dokumen/ia-laporan_hasil_pelaksanaan/' . $ia->laporan_hasil_pelaksanaan)) {
            Storage::delete('dokumen/ia-laporan_hasil_pelaksanaan/' . $ia->laporan_hasil_pelaksanaan);
        }

        if (Storage::exists('dokumen/ia-surat_tugas/' . $ia->surat_tugas)) {
            Storage::delete('dokumen/ia-surat_tugas/' . $ia->surat_tugas);
        }

        $ia->anggotaProdi()->delete();
        $ia->anggotaFakultas()->delete();
        $ia->jenisKerjasama()->delete();
        $ia->delete();
        return ResponseFormatter::success(
            null,
            'Data IA Berhasil Dihapus'
        );
    }

    public function uploadSuratTugas(Request $request)
    {
        $id = $request->id;
        $ia = Ia::with(['pengusul'])->find($id);
        $validator = Validator::make(
            $request->all(),
            [
                'dokumen' => 'required',
            ],
            [
                'dokumen.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.dokumen')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $pengusul = Pengusul::find($ia->pengusul->id);
        $namaFileBerkas = 'IA SURAT TUGAS - ' . $pengusul->nama . ' - ' . Carbon::now()->format('YmdHs') . ".pdf";
        $request->file('dokumen')->storeAs(
            'dokumen/ia-surat_tugas',
            $namaFileBerkas
        );

        $data = [
            'surat_tugas' => $namaFileBerkas,
        ];

        Ia::where('id', $id)->update($data);

        return ResponseFormatter::success(
            null,
            'Laporan Surat Tugas Berhasil Di Upload'
        );
    }

    public function uploadLaporanPelaksanaan(Request $request)
    {
        $id = $request->id;
        $ia = Ia::with(['pengusul'])->find($id);
        $users_id = auth()->user()->id;
        $validator = Validator::make(
            $request->all(),
            [
                'dokumen' => 'required',
            ],
            [
                'dokumen.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.dokumen')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        if ($ia->users_id == $users_id) {
            $pengusul = Pengusul::find($ia->pengusul->id);
            $namaFileBerkas = 'IA LAPORAN HASIL PELAKSANAAN - ' . $pengusul->nama . ' - ' . Carbon::now()->format('YmdHs') . ".pdf";
            $request->file('dokumen')->storeAs(
                'dokumen/ia-laporan_hasil_pelaksanaan',
                $namaFileBerkas
            );

            $data = [
                'laporan_hasil_pelaksanaan' => $namaFileBerkas,
            ];

            Ia::where('id', $id)->update($data);

            return ResponseFormatter::success(
                null,
                'Laporan Pelaksanaan Berhasil Di Upload'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Laporan Pelaksanaan Gagal DiUpload',
                404
            );
        }
    }
}
