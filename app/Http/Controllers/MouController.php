<?php

namespace App\Http\Controllers;

use App\Models\Mou;
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
        if ($request->ajax()) {
            $data = DB::table('mou')
                            ->join('pengusul', 'mou.pengusul_id', '=', 'pengusul.id')                            
                            ->join('users', 'mou.users_id', '=', 'users.id')                            
                            ->select('mou.*', 'pengusul.nama as pengusul_nama', 'users.nama as user_nama')
                            ->whereNull('mou.deleted_at')
                            ->orderBy('mou.id', 'desc')
                            ->get();            
            // $data = Mou::with(['pengusul'])->orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('dibuat_oleh', function ($data) {                                        
                    return '<span class="badge badge-secondary">'.$data->user_nama.'</span>';                                                                                                                                                              
                })
                ->addColumn('status', function ($data) {
                    $datetime1 = date_create($data->tanggal_berakhir);
                    $datetime2 = date_create(date("Y-m-d"));            
                    $interval = date_diff($datetime1, $datetime2);        
                    $jumlah_tahun =  $interval->format('%y');     
                    if($datetime1<$datetime2){
                        return '<span class="badge badge-danger">'.__('components/span.kadaluarsa').'</span>';                            
                    } else{
                        if($jumlah_tahun < 1){
                            return '<span class="badge badge-warning">'.__('components/span.masa_tenggang').'</span>';                            
                        } else{
                            return '<span class="badge badge-success">'.__('components/span.aktif').'</span>';                            
                        }
                    }                 
                })
                ->addColumn('action', function ($row) {
                    if(Auth::user()->role == 'Admin'){
                        $actionBtn = '
                        <div class="row text-center justify-content-center">
                            <a href="' . Storage::url("dokumen/mou/" . $row->dokumen) . '" id="btn-show" class="btn btn-success btn-sm mr-1 my-1">' . __('components/button.download_document') . '</a>                     
                                <a href="' . url('/mou/' . $row->id) . '" id="btn-show" class="btn btn-info btn-sm mr-1 my-1">' . __('components/button.view') . '</a>
                                <a href="' . url('/mou/' . $row->id . '/edit') . '" id="btn-edit" class="btn btn-warning btn-sm mr-1 my-1">' . __('components/button.edit') . '</a>
                                <button id="btn-delete" onclick="hapus(' . $row->id . ')" class="btn btn-danger btn-sm mr-1 my-1" value="' . $row->id . '" >' . __('components/button.delete') . '</button>
                        </div>';
                    } else{
                        $actionBtn = '
                        <div class="row text-center justify-content-center">
                            <a href="' . Storage::url("dokumen/mou/" . $row->dokumen) . '" id="btn-show" class="btn btn-success btn-sm mr-1 my-1">' . __('components/button.download_document') . '</a>                     
                            <a href="' . url('/mou/' . $row->id) . '" id="btn-show" class="btn btn-info btn-sm mr-1 my-1">' . __('components/button.view') . '</a>                                
                        </div>';
                    }

                    return $actionBtn;
                })
                ->rawColumns(['status', 'action', 'dibuat_oleh'])
                ->make(true);
        }        
        return view('pages/mou/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 'Admin'){
            $data = [
                'pengusul' => Pengusul::with(['negara', 'provinsi', 'kota', 'kecamatan', 'kelurahan'])->orderBy('id', 'desc')->get()
            ];        
            return view('pages/mou/create', $data);
        } else{
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
                'nomor_mou' => ['required', Rule::unique('mou')->withoutTrashed()],
                'nomor_mou_pengusul' => ['required', Rule::unique('mou')->withoutTrashed()],            
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
        $namaFileBerkas = 'MOU - '. $pengusul->nama. ' - '. Carbon::now()->format('YmdHs') . ".pdf";                  
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
        if(Auth::user()->role == 'Admin'){
            $data = [
                'mou' => Mou::with(['pengusul'])->where('id', $mou->id)->first(),
                'pengusul' => Pengusul::with(['negara', 'provinsi', 'kota', 'kecamatan', 'kelurahan'])->orderBy('id', 'desc')->get()
            ];            
            return view('pages/mou/edit', $data);
        } else{
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
        if($request->nomor_mou != $mou->nomor_mou){
            $nomor_mou_req = ['required', Rule::unique('mou')->withoutTrashed()];
        } else{
            $nomor_mou_req = 'required';
        }

        if($request->nomor_mou_pengusul != $mou->nomor_mou_pengusul){
            $nomor_mou_pengusul_req = ['required', Rule::unique('mou')->withoutTrashed()];
        } else{
            $nomor_mou_pengusul_req = 'required';
        }
       
        $validator = Validator::make(
            $request->all(),
            [
                'pengusul_id' => 'required',
                'nomor_mou' => $nomor_mou_req,
                'nomor_mou_pengusul' => $nomor_mou_pengusul_req,
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
            'users_id' => Auth::user()->id,
            'pengusul_id' => $request->pengusul_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'nomor_mou' => $request->nomor_mou,
            'nomor_mou_pengusul' => $request->nomor_mou_pengusul,
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

        if($request->dokumen){            
            if (Storage::exists('dokumen/mou/' . $mou->dokumen)) {
                Storage::delete('dokumen/mou/' . $mou->dokumen);
            }            
            $namaFileBerkas = 'MOU - '. $mou->pengusul->nama. ' - '. Carbon::now()->format('YmdHs') . ".pdf";                  
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
}