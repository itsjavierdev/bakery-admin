<?php

namespace App\Livewire\Dashboard\Products;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LowRevenueProducts extends Component
{
    public $lowRevenueProducts;

    public function render()
    {
        $this->lowRevenueProducts = DB::table('sale__details')
            ->join('products', 'sale__details.products_id', '=', 'products.id')
            ->select('products.name', DB::raw('SUM(sale__details.subtotal) as total_revenue'))
            ->whereBetween('sale__details.created_at', [Carbon::now()->subMonth(), Carbon::now()])
            ->groupBy('products.id', 'products.name')
            ->orderBy('total_revenue', 'asc')
            ->limit(10)
            ->get();
        return view('livewire.dashboard.products.low-revenue-products');
    }
}
