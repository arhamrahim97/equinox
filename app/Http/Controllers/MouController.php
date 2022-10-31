<?php

namespace App\Http\Controllers;

use App\Models\Ia;
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
use App\Http\Requests\UpdateMouRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class MouController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $data = [
            'user' => User::where('role', 'Admin')->get(),
        ];
        if ($request->ajax()) {
            $data = Mou::with('pengusul', 'user')->latest()
                // filtering
                ->where(function ($query) use ($request) {
                    if ($request->search) {
                        $query->where(function ($q) use ($request) {
                            $q->where('nomor_mou_pengusul', 'like', '%' . $request->search . '%');
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
                            $query->whereRaw('tanggal_berakhir > NOW() AND DATE_ADD(NOW(), INTERVAL 364 DAY) < tanggal_berakhir');
                        } else if ($request->status == 'masa_tenggang') {
                            $query->where(function ($q) {
                                $q->where('tanggal_berakhir', '=', Carbon::now());
                                $q->orWhereRaw('tanggal_berakhir > NOW() AND DATE_ADD(NOW(), INTERVAL 364 DAY) > tanggal_berakhir');
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
                    if ($datetime1 < $datetime2) {
                        return '<span class="badge badge-danger">' . __('components/span.kadaluarsa') . '</span>';
                    } else {
                        if ($jumlah_tahun < 1) {
                            return '<span class="badge badge-warning">' . __('components/span.masa_tenggang') . '</span>';
                        } else {
                            return '<span class="badge badge-success">' . __('components/span.aktif') . '</span>';
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    if (Auth::user()->role == 'Admin') {
                        $actionBtn = '
                        <div class="row text-center justify-content-center">';
                        if (($row->dokumen != '') || ($row->dokumen != NULL)) {
                            $actionBtn .= '<a href="' . Storage::url("dokumen/mou/" . $row->dokumen) . '" id="btn-show" class="btn btn-success btn-sm mr-1 my-1" target="_blank()">' . __('components/button.download_document') . '</a>';
                        }
                        $actionBtn .= '
                            <a href="' . url('/mou/' . $row->id) . '" id="btn-show" class="btn btn-info btn-sm mr-1 my-1">' . __('components/button.view') . '</a>
                            <a href="' . url('/mou/' . $row->id . '/edit') . '" id="btn-edit" class="btn btn-warning btn-sm mr-1 my-1">' . __('components/button.edit') . '</a>
                            <button id="btn-delete" onclick="hapus(' . $row->id . ')" class="btn btn-danger btn-sm mr-1 my-1" value="' . $row->id . '" >' . __('components/button.delete') . '</button>
                        </div>';
                    } else {
                        $actionBtn = '
                        <div class="row text-center justify-content-center">';
                        if (($row->dokumen != '') || ($row->dokumen != NULL)) {
                            $actionBtn .= '<a href="' . Storage::url("dokumen/mou/" . $row->dokumen) . '" id="btn-show" class="btn btn-success btn-sm mr-1 my-1" target="_blank()">' . __('components/button.download_document') . '</a>';
                        }
                        $actionBtn .= '<a href="' . url('/mou/' . $row->id) . '" id="btn-show" class="btn btn-info btn-sm mr-1 my-1">' . __('components/button.view') . '</a>                                
                        </div>';
                    }

                    return $actionBtn;
                })
                ->rawColumns(['status', 'action', 'dibuat_oleh'])
                ->make(true);
        }
        return view('pages/mou/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == 'Admin') {
            $data = [
                'pengusul' => Pengusul::with(['negara', 'provinsi', 'kota', 'kecamatan', 'kelurahan'])->orderBy('id', 'desc')->orderBy('id', 'desc')->get()
            ];
            return view('pages/mou/create', $data);
        } else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMouRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            return response()->json(['error' => $validator->errors()]);
        }

        $pengusul = Pengusul::find($request->pengusul_id);
        $namaFileBerkas = 'MOU - ' . $pengusul->nama . ' - ' . Carbon::now()->format('YmdHs') . ".pdf";
        $request->file('dokumen')->storeAs(
            'dokumen/mou',
            $namaFileBerkas
        );

        $data = [
            'users_id' => Auth::user()->id,
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
        return response()->json(['success' => 'Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function show(Mou $mou)
    {
        $data = [
            'mou' => Mou::with(['pengusul'])->where('id', $mou->id)->first()
        ];
        return view('pages/mou/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function edit(Mou $mou)
    {
        if (Auth::user()->role == 'Admin') {
            $data = [
                'mou' => Mou::with(['pengusul'])->where('id', $mou->id)->first(),
                'pengusul' => Pengusul::with(['negara', 'provinsi', 'kota', 'kecamatan', 'kelurahan'])->orderBy('id', 'desc')->get()
            ];
            return view('pages/mou/edit', $data);
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMouRequest  $request
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
            return response()->json(['error' => $validator->errors()]);
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

        return response()->json(['success' => 'Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mou $mou)
    {
        if (Storage::exists('dokumen/mou/' . $mou->dokumen)) {
            Storage::delete('dokumen/mou/' . $mou->dokumen);
        }

        $mou->delete();
        return response()->json([
            'res' => 'success'
        ]);
    }

    public function pohonMou(Request $request)
    {
        $mouList = Mou::with('moa', 'pengusul', 'user')->latest();

        $data = [
            'user' => User::where('role', 'Admin')->get(),
        ];
        if ($request->ajax()) {
            $data = $mouList
                // filtering
                ->where(function ($query) use ($request) {
                    if ($request->search) {
                        $query->where(function ($q) use ($request) {
                            $q->where('nomor_mou_pengusul', 'like', '%' . $request->search . '%');
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
                            $query->whereRaw('tanggal_berakhir > NOW() AND DATE_ADD(NOW(), INTERVAL 364 DAY) < tanggal_berakhir');
                        } else if ($request->status == 'masa_tenggang') {
                            $query->where(function ($q) {
                                $q->where('tanggal_berakhir', '=', Carbon::now());
                                $q->orWhereRaw('tanggal_berakhir > NOW() AND DATE_ADD(NOW(), INTERVAL 364 DAY) > tanggal_berakhir');
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
                ->addColumn('jumlah_moa', function ($data) {
                    return '<span class="badge badge-primary">' . $data->moa->count() . '</span>';
                })
                ->addColumn('jumlah_ia', function ($data) {
                    $count = 0;
                    foreach ($data->moa as $r) {
                        $count += $r->ia->count();
                    }
                    return '<span class="badge badge-info">' . $count . '</span>';
                })
                ->addColumn('status', function ($data) {
                    $datetime1 = date_create($data->tanggal_berakhir);
                    $datetime2 = date_create(date("Y-m-d"));
                    $interval = date_diff($datetime1, $datetime2);
                    $jumlah_tahun =  $interval->format('%y');
                    if ($datetime1 < $datetime2) {
                        return '<span class="badge badge-danger">' . __('components/span.kadaluarsa') . '</span>';
                    } else {
                        if ($jumlah_tahun < 1) {
                            return '<span class="badge badge-warning">' . __('components/span.masa_tenggang') . '</span>';
                        } else {
                            return '<span class="badge badge-success">' . __('components/span.aktif') . '</span>';
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                        <div class="row text-center justify-content-center">';
                    $actionBtn .=  '<a href="' . url('/pohon-kerja-sama/mou/moa/' . $row->id) . '" id="btn-show" class="btn btn-primary btn-sm mr-1 my-1">' . __('components/button.daftar') . ' MOA</a>';
                    $actionBtn .=  '<a href="' . url('/pohon-kerja-sama/mou/ia/' . $row->id) . '" id="btn-show" class="btn btn-info btn-sm mr-1 my-1">' . __('components/button.daftar') . ' IA</a>';
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })

                ->rawColumns(['status', 'action', 'dibuat_oleh', 'jumlah_moa', 'jumlah_ia'])
                ->make(true);
        }
        return view('pages/pohonKerjaSama/mou/index', $data);
    }

    public function daftarMoa(Mou $mou, Request $request)
    {
        $user = User::whereIn('role', ['Admin', 'Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM'])
            ->get();

        $data = [
            'user' => $user,
            'mou' => $mou
        ];

        if ($request->ajax()) {
            $data = Moa::with('pengusul', 'user')->where('mou_id', $mou->id)->latest()

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
                ->addColumn('jumlah_ia', function ($data) {
                    return '<span class="badge badge-info">' . $data->ia->count() . '</span>';
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
                    $actionBtn = '
                    <div class="row text-center justify-content-center">
                        <a href="' . url('/pohon-kerja-sama/mou/moa/ia/' . $row->id) . '" id="btn-show" class="btn btn-info btn-sm mr-1 my-1">' . __('components/button.view') . ' IA</a>
                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['status', 'action', 'dibuat_oleh', 'jumlah_ia'])
                ->make(true);
        }


        return view('pages/pohonKerjaSama/mou/daftarMoa_', $data);
    }

    public function daftarIa(Mou $mou, Request $request)
    {
        $user = User::whereIn('role', ['Admin', 'Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM', 'Unit Kerja', 'Prodi'])->get();

        $moa = Moa::where('mou_id', $mou->id)->pluck('id')->toArray();

        $data = [
            'user' => $user,
            'mou' => $mou
        ];

        if ($request->ajax()) {
            $data = Ia::with('pengusul', 'user', 'anggotaFakultas', 'anggotaProdi')->whereIn('moa_id', $moa)->latest()
                // filter
                ->where(function ($query) use ($request) {
                    if ($request->search) {
                        $query->where(function ($q) use ($request) {
                            $q->where('nomor_ia_pengusul', 'like', '%' . $request->search . '%');
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
                            $query->where('tanggal_berakhir', '>', Carbon::now());
                        } else if ($request->status == 'selesai') {
                            $query->whereRaw('laporan_hasil_pelaksanaan != "" OR laporan_hasil_pelaksanaan != NULL');
                        } else if ($request->status == 'melewati_batas') { // melewati batas
                            $query->whereRaw('tanggal_berakhir < NOW() AND (laporan_hasil_pelaksanaan = "" OR laporan_hasil_pelaksanaan is NULL)');
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
                        if (($data->laporan_hasil_pelaksanaan != '') || ($data->laporan_hasil_pelaksanaan != NULL)) {
                            return '<span class="badge badge-primary">' . __('components/span.selesai') . '</span>';
                        } else {
                            return '<span class="badge badge-danger">' . __('components/span.melewati_batas') . '</span>';
                        }
                    } else {
                        if (($data->laporan_hasil_pelaksanaan != '') || ($data->laporan_hasil_pelaksanaan != NULL)) {
                            return '<span class="badge badge-primary">' . __('components/span.selesai') . '</span>';
                        } else {
                            return '<span class="badge badge-success">' . __('components/span.aktif') . '</span>';
                        }
                    }
                })
                ->rawColumns(['status', 'action', 'dibuat_oleh'])
                ->make(true);
        }

        return view('pages/pohonKerjaSama/mou/daftarIa_', $data);
    }

    public function daftarMoaIa(Moa $moa, Request $request)
    {
        $user = User::whereIn('role', ['Admin', 'Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM', 'Unit Kerja', 'Prodi'])->get();

        $mou = Mou::find($moa->mou_id);
        $data = [
            'user' => $user,
            'moa' => $moa,
            'mou' => $mou
        ];

        if ($request->ajax()) {
            $data = Ia::with('pengusul', 'user', 'anggotaFakultas', 'anggotaProdi')->where('moa_id', $moa->id)->latest()
                // filter
                ->where(function ($query) use ($request) {
                    if ($request->search) {
                        $query->where(function ($q) use ($request) {
                            $q->where('nomor_ia_pengusul', 'like', '%' . $request->search . '%');
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
                            $query->where('tanggal_berakhir', '>', Carbon::now());
                        } else if ($request->status == 'selesai') {
                            $query->whereRaw('laporan_hasil_pelaksanaan != "" OR laporan_hasil_pelaksanaan != NULL');
                        } else if ($request->status == 'melewati_batas') { // melewati batas
                            $query->whereRaw('tanggal_berakhir < NOW() AND (laporan_hasil_pelaksanaan = "" OR laporan_hasil_pelaksanaan is NULL)');
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
                        if (($data->laporan_hasil_pelaksanaan != '') || ($data->laporan_hasil_pelaksanaan != NULL)) {
                            return '<span class="badge badge-primary">' . __('components/span.selesai') . '</span>';
                        } else {
                            return '<span class="badge badge-danger">' . __('components/span.melewati_batas') . '</span>';
                        }
                    } else {
                        if (($data->laporan_hasil_pelaksanaan != '') || ($data->laporan_hasil_pelaksanaan != NULL)) {
                            return '<span class="badge badge-primary">' . __('components/span.selesai') . '</span>';
                        } else {
                            return '<span class="badge badge-success">' . __('components/span.aktif') . '</span>';
                        }
                    }
                })
                ->rawColumns(['status', 'action', 'dibuat_oleh'])
                ->make(true);
        }

        return view('pages/pohonKerjaSama/mou/daftarMoaIa_', $data);
    }
}
