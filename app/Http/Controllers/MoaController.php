<?php

namespace App\Http\Controllers;

use App\Models\Moa;
use App\Models\Mou;
use App\Models\User;
use App\Models\Pengusul;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateMoaRequest;
use App\Models\Fakultas;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class MoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (in_array(Auth::user()->role, array('Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM', 'Unit Kerja', 'Prodi'))) {
            $user = User::where('fakultas_id', Auth::user()->fakultas_id)->whereNotIn('role', ['Admin', 'Prodi', 'Unit Kerja'])->get();
        } else {
            $user = User::whereIn('role', ['Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM'])
                ->get();
        }
        $data = [
            'user' => $user,
        ];
        if ($request->ajax()) {
            $data = Moa::with('pengusul', 'user')->latest()
                ->where(function ($q) {
                    if (in_array(Auth::user()->role, array('Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM', 'Prodi', 'Unit Kerja'))) {
                        $q->whereHas('user', function ($q2) {
                            $q2->where('fakultas_id', Auth::user()->fakultas_id);
                        });
                    }
                })

                // filter
                ->where(function ($query) use ($request) {
                    if ($request->search) {
                        $query->where(function ($q) use ($request) {
                            $q->where('nomor_moa_pengusul', 'like', '%' . $request->search . '%');
                            $q->orWhere('program', 'like', '%' . $request->search . '%');
                            $q->orWhereHas('pengusul', function ($q2) use ($request) {
                                $q2->where('nama', 'like', '%' . $request->search . '%');
                            });
                        });
                    }

                    if ($request->dibuat_oleh) {
                        $query->whereHas('user', function ($q)  use ($request) {
                            $q->where('nama', $request->dibuat_oleh);
                        });
                    }

                    if ($request->status) {
                        if ($request->status == 'aktif') {
                            $query->whereRaw('tanggal_berakhir > NOW() AND DATE_ADD(NOW(), INTERVAL 180 DAY) < tanggal_berakhir');
                        } else if ($request->status == 'masa_tenggang') {
                            $query->where(function ($q) {
                                $q->where('tanggal_berakhir', '=', Carbon::now());
                                $q->orWhereRaw('tanggal_berakhir > NOW() AND DATE_ADD(NOW(), INTERVAL 180 DAY) > tanggal_berakhir');
                            });
                        } else if ($request->status == 'kadaluarsa') {
                            $query->where('tanggal_berakhir', '<', Carbon::now());
                        }
                    }
                })
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('pengusul_nama', function ($data) {
                    return $data->pengusul->nama;
                })
                ->addColumn('dibuat_oleh', function ($data) {
                    return '<span class="badge badge-secondary">' . $data->user->nama . '</span>';
                })
                ->addColumn('status', function ($data) {
                    $datetime1 = date_create($data->tanggal_berakhir);
                    $datetime2 = date_create(date("Y-m-d"));
                    $interval = date_diff($datetime1, $datetime2);
                    $jumlah_tahun =  $interval->format('%y');
                    $jumlah_bulan =  $interval->format('%m');
                    if ($datetime1 < $datetime2) {
                        return '<span class="badge badge-danger">' . __('components/span.kadaluarsa') . '</span>';
                    } else {
                        if ($jumlah_tahun < 1) {
                            if ($jumlah_bulan < 6) {
                                return '<span class="badge badge-warning">' . __('components/span.masa_tenggang') . '</span>';
                            } else {
                                return '<span class="badge badge-success">' . __('components/span.aktif') . '</span>';
                            }
                        } else {
                            return '<span class="badge badge-success">' . __('components/span.aktif') . '</span>';
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    if (in_array(Auth::user()->role, array('Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM', 'Admin'))) {
                        $actionBtn = '<div class="row text-center justify-content-center">';
                        if (($row->dokumen != '') || ($row->dokumen != NULL)) {
                            $actionBtn .= '<a href="' . Storage::url("dokumen/moa/" . $row->dokumen) . '" id="btn-show" class="btn btn-success btn-sm mr-1 my-1" target="_blank()">' . __('components/button.download_document') . '</a>';
                        }
                        $actionBtn .= '
                            <a href="' . url('/moa/' . $row->id) . '" id="btn-show" class="btn btn-info btn-sm mr-1 my-1">' . __('components/button.view') . '</a>
                            <a href="' . url('/moa/' . $row->id . '/edit') . '" id="btn-edit" class="btn btn-warning btn-sm mr-1 my-1">' . __('components/button.edit') . '</a>
                            <button id="btn-delete" onclick="hapus(' . $row->id . ')" class="btn btn-danger btn-sm mr-1 my-1" value="' . $row->id . '" >' . __('components/button.delete') . '</button>
                            </div>';
                    } else { // Role == Admin, Prodi, Unit Kerja
                        $actionBtn = '<div class="row text-center justify-content-center">';
                        if (($row->dokumen != '') || ($row->dokumen != NULL)) {
                            $actionBtn .= '<a href="' . Storage::url("dokumen/moa/" . $row->dokumen) . '" id="btn-show" class="btn btn-success btn-sm mr-1 my-1" target="_blank()">' . __('components/button.download_document') . '</a>';
                        }
                        $actionBtn .= '<a href="' . url('/moa/' . $row->id) . '" id="btn-show" class="btn btn-info btn-sm mr-1 my-1">' . __('components/button.view') . '</a>
                        </div>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['status', 'action', 'dibuat_oleh'])
                ->make(true);
        }
        return view('pages/moa/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (in_array(Auth::user()->role, array('Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM', 'Admin'))) {
            $data = [
                'pengusul' => Pengusul::with(['negara', 'provinsi', 'kota', 'kecamatan', 'kelurahan'])->orderBy('id', 'desc')->get(),
                'nomor_mou_pengusul' => Mou::with(['pengusul'])->orderBy('id', 'desc')->get(),
            ];
            return view('pages/moa/create', $data);
        } else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMoaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            return response()->json(['error' => $validator->errors()]);
        }

        $pengusul = Pengusul::find($request->pengusul_id);
        $namaFileBerkas = 'MOA - ' . $pengusul->nama . ' - ' . Carbon::now()->format('YmdHs') . ".pdf";
        $request->file('dokumen')->storeAs(
            'dokumen/moa',
            $namaFileBerkas
        );

        $data = [
            'users_id' => Auth::user()->id,
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
        return response()->json(['success' => 'Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Moa  $moa
     * @return \Illuminate\Http\Response
     */
    public function show(Moa $moa)
    {
        if (($moa->user->fakultas_id == Auth::user()->fakultas_id) || (Auth::user()->role == 'Admin')) {
            $data = [
                'moa' => Moa::with(['pengusul', 'mou', 'user'])->where('id', $moa->id)->first()
            ];
            return view('pages/moa/show', $data);
        } else {
            abort(404);
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
        if ((($moa->user->fakultas_id == Auth::user()->fakultas_id) && ($moa->user->prodi_id == Auth::user()->prodi_id)) || (Auth::user()->role == 'Admin')) {
            $data = [
                'moa' => Moa::with(['pengusul'])->where('id', $moa->id)->first(),
                'pengusul' => Pengusul::with(['negara', 'provinsi', 'kota', 'kecamatan', 'kelurahan'])->orderBy('id', 'desc')->get(),
                'nomor_mou_pengusul' => Mou::with(['pengusul'])->orderBy('id', 'desc')->get(),
            ];

            return view('pages/moa/edit', $data);
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMoaRequest  $request
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
                'nomor_mou_pengusul' => 'required',
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
            return response()->json(['error' => $validator->errors()]);
        }

        $data = [
            // 'users_id' => Auth::user()->id,
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

        return response()->json(['success' => 'Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Moa  $moa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Moa $moa)
    {
        if (Storage::exists('dokumen/moa/' . $moa->dokumen)) {
            Storage::delete('dokumen/moa/' . $moa->dokumen);
        }

        $moa->delete();
        return response()->json([
            'res' => 'success'
        ]);
    }
}
