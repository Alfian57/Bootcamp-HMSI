<li class="sidebar-item @if (str_contains(request()->url(), $href)) active @endif">
    <a href="{{ $href }}" class='sidebar-link'>
        {{ $slot }}
    </a>
</li>
