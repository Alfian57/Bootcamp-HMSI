<!DOCTYPE html>
<html lang="en">

<x-dashboard::shared.head :title="$title" />

@livewireStyles

<body>
    @include('sweetalert::alert')
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>

    <div id="app">

        <x-dashboard::shared.sidebar />

        <div id="main">
            <x-dashboard::shared.top-bar />

            @yield('content')

            <x-dashboard::shared.footer />
        </div>
    </div>

    <x-dashboard::shared.scripts />

    @livewireScripts
</body>

</html>
