<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function cekLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // if ((Auth::user()->role == 'Guru') || (Auth::user()->role == 'Pegawai')) {
            //     if ((User::find(Auth::user()->id)->profile) != null) {
            return redirect('/');
            //     } else {
            //         return redirect()->intended('/lengkapi-data');
            //     }
            // }
            // else { // ROLE SELAIN GURU dan PEGAWAI
            //     return redirect()->intended('/');
            // }
        }
        return back()->with('loginError', __('pages/login.gagalLogin'));
    }
}
