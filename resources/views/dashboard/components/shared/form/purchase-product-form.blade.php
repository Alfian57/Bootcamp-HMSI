<div>
    <div class="d-flex flex-column gap-3">
        @foreach ($purchaseItems as $item)
            <div class="bg-white p-3 rounded">
                <x-dashboard::ui.input.select label="{{ __('dashboard/purchases.form.product.label') }}" name="product_id"
                    :options="$productOptions" :selected="old('product_id')" wire:model.live="purchaseItems.{{ $loop->index }}.product_id"
                    required />

                <x-dashboard::ui.input type="number" label="{{ __('dashboard/purchases.form.quantity.label') }}"
                    placeholder="{{ __('dashboard/purchases.form.quantity.placeholder') }}"
                    wire:model.live="purchaseItems.{{ $loop->index }}.quantity" name="quantity" :value="old('quantity')"
                    required />

                <x-dashboard::ui.input.text-area label="{{ __('dashboard/purchases.form.note.label') }}"
                    wire:model.live="purchaseItems.{{ $loop->index }}.note" name="note" :value="old('note')"
                    required />
            </div>
        @endforeach
    </div>

    <div class="mt-3 w-100 d-flex justify-content-center border p-2" wire:click="addPurchaseItem"
        style="cursor: pointer; background-color: #eee">
        <span class="fw-bold">{{ __('dashboard/purchases.form.add-item-button') }}</span>
    </div>
</div>
