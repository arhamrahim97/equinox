<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfilController extends Controller
{
    public function profil()
    {
        return ResponseFormatter::success(
            auth()->user(),
            'Data Profil Berhasil Diambil'
        );
    }

    public function updateProfil(Request $request)
    {
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'username' => ['required', Rule::unique('users')->ignore($id)],
                'password' => 'nullable',
            ],
            [
                'nama.required' => __('components/validation.required', ['nama' => __('pages/master/akun.nama')]),
                'username.required' => __('components/validation.required', ['nama' => __('pages/master/akun.username')]),
                'username.unique' => __('components/validation.unique', ['nama' => __('pages/master/akun.username')]),
            ]
        );

        if ($validator->fails()) {
            return ResponseFormatter::error(
                $validator->errors(),
                'Profil Gagal Diupdate',
                404
            );
        }

        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = $request->password ? Hash::make($request->password) : $user->password;
        $user->save();

        return ResponseFormatter::success(
            null,
            'Profil Berhasil Di Update'
        );
    }
}
