<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Kota::where('provinsi_id', $request->provinsi)->orderBy('nama', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="row"><a href="' . url('kecamatan/' . $row->id) . '" class="btn btn-primary btn-sm mr-1">' .  __('components/button.view') . '</a><button id="btn-edit" onclick="edit(' . $row->id . ')" class="btn btn-warning btn-sm mr-1" value="' . $row->id . '" >' . __('components/button.update') . '</button><button id="btn-delete" onclick="hapus(' . $row->id . ')" class="btn btn-danger btn-sm mr-1" value="' . $row->id . '" >' . __('components/button.delete') . '</button></div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $provinsi = $request->provinsi;
        return view('pages.master.kota', compact('provinsi'));
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
                'nama' => ['required', Rule::unique('kota')->withoutTrashed()],
            ],
            [
                'nama.required' => __('components/validation.required', ['nama' => __('pages/master/kota.title')]),
                'nama.unique' => __('components/validation.unique', ['nama' => __('pages/master/kota.title')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $kota = new Kota();
        $kota->nama = $request->nama;
        $kota->provinsi_id = $request->provinsi_id;
        $kota->save();

        return response()->json(['success' => 'Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function show(Kota $kota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $kota = Kota::where('id', $request->id)->first();
        return response()->json(
            $kota
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => ['required', Rule::unique('kota')->ignore($request->id)->withoutTrashed()],
            ],
            [
                'nama.required' => __('components/validation.required', ['nama' => __('pages/master/kota.title')]),
                'nama.unique' => __('components/validation.unique', ['nama' => __('pages/master/kota.title')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $kota = Kota::where('id', $request->id)->first();
        $kota->nama = $request->nama;
        $kota->save();

        return response()->json(['success' => 'Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $kota = Kota::where('id', $request->kota)->first();
        $kota->delete();

        return response()->json(
            [
                'res' => 'success',
            ]
        );
    }
}
