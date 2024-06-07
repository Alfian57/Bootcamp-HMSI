@section('title', 'Dashbord')

@push('scripts')
    <script>
        var options = {
            series: [{
                    name: '{{ __('enum.purchase-status.unpaid') }}',
                    data: @json($unpaidPurchaseCounts)
                },
                {
                    name: '{{ __('enum.purchase-status.paid') }}',
                    data: @json($paidPurchaseCounts)
                },
                {
                    name: '{{ __('enum.purchase-status.being-shipped') }}',
                    data: @json($beingShippedPurchaseCounts)
                },
                {
                    name: '{{ __('enum.purchase-status.completed') }}',
                    data: @json($completedPurchaseCounts)
                },
                {
                    name: '{{ __('enum.purchase-status.cancelled') }}',
                    data: @json($cancelledPurchaseCounts)
                }
            ],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'month',
                categories: @json($months)
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endpush

<div>
    <x-dashboard::shared.page-container title="Dashboard">
        <div class="col-12">
            <div class="row">

                <x-dashboard::shared.dashboard-card title="{{ __('model.product') }}" value="{{ $productCount }}"
                    color="purple">
                    <x-slot name="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="20" height="20"
                            fill="white">
                            <path
                                d="M32 0C14.3 0 0 14.3 0 32S14.3 64 32 64H48c8.8 0 16 7.2 16 16V368c0 44.2 35.8 80 80 80h18.7c-1.8 5-2.7 10.4-2.7 16c0 26.5 21.5 48 48 48s48-21.5 48-48c0-5.6-1-11-2.7-16H450.7c-1.8 5-2.7 10.4-2.7 16c0 26.5 21.5 48 48 48s48-21.5 48-48c0-5.6-1-11-2.7-16H608c17.7 0 32-14.3 32-32s-14.3-32-32-32H144c-8.8 0-16-7.2-16-16V80C128 35.8 92.2 0 48 0H32zM192 80V272c0 26.5 21.5 48 48 48H560c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H464V176c0 5.9-3.2 11.3-8.5 14.1s-11.5 2.5-16.4-.8L400 163.2l-39.1 26.1c-4.9 3.3-11.2 3.6-16.4 .8s-8.5-8.2-8.5-14.1V32H240c-26.5 0-48 21.5-48 48z" />
                        </svg>
                    </x-slot>
                </x-dashboard::shared.dashboard-card>

                <x-dashboard::shared.dashboard-card title="{{ __('model.category') }}" value="{{ $categoryCount }}"
                    icon="iconly-boldProfile" color="blue">
                    <x-slot name="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20"
                            fill="white">
                            <path
                                d="M345 39.1L472.8 168.4c52.4 53 52.4 138.2 0 191.2L360.8 472.9c-9.3 9.4-24.5 9.5-33.9 .2s-9.5-24.5-.2-33.9L438.6 325.9c33.9-34.3 33.9-89.4 0-123.7L310.9 72.9c-9.3-9.4-9.2-24.6 .2-33.9s24.6-9.2 33.9 .2zM0 229.5V80C0 53.5 21.5 32 48 32H197.5c17 0 33.3 6.7 45.3 18.7l168 168c25 25 25 65.5 0 90.5L277.3 442.7c-25 25-65.5 25-90.5 0l-168-168C6.7 262.7 0 246.5 0 229.5zM144 144a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z" />
                        </svg>
                    </x-slot>
                </x-dashboard::shared.dashboard-card>

                <x-dashboard::shared.dashboard-card title="{{ __('model.purchase') }}" value="{{ $purchaseCount }}"
                    icon="iconly-boldAdd-User" color="green">
                    <x-slot name="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="20" height="20"
                            fill="white">
                            <path
                                d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                        </svg>
                    </x-slot>
                </x-dashboard::shared.dashboard-card>

                <x-dashboard::shared.dashboard-card title="{{ __('model.user') }}" value="{{ $userCount }}"
                    icon="iconly-boldBookmark" color="red">
                    <x-slot name="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="20" height="20"
                            fill="white">
                            <path
                                d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                        </svg>
                    </x-slot>
                </x-dashboard::shared.dashboard-card>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>{{ __('model.purchase') }}</h4>
            </div>
            <div class="card-body">
                <div id="chart"></div>
            </div>
        </div>
    </x-dashboard::shared.page-container>
</div>
