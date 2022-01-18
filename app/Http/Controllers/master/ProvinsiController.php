<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Provinsi::where('negara_id', $request->negara)->orderBy('nama', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="row"><a href="' . url('kota/' . $row->id) . '" class="btn btn-primary btn-sm mr-1">' .  __('components/button.view') . '</a><button id="btn-edit" onclick="edit(' . $row->id . ')" class="btn btn-warning btn-sm mr-1" value="' . $row->id . '" >' . __('components/button.update') . '</button><button id="btn-delete" onclick="hapus(' . $row->id . ')" class="btn btn-danger btn-sm mr-1" value="' . $row->id . '" >' . __('components/button.delete') . '</button></div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $negara = $request->negara;
        return view('pages.master.provinsi', compact('negara'));
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
                'nama' => ['required', Rule::unique('provinsi')->withoutTrashed()],
            ],
            [
                'nama.required' => __('components/validation.required', ['nama' => __('pages/master/provinsi.title')]),
                'nama.unique' => __('components/validation.unique', ['nama' => __('pages/master/provinsi.title')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $provinsi = new Provinsi();
        $provinsi->nama = $request->nama;
        $provinsi->negara_id = $request->negara_id;
        $provinsi->save();

        return response()->json(['success' => 'Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show(Provinsi $provinsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $provinsi = Provinsi::where('id', $request->id)->first();
        return response()->json(
            $provinsi
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => ['required', Rule::unique('provinsi')->ignore($request->id)->withoutTrashed()],
            ],
            [
                'nama.required' => __('components/validation.required', ['nama' => __('pages/master/provinsi.title')]),
                'nama.unique' => __('components/validation.unique', ['nama' => __('pages/master/provinsi.title')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $provinsi = Provinsi::where('id', $request->id)->first();
        $provinsi->nama = $request->nama;
        $provinsi->save();

        return response()->json(['success' => 'Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $provinsi = Provinsi::where('id', $request->provinsi)->first();
        $provinsi->delete();

        return response()->json(
            [
                'res' => 'success',
            ]
        );
    }
}
