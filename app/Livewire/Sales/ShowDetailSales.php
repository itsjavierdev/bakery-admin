<?php

namespace App\Livewire\Sales;

use Livewire\Component;
use App\Models\Sale;
use App\Models\Sale_Detail;
use Livewire\Attributes\On;

class ShowDetailSales extends Component
{
    //SHOW DETAIL
    public $saleDetails;
    public $saleTotals;

    //OPEN MODAL
    public $open = false;

    //SHOW MODAL DETAIL
    #[On('detail')]
    public function detail($id)
    {
        $this->saleDetails = Sale_Detail::join('products', 'sale__details.products_id', '=', 'products.id')
            ->join('sales', 'sale__details.sales_id', '=', 'sales.id')
            ->where('sales_id', $id)
            ->get(['sale__details.*', 'products.name', 'products.price']);
        $this->saleTotals = Sale::where('id', $id)->first();
        $this->open = true;
    }

    public function render()
    {
        return view('livewire.sales.show-detail-sales');
    }
}
