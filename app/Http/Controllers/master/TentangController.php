<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TentangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Tentang::orderBy('id', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href=" ' . url('/kelolaTentang' . '/' . $row->id . '/edit')  . ' " class="btn btn-warning btn-sm mr-1" value="' . $row->id . '" >' . __('components/button.update') . '</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.master.tentang.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tentang  $tentang
     * @return \Illuminate\Http\Response
     */
    public function show(Tentang $tentang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tentang  $tentang
     * @return \Illuminate\Http\Response
     */
    public function edit(Tentang $tentang)
    {
        return view('pages.master.tentang.edit', compact(['tentang']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tentang  $tentang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tentang $tentang)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'konten' => 'required'
            ],
            [
                'konten.required' => __('components/validation.required', ['nama' => __('pages/master/tentang.konten')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $tentang->konten = $request->konten;
        $tentang->save();

        return response()->json(['success' => 'Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tentang  $tentang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tentang $tentang)
    {
        //
    }
}
