@section('title')
    {{ __('dashboard/purchases.edit.title') }}
@endsection

<div class="pb-5">
    <x-dashboard::shared.page-container title="{{ __('dashboard/purchases.edit.page-title') }}">

        <form wire:submit.prevent="edit">

            <x-dashboard::ui.input.select label="{{ __('dashboard/purchases.form.status.label') }}"
                wire:model.live="form.status" name="form.status" :options="[
                    'unpaid' => __('enum.purchase-status.unpaid'),
                    'paid' => __('enum.purchase-status.paid'),
                    'being shipped' => __('enum.purchase-status.being-shipped'),
                    'completed' => __('enum.purchase-status.completed'),
                    'cancelled' => __('enum.purchase-status.cancelled'),
                ]" required :selected="$form->status" />

            <x-dashboard::ui.input.select label="{{ __('dashboard/purchases.form.user.label') }}"
                wire:model.live="form.user_id" name="form.user_id" :options="$users" required :selected="$form->user_id" />

            <div class="d-flex flex-column gap-3">
                @foreach ($form->purchaseItems as $index => $item)
                    <div class="p-3 rounded" style="background-color: #eee">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>{{ __('model.product') }} #{{ $loop->iteration }}</h6>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="red" width="20"
                                height="20" style="cursor: pointer" wire:click="deleteItem({{ $loop->index }})">
                                <path
                                    d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                            </svg>
                        </div>
                        <x-dashboard::ui.input.select label="{{ __('dashboard/purchases.form.product.label') }}"
                            name="form.purchaseItems.{{ $index }}.product_id" :options="$productOptions" :selected="$item['product_id']"
                            wire:model.defer="form.purchaseItems.{{ $index }}.product_id" required />

                        <x-dashboard::ui.input type="number"
                            label="{{ __('dashboard/purchases.form.quantity.label') }}"
                            placeholder="{{ __('dashboard/purchases.form.quantity.placeholder') }}"
                            wire:model.defer="form.purchaseItems.{{ $index }}.quantity"
                            name="form.purchaseItems.{{ $index }}.quantity" :value="$item['quantity']" required />

                        <x-dashboard::ui.input.text-area label="{{ __('dashboard/purchases.form.note.label') }}"
                            wire:model.defer="form.purchaseItems.{{ $index }}.note"
                            name="form.purchaseItems.{{ $index }}.note" :value="$item['note']" />
                    </div>
                @endforeach
            </div>

            <div class="mt-3 w-100 d-flex justify-content-center border p-2" wire:click="addPurchaseItem"
                style="cursor: pointer; background-color: #eee">
                <span class="fw-bold">{{ __('dashboard/purchases.form.add-item-button') }}</span>
            </div>

            <div class="d-flex justify-content-end mt-3" wire:loading.attr="disabled">
                <x-dashboard::ui.button type="submit">
                    <div wire:loading>
                        Loading...
                    </div>
                    <div wire:loading.remove>
                        {{ __('dashboard/global.submit-btn') }}
                    </div>
                </x-dashboard::ui.button>
            </div>
        </form>

    </x-dashboard::shared.page-container>
</div>
