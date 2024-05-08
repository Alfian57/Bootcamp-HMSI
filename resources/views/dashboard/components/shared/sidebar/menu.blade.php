<li class="sidebar-item @if (str_contains(request()->url(), $href)) active @endif">
    <a href="{{ $href }}" class='sidebar-link' wire:navigate>
        @isset($icon)
            {{ $icon }}
        @endisset
        @isset($text)
            {{ $text }}
        @endisset
    </a>
</li>
