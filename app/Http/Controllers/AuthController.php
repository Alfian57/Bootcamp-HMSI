<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (auth()->attempt($credentials)) {
            return redirect()->intended(route('dashboard.index'));
        }

        toast('Login Gagal', 'error');

        return back();
    }
}
