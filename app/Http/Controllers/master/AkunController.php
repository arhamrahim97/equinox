<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Fakultas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with(['fakultas', 'prodi'])->orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('fakultas', function (User $user) {
                    $user->fakultas ?  $fakultas = $fakultas = $user->fakultas->nama : $fakultas = '-';
                    return $fakultas;
                })
                ->addColumn('prodi', function (User $user) {
                    $user->prodi ? $prodi = $prodi = $user->prodi->nama : $prodi = '-';
                    return $prodi;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="row"><a href="' . url('/akun/' . $row->id . '/edit') . '" id="btn-edit" class="btn btn-warning btn-sm mr-1">' . __('components/button.update') . '</a><button id="btn-delete" onclick="hapus(' . $row->id . ')" class="btn btn-danger btn-sm mr-1" value="' . $row->id . '" >' . __('components/button.delete') . '</button></div>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'fakultas', 'prodi'])
                ->make(true);
        }
        return view('pages.master.akun.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.master.akun.create');
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
                'nama' => 'required',
                'username' => 'required|unique:users',
                'password' => 'required',
                'role' => 'required',
                'fakultas' => $request->role == 'Admin' || $request->role == "LPPM" ? 'nullable' : 'required',
                'prodi' => $request->role == 'Prodi' || $request->role == "Unit Kerja" ? 'required' : 'nullable',
                'statusAktif' => 'required'
            ],
            [
                'nama.required' => __('components/validation.required', ['nama' => __('pages/master/akun.nama')]),
                'username.required' => __('components/validation.required', ['nama' => __('pages/master/akun.username')]),
                'username.unique' => __('components/validation.unique', ['nama' => __('pages/master/akun.username')]),
                'password.required' => __('components/validation.required', ['nama' => __('pages/master/akun.password')]),
                'role.required' => __('components/validation.required', ['nama' => __('pages/master/akun.role')]),
                'fakultas.required' => __('components/validation.required', ['nama' => __('pages/master/akun.fakultas')]),
                'prodi.required' => __('components/validation.required', ['nama' => __('pages/master/akun.prodi')]),
                'statusAktif.required' => __('components/validation.required', ['nama' => __('pages/master/akun.statusAktif')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        $user = new User();
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->status = $request->statusAktif;
        $user->fakultas_id = $request->role == 'Admin' || $request->role == "LPPM" ? null : $request->fakultas;
        $user->prodi_id = $request->role == 'Prodi' || $request->role == "Unit Kerja" ? $request->prodi : null;
        $user->save();

        return response()->json(['success' => 'Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.master.akun.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'username' => ['required', Rule::unique('users')->ignore($user->id)],
                'password' => 'nullable',
                'role' => 'required',
                'fakultas' => $request->role == 'Admin' || $request->role == "LPPM" ? 'nullable' : 'required',
                'prodi' => $request->role == 'Prodi' || $request->role == "Unit Kerja" ? 'required' : 'nullable',
                'statusAktif' => 'required'
            ],
            [
                'nama.required' => __('components/validation.required', ['nama' => __('pages/master/akun.nama')]),
                'username.required' => __('components/validation.required', ['nama' => __('pages/master/akun.username')]),
                'username.unique' => __('components/validation.unique', ['nama' => __('pages/master/akun.username')]),
                'role.required' => __('components/validation.required', ['nama' => __('pages/master/akun.role')]),
                'fakultas.required' => __('components/validation.required', ['nama' => __('pages/master/akun.fakultas')]),
                'prodi.required' => __('components/validation.required', ['nama' => __('pages/master/akun.prodi')]),
                'statusAktif.required' => __('components/validation.required', ['nama' => __('pages/master/akun.statusAktif')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = $request->password ? Hash::make($request->password) : $user->password;
        $user->role = $request->role;
        $user->status = $request->statusAktif;
        $user->fakultas_id = $request->role == 'Admin' || $request->role == "LPPM" ? null : $request->fakultas;
        $user->prodi_id = $request->role == 'Prodi' || $request->role == "Unit Kerja" ? $request->prodi : null;
        $user->save();

        return response()->json(['success' => 'Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'res' => 'success'
        ]);
    }
}
