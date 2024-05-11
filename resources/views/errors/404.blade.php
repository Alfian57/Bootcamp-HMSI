@section('title', 'Not Found')

<x-errors-layouts::main>
    <x-slot name="image">
        <img class="img-error" src="{{ asset('assets/compiled/svg/error-404.svg') }}" alt="Not Found">
    </x-slot>

    <x-slot name="title">
        Not Found
    </x-slot>

    <x-slot name="message">
        Halaman yang Anda cari tidak ditemukan
    </x-slot>
</x-errors-layouts::main>
