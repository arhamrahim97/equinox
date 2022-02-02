<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\Mou;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class RekapitulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.master.rekapitulasi');
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
        
        $validator = Validator::make(
            $request->all(),
            [
                'jenis_dokumen' => 'required',
                'status' => 'required',
                'dibuat_oleh' => 'required',
                'dari_tanggal' => 'required',
                'sampai_tanggal' => 'required'                
            ],
            [
                'pengusul_id.required' => __('components/validation.required', ['nama' => __('pages/master/rekapitulasi.jenisDokumen')]),               
                'status.required' => __('components/validation.required', ['nama' => 'Status']),               
                'dibuat_oleh.required' => __('components/validation.required', ['nama' => __('pages/master/rekapitulasi.dibuatOleh')]),               
                'dari_tanggal.required' => __('components/validation.required', ['nama' => 'Tanggal ' .  __('pages/master/rekapitulasi.mulai')]),                                          
                'sampai_tanggal.required' => __('components/validation.required', ['nama' => ' Tanggal ' . __('pages/master/rekapitulasi.sampai')]),                                          
            ]
        );
    
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $data = [
            'dari_tanggal' => $request->dari_tanggal,
            'sampai_tanggal' => $request->sampai_tanggal,
            'jenis_dokumen' => $request->jenis_dokumen,
            'status' => $request->status,
            'dibuat_oleh' => implode(',', $request->dibuat_oleh)
        ];
        return response()->json($data);      
        // return response()->json(['success' => 'Success']);

    }
    
    
    public function datatables(Request $request){
        $dari_tanggal = date("Y-m-d", strtotime($request->dari_tanggal));
        $sampai_tanggal = date("Y-m-d", strtotime("+1 day", strtotime($request->sampai_tanggal)));
        if ($request->ajax()) {
            if($request->jenis_dokumen == 'mou'){
                $data = DB::table('mou')
                    ->leftJoin('pengusul', 'mou.pengusul_id', '=', 'pengusul.id')                            
                    ->leftJoin('users', 'mou.users_id', '=', 'users.id')                            
                    ->leftJoin('negara', 'pengusul.negara_id', '=', 'negara.id')                            
                    ->leftJoin('provinsi', 'pengusul.provinsi_id', '=', 'provinsi.id')                            
                    ->leftJoin('kota', 'pengusul.kota_id', '=', 'kota.id')                            
                    ->leftJoin('kecamatan', 'pengusul.kecamatan_id', '=', 'kecamatan.id')                            
                    ->leftJoin('kelurahan', 'pengusul.kelurahan_id', '=', 'kelurahan.id')                            
                    ->select(DB::raw('DATE_FORMAT(mou.created_at, "%d-%m-%Y") as tanggal_pembuatan'), DB::raw('DATE_FORMAT(mou.created_at, "%H:%i") as waktu_pembuatan'), 'users.nama as penginput', 'mou.pejabat_penandatangan as pejabat_penandatangan', 'pengusul.nama as pengusul', 'mou.nik_nip_pengusul as nik_nip_pengusul', 'mou.jabatan_pengusul as jabatan_pengusul', 'mou.latitude as latitude', 'mou.longitude as longitude', 'pengusul.region as region', 'negara.nama as negara', 'pengusul.provinsi_id as provinsi_id', 'provinsi.nama as provinsi_nama', 'pengusul.kota_id as kota_id', 'kota.nama as kota_nama', 'pengusul.kecamatan_id as kecamatan_id', 'kecamatan.nama as kecamatan_nama', 'pengusul.kelurahan_id as kelurahan_id', 'kelurahan.nama as kelurahan_nama', 'pengusul.alamat as alamat', 'pengusul.telepon as telepon', 'mou.nomor_mou as nomor_mou', 'mou.nomor_mou_pengusul as nomor_mou_pengusul', 'mou.program as program', DB::raw('DATE_FORMAT(mou.tanggal_mulai, "%d-%m-%Y") as tanggal_mulai'), DB::raw('DATE_FORMAT(mou.tanggal_berakhir, "%d-%m-%Y") as tanggal_berakhir'), 'mou.dokumen as nama_file', 'mou.metode_pertemuan as metode_pertemuan', DB::raw('DATE_FORMAT(mou.tanggal_pertemuan, "%d-%m-%Y") as tanggal_pertemuan'), DB::raw('DATE_FORMAT(mou.waktu_pertemuan, "%H:%i") as waktu_pertemuan'))
                    ->whereNull('mou.deleted_at') //skip deleted_at
                    ->whereBetween('mou.created_at', [$dari_tanggal, $sampai_tanggal])
                    ->whereRaw('mou.users_id IN ('.$request->dibuat_oleh.')')                    
                    ->orderBy('mou.created_at', 'asc');
                    
                    if ((in_array('aktif', $request->status)) && (in_array('masa_tenggang', $request->status)) && (in_array('kadaluarsa', $request->status))){
                        
                    }
                    else if ((in_array('aktif', $request->status)) && (in_array('masa_tenggang', $request->status))){
                        $data->where('tanggal_berakhir','>=',date("Y-m-d"))
                        ;                        
                    }
                    else if ((in_array('aktif', $request->status)) && (in_array('kadaluarsa', $request->status))){                                                    
                        $data->whereRaw('tanggal_berakhir > NOW() AND DATE_ADD(NOW(), INTERVAL 180 DAY) < tanggal_berakhir');  
                        $data->orWhereRaw('tanggal_berakhir < NOW() AND (mou.deleted_at is NULL OR mou.deleted_at = "" OR mou.deleted_at = NULL) AND mou.created_at BETWEEN "'.$dari_tanggal.'" AND "'.$sampai_tanggal.'" AND mou.users_id IN ('.$request->dibuat_oleh.')');         
                    }
                    else if ((in_array('masa_tenggang', $request->status)) && (in_array('kadaluarsa', $request->status))){                        
                        $data->where('tanggal_berakhir', '<=', date("Y-m-d"));                                          
                        $data->orWhereRaw('tanggal_berakhir > NOW() AND DATE_ADD(NOW(), INTERVAL 364 DAY) > tanggal_berakhir AND (mou.deleted_at is NULL OR mou.deleted_at = "" OR mou.deleted_at = NULL) AND mou.created_at BETWEEN "'.$dari_tanggal.'" AND "'.$sampai_tanggal.'" AND mou.users_id IN ('.$request->dibuat_oleh.')');
                    }
                    else if(in_array('kadaluarsa', $request->status)){
                        $data->where('tanggal_berakhir', '<', date("Y-m-d"));
                    } 
                    else if(in_array('masa_tenggang', $request->status)){
                        $data->where('tanggal_berakhir','=',date("Y-m-d"));
                        $data->orWhereRaw('tanggal_berakhir > NOW() AND DATE_ADD(NOW(), INTERVAL 364 DAY) > tanggal_berakhir AND (mou.deleted_at is NULL OR mou.deleted_at = "" OR mou.deleted_at = NULL) AND mou.created_at BETWEEN "'.$dari_tanggal.'" AND "'.$sampai_tanggal.'" AND mou.users_id IN ('.$request->dibuat_oleh.')');
                    } 
                    else if(in_array('aktif', $request->status)){
                        $data->whereRaw('tanggal_berakhir > NOW() AND DATE_ADD(NOW(), INTERVAL 364 DAY) < tanggal_berakhir');
                    } 
                                       
                return DataTables::of($data)
                    ->addIndexColumn()
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
                    ->addColumn('provinsi', function ($data) {
                        if(is_numeric($data->provinsi_id) == 1){
                            return $data->provinsi_nama;
                        }
                        else{
                            return $data->provinsi_id;
                        }
                     })       
                    ->addColumn('kota', function ($data) {
                        if(is_numeric($data->kota_id) == 1){
                            return $data->kota_nama;
                        }
                        else{
                            return $data->kota_id;
                        }
                    })      
                    ->addColumn('kecamatan', function ($data) {
                        if(is_numeric($data->kecamatan_id) == 1){
                            return $data->kecamatan_nama;
                        }
                        else{
                            return $data->kecamatan_id;
                        }
                    })      
                    ->addColumn('kelurahan', function ($data) {
                        if(is_numeric($data->kelurahan_id) == 1){
                            return $data->kelurahan_nama;
                        }
                        else{
                            return $data->kelurahan_id;
                        }
                    })      
                    ->rawColumns(['status'])
                    ->make(true);
            }
            else if($request->jenis_dokumen == 'moa'){
                $data = DB::table('moa')
                    ->leftJoin('pengusul', 'moa.pengusul_id', '=', 'pengusul.id')                            
                    ->leftJoin('mou', 'moa.mou_id', '=', 'mou.id')                            
                    ->leftJoin('users', 'moa.users_id', '=', 'users.id')                            
                    ->leftJoin('negara', 'pengusul.negara_id', '=', 'negara.id')                            
                    ->leftJoin('provinsi', 'pengusul.provinsi_id', '=', 'provinsi.id')                            
                    ->leftJoin('kota', 'pengusul.kota_id', '=', 'kota.id')                            
                    ->leftJoin('kecamatan', 'pengusul.kecamatan_id', '=', 'kecamatan.id')                            
                    ->leftJoin('kelurahan', 'pengusul.kelurahan_id', '=', 'kelurahan.id')                            
                    ->select(DB::raw('DATE_FORMAT(moa.created_at, "%d-%m-%Y") as tanggal_pembuatan'), DB::raw('DATE_FORMAT(moa.created_at, "%H:%i") as waktu_pembuatan'), 'users.nama as penginput', 'moa.pejabat_penandatangan as pejabat_penandatangan', 'pengusul.nama as pengusul', 'moa.nik_nip_pengusul as nik_nip_pengusul', 'moa.jabatan_pengusul as jabatan_pengusul', 'moa.latitude as latitude', 'moa.longitude as longitude', 'pengusul.region as region', 'negara.nama as negara', 'pengusul.provinsi_id as provinsi_id', 'provinsi.nama as provinsi_nama', 'pengusul.kota_id as kota_id', 'kota.nama as kota_nama', 'pengusul.kecamatan_id as kecamatan_id', 'kecamatan.nama as kecamatan_nama', 'pengusul.kelurahan_id as kelurahan_id', 'kelurahan.nama as kelurahan_nama', 'pengusul.alamat as alamat', 'pengusul.telepon as telepon', 'moa.nomor_moa as nomor_moa', 'moa.nomor_moa_pengusul as nomor_moa_pengusul', 'mou.nomor_mou as nomor_mou', 'mou.nomor_mou_pengusul as nomor_mou_pengusul', 'moa.program as program', DB::raw('DATE_FORMAT(moa.tanggal_mulai, "%d-%m-%Y") as tanggal_mulai'), DB::raw('DATE_FORMAT(moa.tanggal_berakhir, "%d-%m-%Y") as tanggal_berakhir'), 'moa.dokumen as nama_file', 'moa.metode_pertemuan as metode_pertemuan', DB::raw('DATE_FORMAT(moa.tanggal_pertemuan, "%d-%m-%Y") as tanggal_pertemuan'), DB::raw('DATE_FORMAT(moa.waktu_pertemuan, "%H:%i") as waktu_pertemuan'))
                    ->whereNull('moa.deleted_at') //skip deleted_at                    
                    ->whereBetween('moa.created_at', [$dari_tanggal, $sampai_tanggal])
                    ->whereRaw('moa.users_id IN ('.$request->dibuat_oleh.')')                    
                    ->orderBy('moa.created_at', 'asc');                    
                    
                    if ((in_array('aktif', $request->status)) && (in_array('masa_tenggang', $request->status)) && (in_array('kadaluarsa', $request->status))){
                        
                    }
                    else if ((in_array('aktif', $request->status)) && (in_array('masa_tenggang', $request->status))){
                        $data->where('moa.tanggal_berakhir','>=',date("Y-m-d"));                        
                    }
                    else if ((in_array('aktif', $request->status)) && (in_array('kadaluarsa', $request->status))){                        
                        $data->whereRaw('moa.tanggal_berakhir > NOW() AND DATE_ADD(NOW(), INTERVAL 180 DAY) < moa.tanggal_berakhir');  // aktif
                        $data->orWhereRaw('moa.tanggal_berakhir < NOW() AND (moa.deleted_at is NULL OR moa.deleted_at = "" OR moa.deleted_at = NULL) AND moa.created_at BETWEEN "'.$dari_tanggal.'" AND "'.$sampai_tanggal.'" AND moa.users_id IN ('.$request->dibuat_oleh.')'); // kadaluarsa         
                    }
                    else if ((in_array('masa_tenggang', $request->status)) && (in_array('kadaluarsa', $request->status))){                        
                        $data->where('moa.tanggal_berakhir', '<=', date("Y-m-d")); // kadaluarsa                                       
                        $data->orWhereRaw('moa.tanggal_berakhir > NOW() AND DATE_ADD(NOW(), INTERVAL 180 DAY) > moa.tanggal_berakhir AND (moa.deleted_at is NULL OR moa.deleted_at = "" OR moa.deleted_at = NULL) AND moa.created_at BETWEEN "'.$dari_tanggal.'" AND "'.$sampai_tanggal.'" AND moa.users_id IN ('.$request->dibuat_oleh.')'); // masa tenggang
                    }
                    else if(in_array('kadaluarsa', $request->status)){
                        $data->where('moa.tanggal_berakhir', '<', date("Y-m-d")); //kadaluarsa
                    } 
                    else if(in_array('masa_tenggang', $request->status)){
                        $data->whereRaw('moa.tanggal_berakhir = '.date("Y-m-d"));
                        $data->orWhereRaw('moa.tanggal_berakhir > NOW() AND DATE_ADD(NOW(), INTERVAL 180 DAY) > moa.tanggal_berakhir AND (moa.deleted_at is NULL OR moa.deleted_at = "" OR moa.deleted_at = NULL) AND moa.created_at BETWEEN "'.$dari_tanggal.'" AND "'.$sampai_tanggal.'" AND moa.users_id IN ('.$request->dibuat_oleh.')'); 
                    } 
                    else if(in_array('aktif', $request->status)){
                        $data->whereRaw('moa.tanggal_berakhir > NOW() AND DATE_ADD(NOW(), INTERVAL 180 DAY) < moa.tanggal_berakhir');  
                    } 

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function ($data) {
                        $datetime1 = date_create($data->tanggal_berakhir);
                        $datetime2 = date_create(date("Y-m-d"));            
                        $interval = date_diff($datetime1, $datetime2);        
                        $jumlah_tahun =  $interval->format('%y');     
                        $jumlah_bulan =  $interval->format('%m');     
                        if($datetime1<$datetime2){
                            return '<span class="badge badge-danger">'.__('components/span.kadaluarsa').'</span>';                            
                        } else{
                            if($jumlah_tahun < 1){
                                if($jumlah_bulan < 6){
                                    return '<span class="badge badge-warning">'.__('components/span.masa_tenggang').'</span>';                            
                                }
                                else{
                                    return '<span class="badge badge-success">'.__('components/span.aktif').'</span>';                            
                                }
                            } else{
                                return '<span class="badge badge-success">'.__('components/span.aktif').'</span>';                            
                            }
                        }                 
                    }) 
                    ->addColumn('provinsi', function ($data) {
                        if(is_numeric($data->provinsi_id) == 1){
                            return $data->provinsi_nama;
                        }
                        else{
                            return $data->provinsi_id;
                        }
                     })       
                    ->addColumn('kota', function ($data) {
                        if(is_numeric($data->kota_id) == 1){
                            return $data->kota_nama;
                        }
                        else{
                            return $data->kota_id;
                        }
                    })      
                    ->addColumn('kecamatan', function ($data) {
                        if(is_numeric($data->kecamatan_id) == 1){
                            return $data->kecamatan_nama;
                        }
                        else{
                            return $data->kecamatan_id;
                        }
                    })      
                    ->addColumn('kelurahan', function ($data) {
                        if(is_numeric($data->kelurahan_id) == 1){
                            return $data->kelurahan_nama;
                        }
                        else{
                            return $data->kelurahan_id;
                        }
                    })      
                    ->rawColumns(['status'])
                    ->make(true);
                // return response()->json($data);                        
            }

            else if($request->jenis_dokumen == 'ia'){
                $data = DB::table('ia')
                    ->leftJoin('pengusul', 'ia.pengusul_id', '=', 'pengusul.id')      
                    ->leftJoin('moa', 'ia.moa_id', '=', 'moa.id')                            
                    ->leftJoin('mou', 'moa.mou_id', '=', 'mou.id')                            
                    ->leftJoin('users', 'ia.users_id', '=', 'users.id')                            
                    ->leftJoin('negara', 'pengusul.negara_id', '=', 'negara.id')                            
                    ->leftJoin('provinsi', 'pengusul.provinsi_id', '=', 'provinsi.id')                            
                    ->leftJoin('kota', 'pengusul.kota_id', '=', 'kota.id')                            
                    ->leftJoin('kecamatan', 'pengusul.kecamatan_id', '=', 'kecamatan.id')                            
                    ->leftJoin('kelurahan', 'pengusul.kelurahan_id', '=', 'kelurahan.id')                            
                    ->leftJoin('jenis_kerjasama', 'ia.id', '=', 'jenis_kerjasama.ia_id')                            
                    // ->leftJoin('anggota_fakultas', 'ia.id', '=', 'anggota_fakultas.ia_id')                            
                    // ->leftJoin('fakultas', 'anggota_fakultas.fakultas_id', '=', 'fakultas.id')                            
                    ->select(DB::raw('DATE_FORMAT(ia.created_at, "%d-%m-%Y") as tanggal_pembuatan'), DB::raw('DATE_FORMAT(ia.created_at, "%H:%i") as waktu_pembuatan'), 'users.nama as penginput', 'pengusul.nama as pengusul', 'ia.pejabat_penandatangan as pejabat_penandatangan', 'ia.nik_nip_pengusul as nik_nip_pengusul', 'ia.jabatan_pengusul as jabatan_pengusul', 'ia.latitude as latitude', 'ia.longitude as longitude', 'pengusul.region as region', 'negara.nama as negara', 'pengusul.provinsi_id as provinsi_id', 'provinsi.nama as provinsi_nama', 'pengusul.kota_id as kota_id', 'kota.nama as kota_nama', 'pengusul.kecamatan_id as kecamatan_id', 'kecamatan.nama as kecamatan_nama', 'pengusul.kelurahan_id as kelurahan_id', 'kelurahan.nama as kelurahan_nama', 'pengusul.alamat as alamat', 'pengusul.telepon as telepon', 'ia.nomor_ia as nomor_ia', 'ia.nomor_ia_pengusul as nomor_ia_pengusul', 'moa.nomor_moa as nomor_moa', 'moa.nomor_moa_pengusul as nomor_moa_pengusul', 'mou.nomor_mou as nomor_mou', 'mou.nomor_mou_pengusul as nomor_mou_pengusul', 'ia.manfaat as manfaat', DB::raw('GROUP_CONCAT(jenis_kerjasama.jenis_kerjasama) as jenis_kerjasama'), 'ia.program as program', DB::raw('DATE_FORMAT(ia.tanggal_mulai, "%d-%m-%Y") as tanggal_mulai'), DB::raw('DATE_FORMAT(ia.tanggal_berakhir, "%d-%m-%Y") as tanggal_berakhir'), 'ia.dokumen as nama_file', 'ia.laporan_hasil_pelaksanaan as laporan_hasil_pelaksanaan' ,'ia.metode_pertemuan as metode_pertemuan', DB::raw('DATE_FORMAT(ia.tanggal_pertemuan, "%d-%m-%Y") as tanggal_pertemuan'), DB::raw('DATE_FORMAT(ia.waktu_pertemuan, "%H:%i") as waktu_pertemuan'))
                    ->groupBy('ia.id') // Untuk menjalankan group_concat
                    ->whereNull('ia.deleted_at') //skip deleted_at                    
                    ->whereNull('jenis_kerjasama.deleted_at') //skip deleted_at                    
                    ->whereBetween('ia.created_at', [$dari_tanggal, $sampai_tanggal])
                    ->whereRaw('ia.users_id IN ('.$request->dibuat_oleh.')')                    
                    ->orderBy('ia.created_at', 'asc');                    
                    
                    if ((in_array('aktif', $request->status)) && (in_array('melewati_batas', $request->status)) && (in_array('selesai', $request->status))){
                        
                    }     
                    else if ((in_array('aktif', $request->status)) && (in_array('melewati_batas', $request->status))){
                        $data->where('ia.tanggal_berakhir', '>=', date("Y-m-d"));                            
                        $data->whereRaw('(laporan_hasil_pelaksanaan = "" OR laporan_hasil_pelaksanaan is NULL)'); // aktif
                        $data->orWhereRaw('ia.tanggal_berakhir < NOW() AND (laporan_hasil_pelaksanaan = "" OR laporan_hasil_pelaksanaan is NULL) AND (ia.deleted_at is NULL OR ia.deleted_at = "" OR ia.deleted_at = NULL) AND (jenis_kerjasama.deleted_at is NULL OR jenis_kerjasama.deleted_at = "" OR jenis_kerjasama.deleted_at = NULL) AND ia.created_at BETWEEN "'.$dari_tanggal.'" AND "'.$sampai_tanggal.'" AND ia.users_id IN ('.$request->dibuat_oleh.')'); // melewati batas
                    }      
                    else if ((in_array('aktif', $request->status)) && (in_array('selesai', $request->status))){
                        $data->where('ia.tanggal_berakhir', '>=', date("Y-m-d"));                            
                        $data->orWhereRaw('(laporan_hasil_pelaksanaan != "" OR laporan_hasil_pelaksanaan != NULL) AND ia.users_id IN ('.$request->dibuat_oleh.') AND (ia.deleted_at is NULL OR ia.deleted_at = "" OR ia.deleted_at = NULL) AND (jenis_kerjasama.deleted_at is NULL OR jenis_kerjasama.deleted_at = "" OR jenis_kerjasama.deleted_at = NULL) AND ia.created_at BETWEEN "'.$dari_tanggal.'" AND "'.$sampai_tanggal.'" AND ia.users_id IN ('.$request->dibuat_oleh.')'); 
                    } 

                    else if ((in_array('melewati_batas', $request->status)) && (in_array('selesai', $request->status))){
                        $data->whereRaw('ia.tanggal_berakhir < NOW() AND (laporan_hasil_pelaksanaan = "" OR laporan_hasil_pelaksanaan is NULL)');   
                        $data->orWhereRaw('(laporan_hasil_pelaksanaan != "" OR laporan_hasil_pelaksanaan != NULL) AND ia.users_id IN ('.$request->dibuat_oleh.') AND (ia.deleted_at is NULL OR ia.deleted_at = "" OR ia.deleted_at = NULL) AND (jenis_kerjasama.deleted_at is NULL OR jenis_kerjasama.deleted_at = "" OR jenis_kerjasama.deleted_at = NULL) AND ia.created_at BETWEEN "'.$dari_tanggal.'" AND "'.$sampai_tanggal.'" AND ia.users_id IN ('.$request->dibuat_oleh.')');                                                                                
                    }
                    else if(in_array('selesai', $request->status)){
                        $data->whereRaw('(laporan_hasil_pelaksanaan != "" OR laporan_hasil_pelaksanaan != NULL)');                                                                                
                    }
                    else if(in_array('melewati_batas', $request->status)){
                        $data->whereRaw('ia.tanggal_berakhir < NOW() AND (laporan_hasil_pelaksanaan = "" OR laporan_hasil_pelaksanaan is NULL)'); 
                    }
                    else if(in_array('aktif', $request->status)){
                        $data->where('ia.tanggal_berakhir', '>=', date("Y-m-d"));                            
                        $data->whereRaw('(laporan_hasil_pelaksanaan = "" OR laporan_hasil_pelaksanaan is NULL)');                         
                    } 

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function ($data) {
                        $datetime1 = date_create($data->tanggal_berakhir);
                        $datetime2 = date_create(date("Y-m-d"));            
                        $interval = date_diff($datetime1, $datetime2);        
                        $jumlah_tahun =  $interval->format('%y');     
                        $jumlah_bulan =  $interval->format('%m');     
                        if(($datetime1<$datetime2) && (($data->laporan_hasil_pelaksanaan == '') || ($data->laporan_hasil_pelaksanaan == NULL))){
                            return '<span class="badge badge-danger">'.__('components/span.melewati_batas').'</span>';                            
                        } else{
                            if(($data->laporan_hasil_pelaksanaan == '') || ($data->laporan_hasil_pelaksanaan == NULL)){
                                return '<span class="badge badge-success">'.__('components/span.aktif').'</span>';                              
                            } 
                            else{
                                return '<span class="badge badge-primary">'.__('components/span.selesai').'</span>';                            
                            }
                        }        
                    })

                    ->addColumn('provinsi', function ($data) {
                        if(is_numeric($data->provinsi_id) == 1){
                            return $data->provinsi_nama;
                        }
                        else{
                            return $data->provinsi_id;
                        }
                     })       
                    ->addColumn('kota', function ($data) {
                        if(is_numeric($data->kota_id) == 1){
                            return $data->kota_nama;
                        }
                        else{
                            return $data->kota_id;
                        }
                    })      
                    ->addColumn('kecamatan', function ($data) {
                        if(is_numeric($data->kecamatan_id) == 1){
                            return $data->kecamatan_nama;
                        }
                        else{
                            return $data->kecamatan_id;
                        }
                    })      
                    ->addColumn('kelurahan', function ($data) {
                        if(is_numeric($data->kelurahan_id) == 1){
                            return $data->kelurahan_nama;
                        }
                        else{
                            return $data->kelurahan_id;
                        }
                    })      
                    // ->addColumn('fakultas', function ($data) {                       
                    //         return $data->fakultas_anggota;                        
                    // })      
                   
                    ->rawColumns(['status'])
                    ->make(true);
                return response()->json($data);                        
                
            }
        }        
    }

    // public function downloadZip()
    // {

    //     $zip = new ZipArchive;

   

    //     $fileName = 'myNewFile.zip';

   

    //     if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)

    //     {

    //         $files = File::files(public_path('myFiles'));

   

    //         foreach ($files as $key => $value) {

    //             $relativeNameInZipFile = basename($value);

    //             $zip->addFile($value, $relativeNameInZipFile);

    //         }

             

    //         $zip->close();

    //     }

    

    //     return response()->download(public_path($fileName));

    // }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }   
}