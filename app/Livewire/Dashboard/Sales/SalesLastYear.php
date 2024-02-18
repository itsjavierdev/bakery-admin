<?php

namespace App\Livewire\Dashboard\Sales;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SalesLastYear extends Component
{

    public $salesLastYear;

    public function render()
    {
        $this->salesLastYear = DB::table('sales')
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('SUM(total) as total_income')
            )
            ->where('created_at', '>=', Carbon::now()->subMonths(11))
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();
        return view('livewire.dashboard.sales.sales-last-year');
    }
}
