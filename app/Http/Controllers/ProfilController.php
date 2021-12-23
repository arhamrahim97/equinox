<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.profil', compact('user'));
    }

    public function updateProfil(Request $request, User $user)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'username' => ['required', Rule::unique('users')->ignore($user->id)],
                'password' => 'nullable',
            ],
            [
                'nama.required' => __('components/validation.required', ['nama' => __('pages/master/akun.nama')]),
                'username.required' => __('components/validation.required', ['nama' => __('pages/master/akun.username')]),
                'username.unique' => __('components/validation.unique', ['nama' => __('pages/master/akun.username')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = $request->password ? Hash::make($request->password) : $user->password;
        $user->save();

        return response()->json(['success' => 'Success']);
    }
}
