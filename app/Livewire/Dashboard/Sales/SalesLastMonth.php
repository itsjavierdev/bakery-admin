<?php

namespace App\Livewire\Dashboard\Sales;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SalesLastMonth extends Component
{
    public $salesLastMonth;

    public function render()
    {
        $this->salesLastMonth = DB::table('sales')
            ->select(
                DB::raw('DAY(created_at) as day'),
                DB::raw('SUM(total) as total_income')
            )
            ->where('created_at', '>=', Carbon::now()->subMonth())
            ->groupBy(DB::raw('DAY(created_at)'))
            ->orderBy('day', 'asc')
            ->get();
        return view('livewire.dashboard.sales.sales-last-month');
    }
}
