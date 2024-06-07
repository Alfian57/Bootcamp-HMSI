<div class="page-heading d-flex justify-content-between align-items-center">
    <h3>{{ $title }}</h3>
    <div class="d-flex align-items-center gap-3">
        <div class="dropdown" style="cursor: pointer">
            <div class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                <span>{{ app()->getLocale() == 'en' ? '🇺🇸' : '🇮🇩' }} {{ app()->getLocale() }}</span>
            </div>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="{{ route('locale', 'en') }}">🇺🇸
                        English</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('locale', 'id') }}">🇮🇩
                        Indonesia</a>
                </li>
            </ul>
        </div>


        <div class="dropdown" style="cursor: pointer">
            <div class="rounded-circle border d-flex justify-content-center align-items-center overflow-hidden"
                style="width:50px;height:50px" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('assets/compiled/jpg/1.jpg') }}" alt="Avatar" class="img-fluid">
            </div>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="#">
                        {{ __('dashboard/navbar.settings') }}
                    </a>
                </li>

                <li>
                    <a class="dropdown-item"
                        href="#"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('dashboard/navbar.logout') }}
                    </a>
                </li>

                <form id="logout-form" action="{{ route('dashboard.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
</div>
<div class="page-content">
    <section class="row">
        <div data-navigate-track>
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible show fade">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        {{ $slot }}
    </section>
</div>
