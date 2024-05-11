@section('title', 'Lupa Password')

<x-auth-layouts::main>
    <div class="auth-logo">
        <a href="#"><img src="{{ asset('assets/compiled/svg/logo.svg') }}" alt="Logo"></a>
    </div>

    <h1 class="auth-title" style="font-size: 32px !important;">Lupa Password.</h1>

    <form action="{{ route('password.email') }}" method="POST">
        @csrf

        <x-auth::ui.input type="email" icon="bi bi-person" name="email" placeholder="Email"
            value="{{ old('email') }}" />

        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Kirim Email</button>
    </form>

    <div class="text-center mt-5 text-lg fs-4">
        <p>
            <a class="font-bold" href="{{ route('login') }}" wire:navigate>Kembali</a>
        </p>
    </div>
</x-auth-layouts::main>
