<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Negara;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class NegaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Negara::orderBy('nama', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="row"><a href="' . url('provinsi/' . $row->id) . '" class="btn btn-primary btn-sm mr-1">' .  __('components/button.detail') . '</a><button id="btn-edit" onclick="edit(' . $row->id . ')" class="btn btn-warning btn-sm mr-1" value="' . $row->id . '" >' . __('components/button.update') . '</button><button id="btn-delete" onclick="hapus(' . $row->id . ')" class="btn btn-danger btn-sm mr-1" value="' . $row->id . '" >' . __('components/button.delete') . '</button></div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.master.negara');
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
                'nama' => 'required|unique:negara',
                'region' => 'required',
            ],
            [
                'nama.required' => __('components/validation.required', ['nama' => __('pages/master/negara.title')]),
                'nama.unique' => __('components/validation.unique', ['nama' => __('pages/master/negara.title')]),
                'region.required' => __('components/validation.required', ['nama' => __('pages/master/negara.region')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $negara = new Negara();
        $negara->nama = $request->nama;
        $negara->region = $request->region;
        $negara->save();

        return response()->json(['success' => 'Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Negara  $negara
     * @return \Illuminate\Http\Response
     */
    public function show(Negara $negara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Negara  $negara
     * @return \Illuminate\Http\Response
     */
    public function edit(Negara $negara)
    {
        return response()->json(
            $negara
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Negara  $negara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Negara $negara)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => ['required', Rule::unique('negara')->ignore($request->id)],
                'region' => 'required'
            ],
            [
                'nama.required' => __('components/validation.required', ['nama' => __('pages/master/negara.title')]),
                'nama.unique' => __('components/validation.unique', ['nama' => __('pages/master/negara.title')]),
                'region.required' => __('components/validation.required', ['nama' => __('pages/master/negara.region')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $negara->nama = $request->nama;
        $negara->region = $request->region;
        $negara->save();

        return response()->json(['success' => 'Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Negara  $negara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Negara $negara)
    {
        $negara->delete();

        return response()->json(
            [
                'res' => 'success',
            ]
        );
    }
}
