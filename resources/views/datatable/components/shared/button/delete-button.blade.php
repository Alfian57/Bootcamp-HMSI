<div class="mx-1 d-inline">
    <form action="{{ $href }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <div class="d-flex text-end">
            <x-datatable::ui.button.index type="submit" class="btn-danger btn-sm"
                onclick="return confirmation(event, '{{ __('dashboard/global.delete-confirmation.text') }}', '{{ __('dashboard/global.delete-confirmation.confirm') }}', '{{ __('dashboard/global.delete-confirmation.cancel') }}')">
                {{ __('dashboard/global.delete-btn') }}
            </x-datatable::ui.button.index>
        </div>
    </form>
</div>
