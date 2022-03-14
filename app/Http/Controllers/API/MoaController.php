<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Moa;
use App\Models\Pengusul;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fakultas_id = auth()->user()->fakultas_id;
        $role = auth()->user()->role;
        $status = $request->status;
        $cari = $request->cari;

        if (in_array($role, array('Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM', 'Prodi', 'Unit Kerja'))) {
            $data = Moa::with(['pengusul', 'user'])->whereHas('user', function ($user) use ($fakultas_id) {
                $user->where('fakultas_id', $fakultas_id);
            })->where(function ($mou) use ($status) {
                if ($status) {
                    if ($status == "Aktif") {
                        $mou->where('tanggal_berakhir', '>', DB::raw('NOW() + INTERVAL 1 YEAR'));
                    } else if ($status == "Masa Tenggang") {
                        $mou->where('tanggal_berakhir', '>', DB::raw('NOW()'));
                        $mou->where('tanggal_berakhir', '<', DB::raw('NOW() + INTERVAL 1 YEAR'));
                    } else if ($status == "Kadaluarsa") {
                        $mou->where('tanggal_berakhir', '<', DB::raw('NOW()'));
                    }
                }
            })->whereHas('pengusul', function ($pengusul) use ($cari) {
                if ($cari) {
                    $pengusul->where('nama', 'LIKE', '%' . $cari . '%');
                }
            })->paginate(10);
        } else {
            $data = Moa::with(['pengusul', 'user'])->where(function ($mou) use ($status) {
                if ($status) {
                    if ($status == "Aktif") {
                        $mou->where('tanggal_berakhir', '>', DB::raw('NOW() + INTERVAL 1 YEAR'));
                    } else if ($status == "Masa Tenggang") {
                        $mou->where('tanggal_berakhir', '>', DB::raw('NOW()'));
                        $mou->where('tanggal_berakhir', '<', DB::raw('NOW() + INTERVAL 1 YEAR'));
                    } else if ($status == "Kadaluarsa") {
                        $mou->where('tanggal_berakhir', '<', DB::raw('NOW()'));
                    }
                }
            })->whereHas('pengusul', function ($pengusul) use ($cari) {
                if ($cari) {
                    $pengusul->where('nama', 'LIKE', '%' . $cari . '%');
                }
            })->paginate(10);
        }

        return ResponseFormatter::success(
            $data,
            'Data MOA Berhasil Diambil'
        );
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
        $users_id = auth()->user()->id;

        $validator = Validator::make(
            $request->all(),
            [
                'pengusul_id' => 'required',
                'nomor_mou_pengusul' => 'required',
                'nomor_moa' => ['required', Rule::unique('moa')->withoutTrashed()],
                'nomor_moa_pengusul' => ['required', Rule::unique('moa')->withoutTrashed()],
                'pejabat_penandatangan' => 'required',
                'nik_nip_pengusul' => 'required',
                'jabatan_pengusul' => 'required',
                'program' => 'required',
                'tanggal_mulai' => 'required',
                'tanggal_berakhir' => 'required',
                'dokumen' => 'required',
                'metode_pertemuan' => 'required',
                'tanggal_pertemuan' => 'required',
                'waktu_pertemuan' => 'required',
                'tempat_pertemuan' => 'required',
            ],
            [
                'pengusul_id.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.pengusul')]),
                'nomor_mou_pengusul.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nomor_mou_pengusul')]),
                'nomor_moa.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nomor_moa')]),
                'nomor_moa.unique' => __('components/validation.unique', ['nama' => __('components/form_mou_moa_ia.nomor_moa')]),
                'nomor_moa_pengusul.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nomor_moa_pengusul')]),
                'nomor_moa_pengusul.unique' => __('components/validation.unique', ['nama' => __('components/form_mou_moa_ia.nomor_moa_pengusul')]),

                'pejabat_penandatangan.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.pejabat_penandatangan')]),
                'nik_nip_pengusul.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nik_nip_pengusul')]),
                'jabatan_pengusul.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.jabatan_pengusul')]),
                'program.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.program')]),
                'tanggal_mulai.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.tanggal_mulai')]),
                'tanggal_berakhir.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.tanggal_berakhir')]),
                'dokumen.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.dokumen')]),
                'metode_pertemuan.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.metode_pertemuan')]),
                'tanggal_pertemuan.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.tanggal_pertemuan')]),
                'waktu_pertemuan.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.waktu_pertemuan')]),
                'tempat_pertemuan.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.tempat_pertemuan')]),
            ]
        );

        if ($validator->fails()) {
            return ResponseFormatter::error(
                $validator->errors(),
                'MOA Gagal Ditambahkan',
                404
            );
        }

        $pengusul = Pengusul::find($request->pengusul_id);
        $namaFileBerkas = 'MOA - ' . $pengusul->nama . ' - ' . Carbon::now()->format('YmdHs') . ".pdf";
        $request->file('dokumen')->storeAs(
            'dokumen/moa',
            $namaFileBerkas
        );

        $data = [
            'users_id' => $users_id,
            'pengusul_id' => $request->pengusul_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'mou_id' => $request->nomor_mou_pengusul,
            'nomor_moa' => $request->nomor_moa,
            'nomor_moa_pengusul' => $request->nomor_moa_pengusul,
            'pejabat_penandatangan' => $request->pejabat_penandatangan,
            'nik_nip_pengusul' => $request->nik_nip_pengusul,
            'jabatan_pengusul' => $request->jabatan_pengusul,
            'program' => $request->program,
            'tanggal_mulai' => date("Y-m-d", strtotime($request->tanggal_mulai)),
            'tanggal_berakhir' => date("Y-m-d", strtotime($request->tanggal_berakhir)),
            'dokumen' => $namaFileBerkas,
            'metode_pertemuan' => $request->metode_pertemuan,
            'tanggal_pertemuan' => date("Y-m-d", strtotime($request->tanggal_pertemuan)),
            'waktu_pertemuan' => $request->waktu_pertemuan,
            'tempat_pertemuan' => $request->tempat_pertemuan
        ];

        Moa::create($data);
        return ResponseFormatter::success(
            null,
            'MOA Berhasil Ditambahkan'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Moa  $moa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Moa::with(['pengusul', 'mou', 'user' => function ($user) {
            $user->select('id', 'nama');
        }])->where('id', $id)->first();
        if ($data) {
            return ResponseFormatter::success(
                $data,
                'Data MOA Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data MOA Tidak Ada',
                404
            );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Moa  $moa
     * @return \Illuminate\Http\Response
     */
    public function edit(Moa $moa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Moa  $moa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Moa $moa)
    {
        if ($request->nomor_moa != $moa->nomor_moa) {
            $nomor_moa_req = ['required', Rule::unique('moa')->withoutTrashed()];
        } else {
            $nomor_moa_req = 'required';
        }

        if ($request->nomor_moa_pengusul != $moa->nomor_moa_pengusul) {
            $nomor_moa_pengusul_req = ['required', Rule::unique('moa')->withoutTrashed()];
        } else {
            $nomor_moa_pengusul_req = 'required';
        }

        $validator = Validator::make(
            $request->all(),
            [
                'pengusul_id' => 'required',
                // 'nomor_mou_pengusul' => 'required',
                // 'nomor_moa' => $nomor_moa_req,
                'nomor_moa_pengusul' => $nomor_moa_pengusul_req,

                'pejabat_penandatangan' => 'required',
                'nik_nip_pengusul' => 'required',
                'jabatan_pengusul' => 'required',
                'program' => 'required',
                'tanggal_mulai' => 'required',
                'tanggal_berakhir' => 'required',
                // 'dokumen' => 'required',
                'metode_pertemuan' => 'required',
                'tanggal_pertemuan' => 'required',
                'waktu_pertemuan' => 'required',
                'tempat_pertemuan' => 'required',
            ],
            [
                'pengusul_id.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.pengusul')]),
                'nomor_mou_pengusul.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nomor_mou_pengusul')]),
                'nomor_moa.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nomor_moa')]),
                'nomor_moa.unique' => __('components/validation.unique', ['nama' => __('components/form_mou_moa_ia.nomor_moa')]),
                'nomor_moa_pengusul.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nomor_moa_pengusul')]),
                'nomor_moa_pengusul.unique' => __('components/validation.unique', ['nama' => __('components/form_mou_moa_ia.nomor_moa_pengusul')]),
                'pejabat_penandatangan.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.pejabat_penandatangan')]),
                'nik_nip_pengusul.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nik_nip_pengusul')]),
                'jabatan_pengusul.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.jabatan_pengusul')]),
                'program.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.program')]),
                'tanggal_mulai.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.tanggal_mulai')]),
                'tanggal_berakhir.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.tanggal_berakhir')]),
                // 'dokumen.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.dokumen')]),
                'metode_pertemuan.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.metode_pertemuan')]),
                'tanggal_pertemuan.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.tanggal_pertemuan')]),
                'waktu_pertemuan.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.waktu_pertemuan')]),
                'tempat_pertemuan.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.tempat_pertemuan')]),
            ]
        );

        if ($validator->fails()) {
            return ResponseFormatter::error(
                $validator->errors(),
                'MOA Gagal Diupdate',
                404
            );
        }

        $data = [
            // 'users_id' => auth()->user()->id,
            'pengusul_id' => $request->pengusul_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'mou_id' => $request->nomor_mou_pengusul,
            'nomor_moa' => $request->nomor_moa,
            'nomor_moa_pengusul' => $request->nomor_moa_pengusul,
            'pejabat_penandatangan' => $request->pejabat_penandatangan,
            'nik_nip_pengusul' => $request->nik_nip_pengusul,
            'jabatan_pengusul' => $request->jabatan_pengusul,
            'program' => $request->program,
            'tanggal_mulai' => date("Y-m-d", strtotime($request->tanggal_mulai)),
            'tanggal_berakhir' => date("Y-m-d", strtotime($request->tanggal_berakhir)),
            'metode_pertemuan' => $request->metode_pertemuan,
            'tanggal_pertemuan' => date("Y-m-d", strtotime($request->tanggal_pertemuan)),
            'waktu_pertemuan' => $request->waktu_pertemuan,
            'tempat_pertemuan' => $request->tempat_pertemuan
        ];

        if ($request->dokumen) {
            if (Storage::exists('dokumen/moa/' . $moa->dokumen)) {
                Storage::delete('dokumen/moa/' . $moa->dokumen);
            }
            $namaFileBerkas = 'MOA - ' . $moa->pengusul->nama . ' - ' . Carbon::now()->format('YmdHs') . ".pdf";
            $request->file('dokumen')->storeAs(
                'dokumen/moa',
                $namaFileBerkas
            );
            $data['dokumen'] = $namaFileBerkas;
        }

        Moa::where('id', $moa->id)->update($data);

        return ResponseFormatter::success(
            null,
            'MOA Berhasil Diupdate'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Moa  $moa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Moa $moa)
    {
        if ($moa) {
            if (Storage::exists('dokumen/mou/' . $moa->dokumen)) {
                Storage::delete('dokumen/mou/' . $moa->dokumen);
            }

            $moa->delete();
            return ResponseFormatter::success(
                null,
                'MOA Berhasil Dihapus'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'MOA Gagal Dihapus',
                404
            );
        }
    }
}
