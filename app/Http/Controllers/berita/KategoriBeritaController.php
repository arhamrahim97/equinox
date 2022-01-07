<?php

namespace App\Http\Controllers\berita;

use App\Http\Controllers\Controller;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = KategoriBerita::orderBy('nama', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="row"><button id="btn-edit" onclick="edit(' . $row->id . ')" class="btn btn-warning btn-sm mr-1" value="' . $row->id . '" >' . __('components/button.update') . '</button><button id="btn-delete" onclick="hapus(' . $row->id . ')" class="btn btn-danger btn-sm mr-1" value="' . $row->id . '" >' . __('components/button.delete') . '</button></div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.berita.kategoriBerita');
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
                'nama' => ['required', Rule::unique('kategori_berita')->withoutTrashed()]
            ],
            [
                'nama.required' => __('components/validation.required', ['nama' => __('pages/master/negara.title')]),
                'nama.unique' => __('components/validation.unique', ['nama' => __('pages/master/negara.title')])
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $kategoriBerita = new KategoriBerita();
        $kategoriBerita->nama = $request->nama;
        $kategoriBerita->save();

        return response()->json(['success' => 'Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriBerita  $kategoriBerita
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriBerita $kategoriBerita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriBerita  $kategoriBerita
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriBerita $kategoriBerita)
    {
        return response()->json(
            $kategoriBerita
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriBerita  $kategoriBerita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriBerita $kategoriBerita)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => ['required', Rule::unique('kategori_berita')->ignore($request->id)->withoutTrashed()]
            ],
            [
                'nama.required' => __('components/validation.required', ['nama' => __('pages/berita/kategoriBerita.title')]),
                'nama.unique' => __('components/validation.unique', ['nama' => __('pages/berita/kategoriBerita.title')])
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $kategoriBerita->nama = $request->nama;
        $kategoriBerita->save();

        return response()->json(['success' => 'Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriBerita  $kategoriBerita
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriBerita $kategoriBerita)
    {
        $kategoriBerita->delete();

        return response()->json(
            [
                'res' => 'success',
            ]
        );
    }
}
