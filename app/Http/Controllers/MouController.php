<?php

namespace App\Http\Controllers;

use App\Models\Mou;
use App\Models\Pengusul;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMouRequest;
use App\Http\Requests\UpdateMouRequest;

class MouController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/mou/index');
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
        return view('pages/mou/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMouRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function show(Mou $mou)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function edit(Mou $mou)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMouRequest  $request
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMouRequest $request, Mou $mou)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mou $mou)
    {
        //
    }
}