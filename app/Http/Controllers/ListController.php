<?php

namespace App\Http\Controllers;

use App\Models\Ia;
use App\Models\Prodi;
use App\Models\Fakultas;
use App\Models\AnggotaProdi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function listFakultas()
    {
        $dataFakultas = Fakultas::orderBy('nama', 'asc')->get();

        // $html = '<option hidden selected value="">' . __('components/list.placeholderFakultas') . '</option>';
        $html = '<option></option>';
        if ($dataFakultas) {
            foreach ($dataFakultas as $fakultas) {
                $html .= '<option value="' . $fakultas->id . '">' . $fakultas->nama . '</option>';
            }
        }
        return response()->json(
            [
                'res' => 'success',
                'html' => $html
            ]
        );
    }

    public function listProdi(Request $request)
    {
        $dataProdi = Prodi::where('fakultas_id', $request->idFakultas)->get();

        $request->role == 'Unit Kerja' ? $dataProdi = $dataProdi->where('is_unit_kerja', 1) : $dataProdi = $dataProdi;

        // $html = '<option hidden selected value="">' . __('components/list.placeholderProdi') . '</option>';
        $html = '<option></option>';
        if ($dataProdi) {
            foreach ($dataProdi as $prodi) {
                $html .= '<option value="' . $prodi->id . '">' . $prodi->nama . '</option>';
            }
        }
        return response()->json(
            [
                'res' => 'success',
                'html' => $html
            ]
        );
    }

    public function getProdi(Request $request){
        $prodi = Prodi::whereIn('fakultas_id', $request->idFakultas)->get();
        $html = '';
        foreach ($prodi as $row){
            $html .= '<option value="' . $row->id . '">' . $row->nama . '</option>';
        }
                    
        return response()->json(['res' => 'success',
        'html' => $html]);             
    }

    public function getProdiEdit(Request $request){
        // $prodi = Prodi::where('ia_id', $request->idIa)
        $ia_ = Ia::with(['anggotaProdi'])->where('id', $request->idIa)->first();

        $prodi_ia = [];
        foreach ($ia_->anggotaProdi as $value) {
            array_push($prodi_ia, $value['prodi_id']);
        }
        
        $prodi = Prodi::whereIn('fakultas_id', $request->idFakultas)->get();
        $html = '';
        foreach ($prodi as $item){

        if (in_array($item->id, $prodi_ia)){
            $html .= '<option value="'.$item->id.'" selected >'.$item->nama.'</option>';                                
        }
        else{
            $html .= '<option value="'.$item->id.'">'.$item->nama.'</option>';

        }    
        }

        // foreach ($prodi as $row){
        //     $html .= '<option value="' . $row->id . '">' . $row->nama . '</option>';
        // }
                    
        return response()->json(['res' => 'success',
        'html' => $html]);             
    }

}