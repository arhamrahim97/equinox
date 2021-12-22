<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Prodi::where('fakultas_id', $request->fakultas)->orderBy('nama', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('statusUnitKerja', function ($row) {
                    $row->is_unit_kerja == 0 ? $statusUnitKerja = __('pages/master/prodi.tidak')  : $statusUnitKerja = __('pages/master/prodi.ya');
                    return $statusUnitKerja;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="row"><button id="btn-edit" onclick="edit(' . $row->id . ')" class="btn btn-warning btn-sm mr-1" value="' . $row->id . '" >' . __('components/button.update') . '</button><button id="btn-delete" onclick="hapus(' . $row->id . ')" class="btn btn-danger btn-sm mr-1" value="' . $row->id . '" >' . __('components/button.delete') . '</button></div>';
                    return $actionBtn;
                })
                ->rawColumns(['statusUnitKerja', 'action'])
                ->make(true);
        }

        $fakultas = $request->fakultas;
        return view('pages.master.prodi', compact('fakultas'));
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
                'nama' => 'required|unique:fakultas',
                'unitKerja' => 'required'
            ],
            [
                'nama.required' => __('components/validation.required', ['nama' => __('pages/master/prodi.title')]),
                'nama.unique' => __('components/validation.unique', ['nama' => __('pages/master/prodi.title')]),
                'unitKerja.required' => __('components/validation.required', ['nama' => __('pages/master/prodi.unitKerja')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $prodi = new Prodi();
        $prodi->nama = $request->nama;
        $prodi->is_unit_kerja = $request->unitKerja;
        $prodi->fakultas_id = $request->fakultas_id;
        $prodi->save();

        return response()->json(['success' => 'Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $prodi = Prodi::where('id', $request->id)->first();
        return response()->json(
            $prodi
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => ['required', Rule::unique('prodi')->ignore($request->id)],
                'unitKerja' => 'required'
            ],
            [
                'nama.required' => __('components/validation.required', ['nama' => __('pages/master/prodi.title')]),
                'nama.unique' => __('components/validation.unique', ['nama' => __('pages/master/prodi.title')]),
                'unitKerja.required' => __('components/validation.required', ['nama' => __('pages/master/unitKerja.title')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $prodi = Prodi::where('id', $request->id)->first();
        $prodi->nama = $request->nama;
        $prodi->is_unit_kerja = $request->unitKerja;
        $prodi->save();

        return response()->json(['success' => 'Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $prodi = Prodi::where('id', $request->prodi)->first();
        $prodi->delete();

        return response()->json(
            [
                'res' => 'success',
            ]
        );
    }
}
