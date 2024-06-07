<!DOCTYPE html>
<html lang="en">

<x-auth::shared.head />

<link rel="stylesheet" href="{{ asset('assets/compiled/css/auth.css') }}">

<body>
    @include('sweetalert::alert')
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>

    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left" class="d-flex flex-column justify-content-center h-100">
                    {{ $slot }}
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block position-relative" id="auth-right-bg">
                <div class="bg-primary" id="auth-right-filter"></div>
            </div>
        </div>
    </div>

    @livewireScripts
</body>

</html>
