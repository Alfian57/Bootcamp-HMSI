<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.pages.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (auth()->attempt($credentials)) {
            if (! auth()->user()->is_active) {
                toast('Akun tidak aktif', 'error');

                return back()->withInput();
            }

            User::where('id', auth()->id())->update([
                'last_login' => now(),
            ]);

            return redirect()->intended(route('dashboard.index'));
        }

        toast('Login Gagal', 'error');

        return back()->withInput();
    }
}
