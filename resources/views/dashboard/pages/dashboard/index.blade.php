@section('title', 'Dashbord')

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            series: [{
                    name: '{{ __('enum.purchase-status.unpaid') }}',
                    data: [31, 40, 28, 51, 42, 109, 100]
                },
                {
                    name: '{{ __('enum.purchase-status.paid') }}',
                    data: [21, 53, 65, 42, 54, 72, 61]
                },
                {
                    name: '{{ __('enum.purchase-status.being-shipped') }}',
                    data: [34, 32, 45, 43, 34, 52, 41, 50]
                },
                {
                    name: '{{ __('enum.purchase-status.completed') }}',
                    data: [15, 28, 37, 24, 36, 45, 51]
                },
                {
                    name: '{{ __('enum.purchase-status.cancelled') }}',
                    data: [11, 32, 45, 32, 34, 52, 41, 60]
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
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"]
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
                <x-dashboard::shared.dashboard-card title="Profile Views" value="112.000" icon="iconly-boldShow"
                    color="purple" />
                <x-dashboard::shared.dashboard-card title="Followers" value="183.000" icon="iconly-boldProfile"
                    color="blue" />
                <x-dashboard::shared.dashboard-card title="Following" value="80.000" icon="iconly-boldAdd-User"
                    color="green" />
                <x-dashboard::shared.dashboard-card title="Saved Post" value="112" icon="iconly-boldBookmark"
                    color="red" />
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
