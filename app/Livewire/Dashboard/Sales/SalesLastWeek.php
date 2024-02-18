<?php

namespace App\Livewire\Dashboard\Sales;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SalesLastWeek extends Component
{
    public $salesLastWeek;

    public function render()
    {
        $this->salesLastWeek = DB::table('sales')
            ->select(
                DB::raw('DAY(created_at) as day'),
                DB::raw('SUM(total) as total_income')
            )
            ->where('created_at', '>=', Carbon::now()->subWeek())
            ->groupBy(DB::raw('DAY(created_at)'))
            ->orderBy('day', 'asc')
            ->get();
        return view('livewire.dashboard.sales.sales-last-week');
    }
}
