<?php

namespace App\Http\Controllers;

use App\Models\Ia;
use App\Http\Requests\StoreIaRequest;
use App\Http\Requests\UpdateIaRequest;

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
        return view('pages/ia/create');                
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIaRequest $request)
    {
        //
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