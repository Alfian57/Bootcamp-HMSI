<form {{ $attributes }}>
    <div class="row justify-content-center mb-3">
        <div class="col-2">
            <img src="{{ asset('assets/static/images/question.png') }}" alt="Question" class="img-fluid">
        </div>
    </div>

    <h4 class="text-center">{{ __('dashboard/global.delete-confirmation.text') }}</h4>

    <div class="d-flex gap-3 justify-content-center mt-3">
        <x-dashboard::ui.button class="btn-sm btn-secondary" data-bs-dismiss="modal">
            {{ __('dashboard/global.delete-confirmation.cancel') }}
        </x-dashboard::ui.button>

        <x-dashboard::ui.button type="submit" class="btn-sm btn-danger" wire:loading.attr="disabled">
            <div wire:loading>
                Loading...
            </div>
            <div wire:loading.remove>
                {{ __('dashboard/global.delete-confirmation.confirm') }}
            </div>
        </x-dashboard::ui.button>
    </div>

</form>
