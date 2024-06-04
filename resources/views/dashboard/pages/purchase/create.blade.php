@section('title')
    {{ __('dashboard/purchases.create.title') }}
@endsection

<x-dashboard-layouts::main>
    <x-dashboard::shared.page-container title="{{ __('dashboard/purchases.create.page-title') }}">

        <form action="{{ route('dashboard.purchases.store') }}" method="post">
            @csrf
            <x-dashboard::ui.input.select label="{{ __('dashboard/purchases.form.status.label') }}" name="status"
                :options="[
                    'unpaid' => __('enum.purchase-status.unpaid'),
                    'paid' => __('enum.purchase-status.paid'),
                    'being shipped' => __('enum.purchase-status.being-shipped'),
                    'completed' => __('enum.purchase-status.completed'),
                    'cancelled' => __('enum.purchase-status.cancelled'),
                ]" required :selected="old('status')" />

            <livewire:form.purchase-product-form />

            <div class="d-flex justify-content-end mb-5 mt-3">
                <x-dashboard::ui.button type="submit">
                    {{ __('dashboard/global.submit-btn') }}
                </x-dashboard::ui.button>
            </div>
        </form>

    </x-dashboard::shared.page-container>
</x-dashboard-layouts::main>
