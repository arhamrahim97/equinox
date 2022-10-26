<?php

namespace App\Http\Controllers;

use App\Models\Ia;
use App\Models\Moa;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Fakultas;
use App\Models\Pengusul;
use App\Models\AnggotaProdi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\AnggotaFakultas;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreIaRequest;
use App\Http\Requests\UpdateIaRequest;
use App\Models\JenisKerjasama;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class IaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (in_array(Auth::user()->role, array('Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM', 'Unit Kerja', 'Prodi'))) {
            $user = User::where('role', '!=', 'Admin')->where('fakultas_id', Auth::user()->fakultas_id)->orWhere('role', 'LPPM')->get();
        } else {
            $user = User::whereIn('role', ['Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM', 'Unit Kerja', 'Prodi'])->get();
        }
        $data = [
            'user' => $user,
        ];
        if ($request->ajax()) {
            if (in_array(Auth::user()->role, array('Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM', 'Prodi', 'Unit Kerja'))) {
                if (in_array(Auth::user()->role, array('Fakultas', 'Pascasarjana', 'PSDKU'))) {
                    $data = DB::table('ia')
                        ->join('pengusul', 'ia.pengusul_id', '=', 'pengusul.id')
                        ->join('users', 'ia.users_id', '=', 'users.id') // User pembuat
                        ->leftJoin('anggota_fakultas as af', 'ia.id', 'af.ia_id')
                        ->select(DB::raw('ia.*, pengusul.nama as pengusul_nama,  GROUP_CONCAT(af.fakultas_id) as ang_fakultas, FIND_IN_SET(' . Auth::user()->fakultas_id . ', GROUP_CONCAT(af.fakultas_id)) as find'), 'users.nama as user_nama')
                        ->whereNull('ia.deleted_at')
                        ->whereNull('af.deleted_at')
                        ->groupBy('ia.id')
                        ->havingRaw('FIND_IN_SET(' . Auth::user()->fakultas_id . ', ang_fakultas)')
                        ->orderBy('ia.id', 'desc');
                    // ->get();
                } else {
                    if (Auth::user()->role == 'LPPM') {
                        $data = DB::table('ia')
                            ->join('pengusul', 'ia.pengusul_id', '=', 'pengusul.id')
                            ->join('users', 'ia.users_id', '=', 'users.id')
                            ->select('ia.*', 'pengusul.nama as pengusul_nama', 'users.fakultas_id', 'users.nama as user_nama')
                            ->whereNull('ia.deleted_at')
                            ->where('users.role', Auth::user()->role) // role == LPPM
                            ->orderBy('id', 'desc');
                        // ->get();
                    } else { // 'Prodi', 'Unit Kerja'
                        $data = DB::table('ia')
                            ->join('pengusul', 'ia.pengusul_id', '=', 'pengusul.id')
                            ->join('users', 'ia.users_id', '=', 'users.id') // User pembuat
                            ->leftJoin('anggota_prodi as ap', 'ia.id', 'ap.ia_id')
                            ->select(DB::raw('ia.*, pengusul.nama as pengusul_nama, GROUP_CONCAT(ap.prodi_id) as ang_prodi, FIND_IN_SET(' . Auth::user()->prodi_id . ', GROUP_CONCAT(ap.prodi_id)) as find'), 'users.nama as user_nama')
                            ->whereNull('ia.deleted_at')
                            ->whereNull('ap.deleted_at')
                            ->groupBy('ia.id')
                            ->havingRaw('FIND_IN_SET(' . Auth::user()->prodi_id . ', ang_prodi)')
                            ->orderBy('ia.id', 'desc');
                        // ->get();
                    }
                }
            } else {
                if (Auth::user()->role == 'Admin') {
                    $data = DB::table('ia')
                        ->join('pengusul', 'ia.pengusul_id', '=', 'pengusul.id')
                        ->join('users', 'ia.users_id', '=', 'users.id') // User pembuat
                        ->select('ia.*', 'pengusul.nama as pengusul_nama', 'users.nama as user_nama')
                        ->whereNull('ia.deleted_at')
                        ->orderBy('id', 'desc');
                    // ->get();
                }
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('dibuat_oleh', function ($data) {
                    return '<span class="badge badge-secondary">' . $data->user_nama . '</span>';
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
                            // return '<span class="badge badge-success">'.__('components/span.aktif').'</span>';
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
                ->addColumn('action', function ($row) {
                    if (($row->users_id == Auth::user()->id)) {
                        $actionBtn = '<div class="row text-center justify-content-center">';
                        if (Auth::user()->role == 'Admin') {
                            if ((($row->surat_tugas == '') || ($row->surat_tugas == NULL))) {
                                $actionBtn = '<button id="btn-upload-surat_tugas" class="btn btn-secondary btn-sm mr-1 my-1" onclick="showModalFileTambahan(' . $row->id . ', `surat_tugas`)"  value="' . $row->id . '" >' . __('components/button.upload_surat_tugas') . '</button>';
                            }
                        }
                        $actionBtn .= '<a href="' . Storage::url("dokumen/ia/" . $row->dokumen) . '" id="btn-show" class="btn btn-success btn-sm mr-1 my-1">' . __('components/button.download_document') . '</a>';
                        if (($row->surat_tugas != '') || ($row->surat_tugas != NULL)) {
                            $actionBtn .= '<a href="' . Storage::url("dokumen/ia-surat_tugas/" . $row->surat_tugas) . '" id="btn-upload-laporan_hasil_pelaksanaan" class="btn btn-success btn-sm mr-1 my-1">' . __('components/button.download_surat_tugas') . '</a>';
                        }
                        if (($row->laporan_hasil_pelaksanaan != '') || ($row->laporan_hasil_pelaksanaan != NULL)) {
                            $actionBtn .= '<a href="' . Storage::url("dokumen/ia-laporan_hasil_pelaksanaan/" . $row->laporan_hasil_pelaksanaan) . '" id="btn-upload-laporan_hasil_pelaksanaan" class="btn btn-success btn-sm mr-1 my-1">' . __('components/button.download_laporan_pelaksanaan') . '</a>';
                        } else {
                            if (($row->surat_tugas != '') || ($row->surat_tugas != NULL)) {
                                $actionBtn .= '<button id="btn-upload-laporan_hasil_pelaksanaan" class="btn btn-secondary btn-sm mr-1 my-1" onclick="showModalFileTambahan(' . $row->id . ', `laporan_pelaksanaan`)"  value="' . $row->id . '" >' . __('components/button.upload_laporan_pelaksanaan') . '</button>';
                            }
                        }


                        $actionBtn .= '<a href="' . url('/ia/' . $row->id) . '" id="btn-show" class="btn btn-info btn-sm mr-1 my-1">' . __('components/button.view') . '</a>';
                        $actionBtn .= '<a href="' . url('/ia/' . $row->id . '/edit') . '" id="btn-edit" class="btn btn-warning btn-sm mr-1 my-1">' . __('components/button.edit') . '</a>';
                        $actionBtn .= '<button id="btn-delete" onclick="hapus(' . $row->id . ')" class="btn btn-danger btn-sm mr-1 my-1" value="' . $row->id . '" >' . __('components/button.delete') . '</button>';
                        $actionBtn .= '</div>';
                    } else { // role selain user pembuat
                        $actionBtn = '';
                        if ((Auth::user()->role == 'Admin') && (($row->surat_tugas == '') || ($row->surat_tugas == NULL))) {
                            $actionBtn = '<button id="btn-upload-laporan_hasil_pelaksanaan" class="btn btn-secondary btn-sm mr-1 my-1" onclick="showModalFileTambahan(' . $row->id . ', `surat_tugas`)"  value="' . $row->id . '" >' . __('components/button.upload_surat_tugas') . '</button>';
                        }
                        $actionBtn .= '<div class="row text-center justify-content-center">';
                        $actionBtn .= '<a href="' . Storage::url("dokumen/ia/" . $row->dokumen) . '" id="btn-show" class="btn btn-success btn-sm mr-1 my-1">' . __('components/button.download_document') . '</a>';
                        if (($row->surat_tugas != '') || ($row->surat_tugas != NULL)) {
                            $actionBtn .= '<a href="' . Storage::url("dokumen/ia-surat_tugas/" . $row->surat_tugas) . '" id="btn-upload-laporan_hasil_pelaksanaan" class="btn btn-success btn-sm mr-1 my-1">' . __('components/button.download_surat_tugas') . '</a>';
                        }
                        if (($row->laporan_hasil_pelaksanaan != '') || ($row->laporan_hasil_pelaksanaan != NULL)) {
                            $actionBtn .= '<a href="' . Storage::url("dokumen/ia-laporan_hasil_pelaksanaan/" . $row->laporan_hasil_pelaksanaan) . '" id="btn-upload-laporan_hasil_pelaksanaan" class="btn btn-success btn-sm mr-1 my-1">' . __('components/button.download_laporan_pelaksanaan') . '</a>';
                        }
                        $actionBtn .= '<a href="' . url('/ia/' . $row->id) . '" id="btn-show" class="btn btn-info btn-sm mr-1 my-1">' . __('components/button.view') . '</a>';
                        if (Auth::user()->role == 'Admin') {
                            $actionBtn .= '<a href="' . url('/ia/' . $row->id . '/edit') . '" id="btn-edit" class="btn btn-warning btn-sm mr-1 my-1">' . __('components/button.edit') . '</a>';
                            $actionBtn .= '<button id="btn-delete" onclick="hapus(' . $row->id . ')" class="btn btn-danger btn-sm mr-1 my-1" value="' . $row->id . '" >' . __('components/button.delete') . '</button>';
                        }
                        $actionBtn .= '</div>';
                    }
                    return $actionBtn;
                })
                ->filter(function ($query) use ($request) {
                    if ($request->search != '') {
                        $query->whereRaw('(program LIKE "%' . $request->search . '%" OR pengusul.nama LIKE "%' . $request->search . '%" OR ia.nomor_ia_pengusul LIKE "%' . $request->search . '%")');
                    }

                    if (!empty($request->dibuat_oleh)) {
                        $query->where('users.nama', $request->dibuat_oleh);
                    }

                    if (!empty($request->status)) {
                        if ($request->status == 'aktif') {
                            $query->where('tanggal_berakhir', '>=', date("Y-m-d"));
                            $query->whereRaw('(laporan_hasil_pelaksanaan = "" OR laporan_hasil_pelaksanaan is NULL)');
                        } else if ($request->status == 'selesai') {
                            $query->whereRaw('(laporan_hasil_pelaksanaan != "" OR laporan_hasil_pelaksanaan != NULL)');
                        } else if ($request->status == 'melewati_batas') { // melewati batas
                            $query->whereRaw('tanggal_berakhir < NOW() AND (laporan_hasil_pelaksanaan = "" OR laporan_hasil_pelaksanaan is NULL)');
                        }
                    }
                })
                ->rawColumns(['status', 'action', 'dibuat_oleh'])
                ->make(true);
        }
        return view('pages/ia/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (in_array(Auth::user()->role, array('Admin', 'Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM', 'Prodi', 'Unit Kerja'))) {
            $data = [
                'pengusul' => Pengusul::with(['negara', 'provinsi', 'kota', 'kecamatan', 'kelurahan'])->orderBy('id', 'desc')->get(),
                'nomor_moa_pengusul' => Moa::with(['mou'])->orderBy('id', 'desc')->get(),
                'prodi_fakultas' => Prodi::where('fakultas_id', Auth::user()->fakultas_id)->get(),
                'fakultas_all' => Fakultas::all(),
                'prodi_all' => Prodi::all(),
            ];
            return view('pages/ia/create', $data);
        } else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (in_array(Auth::user()->role, array('Admin', 'LPPM', 'Fakultas', 'Pascasarjana', 'PSDKU'))) {
            if (in_array(Auth::user()->role, array('Admin', 'LPPM'))) {
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
            return response()->json(['error' => $validator->errors()]);
        }

        $pengusul = Pengusul::find($request->pengusul_id);
        $namaFileBerkas = 'IA - ' . $pengusul->nama . ' - ' . Carbon::now()->format('YmdHs') . ".pdf";
        $request->file('dokumen')->storeAs(
            'dokumen/ia',
            $namaFileBerkas
        );


        $data = [
            'users_id' => Auth::user()->id,
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
                'prodi_id' => Auth::user()->prodi_id
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
                'fakultas_id' => Auth::user()->fakultas_id
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

        return response()->json($request);

        // return response()->json(['success' => 'Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ia  $ia
     * @return \Illuminate\Http\Response
     */
    public function show(Ia $ia)
    {
        $anggotaFakultas =  AnggotaFakultas::where('ia_id', $ia->id)->get();
        $found = FALSE;
        foreach ($anggotaFakultas as $item) {
            if ($item->fakultas_id == Auth::user()->fakultas_id) {
                $found = TRUE;
                break;
            } else {
                $found = FALSE;
            }
        }

        if (($ia->user->fakultas_id == Auth::user()->fakultas_id) || ($found == TRUE) || (Auth::user()->role == 'Admin') || ($ia->user->role == 'LPPM')) {
            $data = [
                'ia' => Ia::with(['pengusul', 'moa', 'jenisKerjasama', 'anggotaFakultas', 'anggotaProdi', 'user'])->where('id', $ia->id)->first()
            ];
            return view('pages/ia/show', $data);
        } else {
            abort(404);
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
        if ((($ia->user->fakultas_id == Auth::user()->fakultas_id) && ($ia->user->prodi_id == Auth::user()->prodi_id)) || (Auth::user()->role == 'Admin')) {
            $ia_ = Ia::with(['pengusul', 'moa', 'jenisKerjasama', 'anggotaFakultas', 'anggotaProdi'])->where('id', $ia->id)->first();
            $fakultas_ia = [];
            $prodi_ia = [];

            foreach ($ia_->anggotaFakultas as $value) {
                array_push($fakultas_ia, $value['fakultas_id']);
            }

            foreach ($ia_->anggotaProdi as $value) {
                array_push($prodi_ia, $value['prodi_id']);
            }

            $data = [
                'ia' => $ia_,
                'pengusul' => Pengusul::with(['negara', 'provinsi', 'kota', 'kecamatan', 'kelurahan'])->orderBy('id', 'desc')->get(),
                'nomor_moa_pengusul' => Moa::with(['mou'])->orderBy('id', 'desc')->get(),
                'prodi_fakultas' => Prodi::where('fakultas_id', Auth::user()->fakultas_id)->get(),
                'jenis_kerjasama_all' => JenisKerjasama::select('jenis_kerjasama')->groupBy('jenis_kerjasama')->get(),
                'fakultas_all' => Fakultas::all(),
                'prodi_all' => Prodi::all(),
                'fakultas_ia' => $fakultas_ia,
                'prodi_ia' => $prodi_ia,
            ];
            return view('pages/ia/edit', $data);
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIaRequest  $request
     * @param  \App\Models\Ia  $ia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ia $ia)
    {
        if (in_array(Auth::user()->role, array('Admin', 'LPPM', 'Fakultas', 'Pascasarjana', 'PSDKU'))) {
            if (in_array(Auth::user()->role, array('Admin', 'LPPM'))) {
                $fakultas_req = 'required';
                $fakultas = $request->fakultas;
                $prodi_req = 'required';
                $prodi = $request->program_studi;
            } else { //'Fakultas', 'Pascasarjana', 'PSDKU'
                $fakultas_req = '';
                $fakultas = Auth::user()->fakultas_id;
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
            return response()->json(['error' => $validator->errors()]);
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

        if (!in_array(Auth::user()->role, array('Prodi', 'Unit Kerja'))) {
            if (in_array(Auth::user()->role, array('LPPM', 'Admin'))) {
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
            if ((Auth::user()->role == 'LPPM') || (Auth::user()->role == 'Admin')) {
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
        return response()->json($data);
        // return response()->json(['success' => 'Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ia  $ia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ia $ia)
    {
        if (Storage::exists('dokumen/ia/' . $ia->dokumen)) {
            Storage::delete('dokumen/ia/' . $ia->dokumen);
        }

        if (Storage::exists('dokumen/ia-laporan_hasil_pelaksanaan/' . $ia->laporan_hasil_pelaksanaan)) {
            Storage::delete('dokumen/ia-laporan_hasil_pelaksanaan/' . $ia->laporan_hasil_pelaksanaan);
        }

        if (Storage::exists('dokumen/ia-surat_tugas/' . $ia->surat_tugas)) {
            Storage::delete('dokumen/ia-surat_tugas/' . $ia->surat_tugas);
        }

        if ($ia->anggotaProdi) {
            $ia->anggotaProdi()->delete();
        }

        if ($ia->anggotaFakultas) {
            $ia->anggotaFakultas()->delete();
        }

        if ($ia->jenisKerjasama) {
            $ia->jenisKerjasama()->delete();
        }

        $ia->delete();
        return response()->json([
            'res' => 'success'
        ]);
    }

    public function uploadTambahan(Request $request)
    {
        $id = $request->id_ia_;
        $jenis_upload = $request->jenis_upload;
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

        if ($jenis_upload == 'laporan_pelaksanaan') {
            if ($ia->users_id == Auth::user()->id) {
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

                return response()->json($request);
            } else {
                abort(404);
            }
        } else if ($jenis_upload == 'surat_tugas') {
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

            return response()->json($request);
        }
    }

    public function getEditJenisKerjasama(Request $request)
    {
        $id = $request->id;
        $daftarJenisKerjasama = JenisKerjasama::where('ia_id', $id)->get();
        $arrayJenisKerjasama = [];
        if ($daftarJenisKerjasama) {
            foreach ($daftarJenisKerjasama as $jenis_kerjasama) {
                array_push($arrayJenisKerjasama, $jenis_kerjasama->jenis_kerjasama);
            }
        }
        return response()->json($arrayJenisKerjasama);
    }
}
