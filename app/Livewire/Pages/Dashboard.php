<?php

namespace App\Livewire\Pages;

use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public function mount()
    {
        $startDate = Carbon::now()->subYear()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $purchases = Purchase::query()
            ->addSelect([
                DB::raw('MONTH(created_at) as month'),
            ])
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        // dd($purchases);
    }

    public function render()
    {
        return view('dashboard.pages.dashboard.index');
    }
}
