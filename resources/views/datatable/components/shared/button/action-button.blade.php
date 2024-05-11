@if (isset($navigate) && $navigate)
    <x-datatable::ui.button :href="$href" class="{{ $class ?? '' }} btn-sm" wire:navigate>
        {{ $text ?? '' }}
    </x-datatable::ui.button>
@else
    <x-datatable::ui.button :href="$href" class="{{ $class ?? '' }} btn-sm">
        {{ $text ?? '' }}
    </x-datatable::ui.button>
@endif
