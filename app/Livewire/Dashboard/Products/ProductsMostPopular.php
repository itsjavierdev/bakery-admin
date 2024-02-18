<?php

namespace App\Livewire\Dashboard\Products;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ProductsMostPopular extends Component
{

    public $bestSellers;

    public function render()
    {
        $this->bestSellers = DB::table('sale__details')
            ->join('products', 'sale__details.products_id', '=', 'products.id')
            ->select('products.name', DB::raw('SUM(sale__details.quantity) as total_sold'))
            ->whereBetween('sale__details.created_at', [Carbon::now()->subMonth(), Carbon::now()])
            ->groupBy('products.id', 'products.name')
            ->orderBy('total_sold', 'desc')
            ->limit(10)
            ->get();

        return view('livewire.dashboard.products.products-most-popular');
    }
}
