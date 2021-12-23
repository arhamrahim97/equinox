<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

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
}
