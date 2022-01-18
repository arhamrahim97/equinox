<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Kecamatan::where('kota_id', $request->kota)->orderBy('nama', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="row"><a href="' . url('kelurahan/' . $row->id) . '" class="btn btn-primary btn-sm mr-1">' .  __('components/button.view') . '</a><button id="btn-edit" onclick="edit(' . $row->id . ')" class="btn btn-warning btn-sm mr-1" value="' . $row->id . '" >' . __('components/button.update') . '</button><button id="btn-delete" onclick="hapus(' . $row->id . ')" class="btn btn-danger btn-sm mr-1" value="' . $row->id . '" >' . __('components/button.delete') . '</button></div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $kota = $request->kota;
        return view('pages.master.kecamatan', compact('kota'));
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
                'nama' => ['required', Rule::unique('kecamatan')->withoutTrashed()],
            ],
            [
                'nama.required' => __('components/validation.required', ['nama' => __('pages/master/kecamatan.title')]),
                'nama.unique' => __('components/validation.unique', ['nama' => __('pages/master/kecamatan.title')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $kecamatan = new Kecamatan();
        $kecamatan->nama = $request->nama;
        $kecamatan->kota_id = $request->kota_id;
        $kecamatan->save();

        return response()->json(['success' => 'Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $kecamatan = Kecamatan::where('id', $request->id)->first();
        return response()->json(
            $kecamatan
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => ['required', Rule::unique('kecamatan')->ignore($request->id)->withoutTrashed()],
            ],
            [
                'nama.required' => __('components/validation.required', ['nama' => __('pages/master/kecamatan.title')]),
                'nama.unique' => __('components/validation.unique', ['nama' => __('pages/master/kecamatan.title')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $kecamatan = Kecamatan::where('id', $request->id)->first();
        $kecamatan->nama = $request->nama;
        $kecamatan->save();

        return response()->json(['success' => 'Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $kecamatan = Kecamatan::where('id', $request->kecamatan)->first();
        $kecamatan->delete();

        return response()->json(
            [
                'res' => 'success',
            ]
        );
    }
}
