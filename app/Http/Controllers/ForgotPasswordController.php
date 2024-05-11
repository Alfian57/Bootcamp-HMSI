<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordMailRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function request()
    {
        return view('auth.pages.forgot-password');
    }

    public function email(ForgotPasswordMailRequest $request)
    {
        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            toast('Tautan reset password berhasil dikirim ke emailmu.', 'success');
        } else {
            toast('Gagal untuk mengirim tautan reset password.', 'error');
        }

        return back()->withInput();
    }

    public function reset(string $token)
    {
        return view('auth.pages.reset-password', [
            'token' => $token,
        ]);
    }

    public function update(ResetPasswordRequest $request, string $token)
    {
        $credentials = $request->only('email', 'password', 'password_confirmation', 'token');
        $status = Password::reset(
            $credentials,
            function (User $user, string $password) {
                $user->update([
                    'password' => $password,
                    'remember_token' => Str::random(60),
                ]);
                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            toast('Berhasil mereset password', 'success');

            return redirect()->route('login');
        }

        toast('Gagal melakukan reset password', 'error');

        return back();
    }
}
