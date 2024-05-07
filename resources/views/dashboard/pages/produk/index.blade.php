@extends('dashboard.layouts.main')

@section('content')
    <x-dashboard::shared.page-container title="Produk">
        <div class="d-flex justify-content-end mb-5">
            <x-dashboard::ui.button href="{{ route('dashboard.produk.create') }}">
                Tambah Produk
            </x-dashboard::ui.button>
        </div>

        <livewire:produk-table />

    </x-dashboard::shared.page-container>
@endsection
