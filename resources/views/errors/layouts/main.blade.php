<!DOCTYPE html>
<html lang="en">

<x-errors::shared.head />

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="error">
        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
                <div class="text-center">
                    @isset($image)
                        {{ $image }}
                    @else
                        <img class="img-error" src="{{ asset('assets/compiled/svg/error-500.svg') }}" alt="Error">
                    @endisset

                    @isset($title)
                        <h1 class="error-title">{{ $title }}</h1>
                    @endisset

                    @isset($message)
                        <p class='fs-5 text-gray-600'>{{ $message }}</p>
                    @endisset

                    <a href="{{ route('dashboard.index') }}" class="btn btn-lg btn-outline-primary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
