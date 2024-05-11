@section('title', 'Internal Server Error')

<x-errors-layouts::main>
    <x-slot name="image">
        <img class="img-error" src="{{ asset('assets/compiled/svg/error-500.svg') }}" alt="Not Found">
    </x-slot>

    <x-slot name="title">
        Internal Server Error
    </x-slot>

    <x-slot name="message">
        Situs web saat ini tidak tersedia. Coba lagi nanti atau hubungi pengembang.
    </x-slot>
</x-errors-layouts::main>
