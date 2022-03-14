<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Mou;
use App\Models\Pengusul;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MouController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->status;
        $cari = $request->cari;
        $user_id = auth()->user()->id;

        $data = Mou::with('pengusul', 'pengusul.negara', 'pengusul.provinsi', 'pengusul.kota', 'pengusul.kecamatan', 'pengusul.kelurahan', 'user', 'user.fakultas', 'user.prodi')
            ->orderBy('id', 'desc')
            ->whereHas('pengusul', function ($pengusul) use ($cari) {
                if ($cari) {
                    $pengusul->where('nama', 'LIKE', '%' . $cari . '%');
                }
            })
            ->whereHas('user', function ($user) use ($user_id) {
                if ($user_id) {
                    $user->where('id', $user_id);
                }
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
            })
            ->paginate(10);

        if (count($data) > 0) {
            return ResponseFormatter::success(
                $data,
                'Daftar MOU Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Daftar MOU Tidak Ada',
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
                // 'nomor_mou' => ['required', Rule::unique('mou')->withoutTrashed()],
                'nomor_mou_pengusul' => ['required', Rule::unique('mou')->withoutTrashed()],
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
                'nomor_mou.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nomor_mou')]),
                'nomor_mou.unique' => __('components/validation.unique', ['nama' => __('components/form_mou_moa_ia.nomor_mou')]),
                'nomor_mou_pengusul.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nomor_mou_pengusul')]),
                'nomor_mou_pengusul.unique' => __('components/validation.unique', ['nama' => __('components/form_mou_moa_ia.nomor_mou_pengusul')]),
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
                'MOU Gagal Diupdate',
                404
            );
        }

        $pengusul = Pengusul::find($request->pengusul_id);
        $namaFileBerkas = 'MOU - ' . $pengusul->nama . ' - ' . Carbon::now()->format('YmdHs') . ".pdf";
        $request->file('dokumen')->storeAs(
            'dokumen/mou',
            $namaFileBerkas
        );

        $data = [
            'users_id' => $users_id,
            'pengusul_id' => $request->pengusul_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'nomor_mou' => $request->nomor_mou,
            'nomor_mou_pengusul' => $request->nomor_mou_pengusul,
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

        Mou::create($data);
        return ResponseFormatter::success(
            null,
            'MOU Berhasil Ditambahkan'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Mou::with('pengusul', 'user')->where('id', $id)->first();
        if ($data) {
            return ResponseFormatter::success(
                $data,
                'Data MOU Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data MOU Tidak Ada',
                404
            );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function edit(Mou $mou)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mou $mou)
    {
        if ($request->nomor_mou != $mou->nomor_mou) {
            $nomor_mou_req = ['required', Rule::unique('mou')->withoutTrashed()];
        } else {
            $nomor_mou_req = 'required';
        }

        if ($request->nomor_mou_pengusul != $mou->nomor_mou_pengusul) {
            $nomor_mou_pengusul_req = ['required', Rule::unique('mou')->withoutTrashed()];
        } else {
            $nomor_mou_pengusul_req = 'required';
        }

        $validator = Validator::make(
            $request->all(),
            [
                'pengusul_id' => 'required',
                // 'nomor_mou' => $nomor_mou_req,
                'nomor_mou_pengusul' => $nomor_mou_pengusul_req,
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
                'nomor_mou.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nomor_mou')]),
                'nomor_mou.unique' => __('components/validation.unique', ['nama' => __('components/form_mou_moa_ia.nomor_mou')]),
                'nomor_mou_pengusul.required' => __('components/validation.required', ['nama' => __('components/form_mou_moa_ia.nomor_mou_pengusul')]),
                'nomor_mou_pengusul.unique' => __('components/validation.unique', ['nama' => __('components/form_mou_moa_ia.nomor_mou_pengusul')]),
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
                'MOU Berhasil Diupdate',
                404
            );
        }

        $data = [
            // 'users_id' => Auth::user()->id,
            'pengusul_id' => $request->pengusul_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'nomor_mou' => $request->nomor_mou,
            'nomor_mou_pengusul' => $request->nomor_mou_pengusul,
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
            if (Storage::exists('dokumen/mou/' . $mou->dokumen)) {
                Storage::delete('dokumen/mou/' . $mou->dokumen);
            }
            $namaFileBerkas = 'MOU - ' . $mou->pengusul->nama . ' - ' . Carbon::now()->format('YmdHs') . ".pdf";
            $request->file('dokumen')->storeAs(
                'dokumen/mou',
                $namaFileBerkas
            );
            $data['dokumen'] = $namaFileBerkas;
        }

        Mou::where('id', $mou->id)->update($data);

        return ResponseFormatter::success(
            null,
            'MOU Berhasil Diupdate',
            404
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mou $mou)
    {
        if ($mou) {
            if (Storage::exists('dokumen/mou/' . $mou->dokumen)) {
                Storage::delete('dokumen/mou/' . $mou->dokumen);
            }

            $mou->delete();
            return ResponseFormatter::success(
                null,
                'MOU Berhasil Dihapus'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'MOU Gagal Dihapus',
                404
            );
        }
    }

    public function dibuatOlehMou()
    {
        $role = "Admin";
        if ($role == "Admin") {
            $data = User::where('role', 'Admin')->orderBy('nama', 'desc')->get();
        }

        if ($data) {
            return ResponseFormatter::success(
                $data,
                'Data Dibuat Oleh Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Gagal Diambil',
                404
            );
        }
    }
}
