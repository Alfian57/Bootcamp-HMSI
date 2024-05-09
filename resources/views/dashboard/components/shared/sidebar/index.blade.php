<div id="sidebar">
    <div class="sidebar-wrapper active">
        <x-dashboard::shared.sidebar.header />

        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <x-dashboard::shared.sidebar.menu href="{{ route('dashboard.index') }}">
                    <x-slot name="icon">
                        <i class="bi bi-grid-fill"></i>
                    </x-slot>

                    <x-slot name="text">
                        <span>Dashboard</span>
                    </x-slot>
                </x-dashboard::shared.sidebar.menu>

                <x-dashboard::shared.sidebar.menu href="{{ route('dashboard.products.index') }}">
                    <x-slot name="icon">
                        <i class="bi bi-grid-fill"></i>
                    </x-slot>

                    <x-slot name="text">
                        <span>Produk</span>
                    </x-slot>
                </x-dashboard::shared.sidebar.menu>

                <x-dashboard::shared.sidebar.menu href="{{ route('dashboard.purchases.index') }}">
                    <x-slot name="icon">
                        <i class="bi bi-grid-fill"></i>
                    </x-slot>

                    <x-slot name="text">
                        <span>Pembelian</span>
                    </x-slot>
                </x-dashboard::shared.sidebar.menu>

                <x-dashboard::shared.sidebar.menu href="{{ route('dashboard.users.index') }}">
                    <x-slot name="icon">
                        <i class="bi bi-grid-fill"></i>
                    </x-slot>

                    <x-slot name="text">
                        <span>Pengguna</span>
                    </x-slot>
                </x-dashboard::shared.sidebar.menu>
            </ul>
        </div>
    </div>
</div>
