<?php

namespace App\Livewire\Pages;

use App\Enums\PurchaceStatus;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public array $months;

    public string $productCount;

    public string $categoryCount;

    public string $purchaseCount;

    public string $userCount;

    public array $paidPurchaseCounts;

    public array $unpaidPurchaseCounts;

    public array $beingShippedPurchaseCounts;

    public array $completedPurchaseCounts;

    public array $cancelledPurchaseCounts;

    public function mount()
    {
        $currentMonth = date('n');

        for ($i = 1; $i <= 12; $i++) {
            $monthNumber = ($currentMonth + $i - 1) % 12 + 1;
            $this->months[] = date('F', mktime(0, 0, 0, $monthNumber, 10));
        }

        $this->productCount = number_format(Product::count());
        $this->categoryCount = number_format(Category::count());
        $this->purchaseCount = number_format(Purchase::count());
        $this->userCount = number_format(User::count());

        $this->paidPurchaseCounts = $this->getPurchaseCount(PurchaceStatus::PAID->value);
        $this->unpaidPurchaseCounts = $this->getPurchaseCount(PurchaceStatus::UNPAID->value);
        $this->beingShippedPurchaseCounts = $this->getPurchaseCount(PurchaceStatus::BEING_SHIPPED->value);
        $this->completedPurchaseCounts = $this->getPurchaseCount(PurchaceStatus::COMPLETED->value);
        $this->cancelledPurchaseCounts = $this->getPurchaseCount(PurchaceStatus::CANCELLED->value);
    }

    private function getPurchaseCount($status): array
    {
        $currentDate = Carbon::now();
        $startDate = $currentDate->copy()->subMonths(11)->startOfMonth();

        $purchasesPerMonth = Purchase::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
            ->where('status', $status)
            ->where('created_at', '>=', $startDate)
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->toArray();

        $monthlyPurchaseCounts = array_fill(0, 12, 0);

        foreach ($purchasesPerMonth as $data) {
            $monthIndex = ($currentDate->year - $data['year']) * 12 + $currentDate->month - $data['month'];
            if ($monthIndex >= 0 && $monthIndex < 12) {
                $monthlyPurchaseCounts[11 - $monthIndex] = $data['count'];
            }
        }

        return $monthlyPurchaseCounts;
    }

    public function render()
    {
        return view('dashboard.pages.dashboard.index');
    }
}
