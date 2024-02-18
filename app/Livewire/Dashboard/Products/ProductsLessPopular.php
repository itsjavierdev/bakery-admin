<?php

namespace App\Livewire\Dashboard\Products;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ProductsLessPopular extends Component
{

    public $lessSellers;

    public function render()
    {

        $this->lessSellers = DB::table('sale__details')
            ->join('products', 'sale__details.products_id', '=', 'products.id')
            ->select('products.name', DB::raw('SUM(sale__details.quantity) as total_sold'))
            ->whereBetween('sale__details.created_at', [Carbon::now()->subMonth(), Carbon::now()])
            ->groupBy('products.id', 'products.name')
            ->orderBy('total_sold', 'asc')
            ->limit(10)
            ->get();
        return view('livewire.dashboard.products.products-less-popular');
    }
}
