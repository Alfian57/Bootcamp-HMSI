<!DOCTYPE html>
<html lang="en">

<x-dashboard::shared.head />

@livewireStyles

<body>
    @stack('body-init')

    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>

    <div id="app">

        <x-dashboard::shared.sidebar />

        <div id="main">
            <x-dashboard::shared.top-bar />
            {{ $slot }}
            <x-dashboard::shared.footer />
        </div>
    </div>

    <x-dashboard::shared.scripts />
    @livewireScripts
</body>

</html>
