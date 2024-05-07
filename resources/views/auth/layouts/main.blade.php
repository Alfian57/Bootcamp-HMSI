<!DOCTYPE html>
<html lang="en">

<x-auth::shared.head :title="$title" />

<link rel="stylesheet" href="{{ asset('assets/compiled/css/auth.css') }}">

<body>
    @include('sweetalert::alert')
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>

    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    @yield('content')
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    {{--  --}}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
