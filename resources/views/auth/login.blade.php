@extends('auth.layouts.main')

@section('content')
    <div class="auth-logo">
        <a href="#"><img src="{{ asset('assets/compiled/svg/logo.svg') }}" alt="Logo"></a>
    </div>

    <h1 class="auth-title">Login.</h1>
    <p class="auth-subtitle mb-5">Login dengan data yang Anda.</p>

    <form action="{{ route('login.authenticate') }}" method="POST">
        @csrf

        <x-auth::ui.input type="email" icon="bi bi-person" name="email" placeholder="Email" value="{{ old('email') }}" />

        <x-auth::ui.input type="password" icon="bi bi-shield-lock" name="password" placeholder="Password" />

        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Login</button>
    </form>

    <div class="text-center mt-5 text-lg fs-4">
        <p>
            <a class="font-bold" href="#">Lupa password?</a>
        </p>
    </div>
@endsection
