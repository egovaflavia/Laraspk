<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if ($user = Auth::user()) {
            if ($user->level == 'admin') {
                return redirect()->intended('home');
            }elseif ($user->level == 'pimpinan') {
                return redirect()->intended('home');
            }
        }
        return view('login');
    }

    public function proses_login(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->level == 'admin') {
                return redirect()->intended('home');
            }elseif ($user->level == 'pimpinan') {
                return redirect()->intended('home');
            }
            return redirect()->intended('/');
        }
        return redirect('login')
            ->withInput()
            ->withErrors([
                'login_gagal' => 'Username / Password tidak cocok'
            ]);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }
}
