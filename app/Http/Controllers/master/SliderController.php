<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Slider::orderBy('id', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('foto', function ($row) {
                    return '<img src=' . asset('storage/upload/slider/' . $row->foto) . ' class="img-responsive" width="250px"></img>';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button id="btn-edit" onclick="edit(' . $row->id . ')" class="btn btn-warning btn-sm mr-1" value="' . $row->id . '" >' . __('components/button.update') . '</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'foto'])
                ->make(true);
        }
        return view('pages.master.slider');
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
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return response()->json([
            'id' => $slider->id,
            'namaFoto' => $slider->foto,
            'foto' => asset('storage/upload/slider/' . $slider->foto)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'foto' => $request->foto ? 'required|mimes:png|max:1280' : 'nullable',
            ],
            [
                'foto.required' => __('components/validation.required', ['nama' => __('pages/master/slider.foto')]),
                'foto.max' => __('components/validation.max', ['nama' => __('pages/master/slider.foto'), 'ukuran' => '1 MB']),
                'foto.mimes' => __('components/validation.mimes', ['nama' => __('pages/master/slider.foto')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        if ($request->foto) {
            Storage::delete('/upload/slider/' . $slider->foto);
            $namaFoto = rand(1, 99999999999999) . '.' . $request->foto->getClientOriginalExtension();
            $request->file('foto')->storeAs(
                '/upload/slider/',
                $namaFoto
            );
        }


        $slider->foto = $request->foto ? $namaFoto : $slider->foto;
        $slider->save();

        return response()->json(['success' => 'Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
    }
}
