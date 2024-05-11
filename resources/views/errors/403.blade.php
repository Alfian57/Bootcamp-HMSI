@section('title', 'Forbidden')

<x-errors-layouts::main>
    <x-slot name="image">
        <img class="img-error" src="{{ asset('assets/compiled/svg/error-403.svg') }}" alt="Not Found">
    </x-slot>

    <x-slot name="title">
        Forbidden
    </x-slot>

    <x-slot name="message">
        Anda tidak memiliki akses untuk melihat halaman ini
    </x-slot>
</x-errors-layouts::main>
