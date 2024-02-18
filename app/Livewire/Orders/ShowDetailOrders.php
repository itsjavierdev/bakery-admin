<?php

namespace App\Livewire\Orders;

use Livewire\Component;
use App\Models\Order;
use App\Models\Order_Detail;
use Livewire\Attributes\On;

class ShowDetailOrders extends Component
{

    //SHOW DETAIL
    public $orderDetails;
    public $orderTotals;

    //OPEN MODAL
    public $open = false;

    //SHOW MODAL DETAIL
    #[On('detail')]
    public function detail($id)
    {
        $this->orderDetails = Order_Detail::join('products', 'order__details.products_id', '=', 'products.id')
            ->join('orders', 'order__details.orders_id', '=', 'orders.id')
            ->where('orders_id', $id)
            ->get(['order__details.*', 'products.name', 'products.price']);
        $this->orderTotals = Order::where('id', $id)->first();
        $this->open = true;
    }

    public function render()
    {
        return view('livewire.orders.show-detail-orders');
    }
}
