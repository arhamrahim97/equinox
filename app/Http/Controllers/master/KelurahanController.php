<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Kelurahan::where('kecamatan_id', $request->kecamatan)->orderBy('nama', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="row"><button id="btn-edit" onclick="edit(' . $row->id . ')" class="btn btn-warning btn-sm mr-1" value="' . $row->id . '" >' . __('components/button.update') . '</button><button id="btn-delete" onclick="hapus(' . $row->id . ')" class="btn btn-danger btn-sm mr-1" value="' . $row->id . '" >' . __('components/button.delete') . '</button></div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $kecamatan = $request->kecamatan;
        return view('pages.master.kelurahan', compact('kecamatan'));
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
                'nama' => ['required', Rule::unique('kelurahan')->withoutTrashed()],
            ],
            [
                'nama.required' => __('components/validation.required', ['nama' => __('pages/master/kelurahan.title')]),
                'nama.unique' => __('components/validation.unique', ['nama' => __('pages/master/kelurahan.title')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $kelurahan = new Kelurahan();
        $kelurahan->nama = $request->nama;
        $kelurahan->kecamatan_id = $request->kecamatan_id;
        $kelurahan->save();

        return response()->json(['success' => 'Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function show(Kelurahan $kelurahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $kelurahan = Kelurahan::where('id', $request->id)->first();
        return response()->json(
            $kelurahan
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => ['required', Rule::unique('kelurahan')->ignore($request->id)->withoutTrashed()],
            ],
            [
                'nama.required' => __('components/validation.required', ['nama' => __('pages/master/kelurahan.title')]),
                'nama.unique' => __('components/validation.unique', ['nama' => __('pages/master/kelurahan.title')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $kelurahan = Kelurahan::where('id', $request->id)->first();
        $kelurahan->nama = $request->nama;
        $kelurahan->save();

        return response()->json(['success' => 'Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $kelurahan = Kelurahan::where('id', $request->kelurahan)->first();
        $kelurahan->delete();

        return response()->json(
            [
                'res' => 'success',
            ]
        );
    }
}
