<?php

namespace App\Http\Controllers;

use App\Models\Ia;
use App\Http\Requests\StoreIaRequest;
use App\Http\Requests\UpdateIaRequest;
use App\Models\Pengusul;
use Illuminate\Http\Request;



class IaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/ia/index');            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'pengusul' => Pengusul::with(['negara', 'provinsi', 'kota', 'kecamatan', 'kelurahan'])->get()            
        ];   
        return view('pages/ia/create', $data);                
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ia  $ia
     * @return \Illuminate\Http\Response
     */
    public function show(Ia $ia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ia  $ia
     * @return \Illuminate\Http\Response
     */
    public function edit(Ia $ia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIaRequest  $request
     * @param  \App\Models\Ia  $ia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIaRequest $request, Ia $ia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ia  $ia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ia $ia)
    {
        //
    }
}