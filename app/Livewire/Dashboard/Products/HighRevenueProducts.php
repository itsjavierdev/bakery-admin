<?php

namespace App\Livewire\Dashboard\Products;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HighRevenueProducts extends Component
{
    public $highRevenueProducts;

    public function render()
    {
        $this->highRevenueProducts = DB::table('sale__details')
            ->join('products', 'sale__details.products_id', '=', 'products.id')
            ->select('products.name', DB::raw('SUM(sale__details.subtotal) as total_revenue'))
            ->whereBetween('sale__details.created_at', [Carbon::now()->subMonth(), Carbon::now()])
            ->groupBy('products.id', 'products.name')
            ->orderBy('total_revenue', 'desc')
            ->limit(10)
            ->get();
        return view('livewire.dashboard.products.high-revenue-products');
    }
}
