<?php

namespace App\Http\Controllers\berita;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class KelolaBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $daftarKategoriBerita = KategoriBerita::orderBy('nama', 'asc')->get();
        $data = Berita::with(['kategoriBerita',])->orderBy('id', 'desc')->get();
        if ($request->ajax()) {
            $data = Berita::with(['kategoriBerita',])->orderBy('id', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('kategoriBerita', function (Berita $berita) {
                    return $berita->kategoriBerita->nama;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="row"><a href="' . url('/kelolaBerita/' . $row->id . '/edit') . '" id="btn-edit" class="btn btn-warning btn-sm mr-1">' . __('components/button.update') . '</a><button id="btn-delete" onclick="hapus(' . $row->id . ')" class="btn btn-danger btn-sm mr-1" value="' . $row->id . '" >' . __('components/button.delete') . '</button></div>';
                    return $actionBtn;
                })
                ->filter(function ($berita) use ($request) {
                    if ($request->kategori) {
                        $berita->whereHas('kategoriBerita', function ($kategori) use ($request) {
                            $kategori->where('id', $request->kategori);
                        });
                    }

                    if ($request->bahasa) {
                        $berita->where('bahasa', $request->bahasa);
                    }

                    if ($request->search) {
                        $berita->where('judul', 'LIKE', '%' . $request->search . '%');
                    }
                })
                ->rawColumns(['action', 'kategoriBerita'])
                ->make(true);
        }

        return view('pages.berita.kelolaBerita.index', compact(['daftarKategoriBerita']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daftarKategoriBerita = KategoriBerita::orderBy('nama', 'asc')->get();
        return view('pages.berita.kelolaBerita.create', compact('daftarKategoriBerita'));
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
                'judul' => 'required||max:200',
                'konten' => 'required',
                'kategori' => 'required',
                'bahasa' => 'required',
                'deskripsi' => 'required|max:200',
                'fotoSampul' => 'required|mimes:jpeg,bmp,png|max:5120',
                // 'fotoSampul' => 'required|images|max:5120',
            ],
            [
                'judul.required' => __('components/validation.required', ['nama' => __('pages/berita/kelolaBerita.judul')]),
                'judul.max' => __('components/validation.max', ['nama' => __('pages/berita/kelolaBerita.judul'), 'ukuran' => '200 Huruf']),
                'konten.required' => __('components/validation.required', ['nama' => __('pages/berita/kelolaBerita.konten')]),
                'kategori.required' => __('components/validation.required', ['nama' => __('pages/berita/kelolaBerita.kategori')]),
                'bahasa.required' => __('components/validation.required', ['nama' => __('pages/berita/kelolaBerita.bahasa')]),
                'deskripsi.required' => __('components/validation.required', ['nama' => __('pages/berita/kelolaBerita.deskripsi')]),
                'deskripsi.max' => __('components/validation.max', ['nama' => __('pages/berita/kelolaBerita.deskripsi'), 'ukuran' => '200 Huruf']),
                'fotoSampul.required' => __('components/validation.required', ['nama' => __('pages/berita/kelolaBerita.fotoSampul')]),
                'fotoSampul.max' => __('components/validation.max', ['nama' => __('pages/berita/kelolaBerita.fotoSampul'), 'ukuran' => '5 MB']),
                'fotoSampul.mimes' => __('components/validation.mimes', ['nama' => __('pages/berita/kelolaBerita.fotoSampul')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $namaFotoSampul = rand(1, 99999999999999) . '.' . $request->fotoSampul->getClientOriginalExtension();
        $request->file('fotoSampul')->storeAs(
            'upload/sampul_berita',
            $namaFotoSampul
        );

        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->konten = $request->konten;
        $berita->kategori_berita_id = $request->kategori;
        $berita->deskripsi = $request->deskripsi;
        $berita->foto_sampul = $namaFotoSampul;
        $berita->bahasa = $request->bahasa;
        $berita->slug = Str::slug($request->judul . '-' . rand(1, 99999), '-');
        $berita->save();

        return response()->json(['success' => 'Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
        $daftarKategoriBerita = KategoriBerita::orderBy('nama', 'asc')->get();
        return view('pages.berita.kelolaBerita.edit', compact(['berita', 'daftarKategoriBerita']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $berita)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'judul' => 'required||max:200',
                'konten' => 'required',
                'kategori' => 'required',
                'bahasa' => 'required',
                'deskripsi' => 'required|max:200',
                'fotoSampul' => $request->fotoSampul ? 'required|mimes:jpeg,bmp,png|max:5120' : 'nullable',
                // 'fotoSampul' => 'required|images|max:5120',
            ],
            [
                'judul.required' => __('components/validation.required', ['nama' => __('pages/berita/kelolaBerita.judul')]),
                'judul.max' => __('components/validation.max', ['nama' => __('pages/berita/kelolaBerita.judul'), 'ukuran' => '200 Huruf']),
                'konten.required' => __('components/validation.required', ['nama' => __('pages/berita/kelolaBerita.konten')]),
                'kategori.required' => __('components/validation.required', ['nama' => __('pages/berita/kelolaBerita.kategori')]),
                'bahasa.required' => __('components/validation.required', ['nama' => __('pages/berita/kelolaBerita.bahasa')]),
                'deskripsi.required' => __('components/validation.required', ['nama' => __('pages/berita/kelolaBerita.deskripsi')]),
                'deskripsi.max' => __('components/validation.max', ['nama' => __('pages/berita/kelolaBerita.deskripsi'), 'ukuran' => '500 Huruf']),
                'fotoSampul.required' => __('components/validation.required', ['nama' => __('pages/berita/kelolaBerita.fotoSampul')]),
                'fotoSampul.max' => __('components/validation.max', ['nama' => __('pages/berita/kelolaBerita.fotoSampul'), 'ukuran' => '5 MB']),
                'fotoSampul.mimes' => __('components/validation.mimes', ['nama' => __('pages/berita/kelolaBerita.fotoSampul')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        if ($request->fotoSampul) {
            Storage::delete('upload/sampul_berita/' . $berita->foto_sampul);
            $namaFotoSampul = rand(1, 99999999999999) . '.' . $request->fotoSampul->getClientOriginalExtension();
            $request->file('fotoSampul')->storeAs(
                'upload/sampul_berita',
                $namaFotoSampul
            );
        }


        $berita->judul = $request->judul;
        $berita->konten = $request->konten;
        $berita->kategori_berita_id = $request->kategori;
        $berita->deskripsi = $request->deskripsi;
        $berita->foto_sampul = $request->fotoSampul ? $namaFotoSampul : $berita->foto_sampul;
        $berita->bahasa = $request->bahasa;
        $berita->slug = Str::slug($request->judul . '-' . rand(1, 99999), '-');
        $berita->save();

        return response()->json(['success' => 'Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        $berita->delete();
        return response()->json([
            'res' => 'success'
        ]);
    }
}
