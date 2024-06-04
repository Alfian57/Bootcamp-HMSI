@section('title')
    Dashbord
@endsection

@push('scripts')
    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
@endpush

<x-dashboard-layouts::main>
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
    </x-dashboard::shared.page-container>
</x-dashboard-layouts::main>
