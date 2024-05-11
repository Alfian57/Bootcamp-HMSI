@section('title', 'Lupa Password')

<x-auth-layouts::main>
    <div class="auth-logo">
        <a href="#"><img src="{{ asset('assets/compiled/svg/logo.svg') }}" alt="Logo"></a>
    </div>

    <h1 class="auth-title" style="font-size: 32px !important;">Reset Password.</h1>

    <form action="{{ route('password.update', $token) }}" method="POST">
        @csrf

        <x-auth::ui.input type="hidden" name="token" value="{{ $token }}" />

        <x-auth::ui.input type="email" icon="bi bi-person" name="email" placeholder="Email"
            value="{{ old('email', request('email')) }}" />

        <x-auth::ui.input type="password" icon="bi bi-shield-lock" name="password" placeholder="Password" />

        <x-auth::ui.input type="password" icon="bi bi-shield-lock" name="password_confirmation"
            placeholder="Password Konfirmasi" />

        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Kirim</button>
    </form>

    <div class="text-center mt-5 text-lg fs-4">
        <p>
            <a class="font-bold" href="{{ route('login') }}" wire:navigate>Halaman Login</a>
        </p>
    </div>
</x-auth-layouts::main>
