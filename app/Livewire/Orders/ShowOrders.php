<?php

namespace App\Livewire\Orders;

use Livewire\Component;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Sale;
use App\Models\Sale_detail;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ShowOrders extends Component
{
    use WithPagination;

    //FILTERS
    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 10;

    //SHOW DATATABLE
    public function render()
    {
        $orderClients = Order::join('users', 'orders.users_id', '=', 'users.id')
            ->leftJoin('addresses', function ($join) {
                $join->on('orders.addresses_id', '=', 'addresses.id');
            })
            ->where(function ($query) {
                $query->where('orders.total', 'like', '%' . $this->search . '%')
                    ->orWhere('orders.created_at', 'like', '%' . $this->search . '%')
                    ->orWhere('users.name', 'like', '%' . $this->search . '%')
                    ->orWhere('users.phone', 'like', '%' . $this->search . '%')
                    ->orWhere('addresses.street', 'like', '%' . $this->search . '%')
                    ->orWhere('addresses.city', 'like', '%' . $this->search . '%')
                    ->orWhere('addresses.reference', 'like', '%' . $this->search . '%')
                    ->orWhere('orders.payment', 'like', '%' . $this->search . '%')
                    ->orWhere('orders.description', 'like', '%' . $this->search . '%');
            })
            ->select('orders.*', 'users.name', 'users.phone', 'addresses.street', 'addresses.city', 'addresses.reference')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);

        return view('livewire.orders.show-orders', compact('orderClients'));
    }
    //DELETE
    #[On('delete')]
    public function delete(Order $orderId)
    {
        $orderId->delete();

        $this->dispatch('render');

        //TOAST
        session()->flash('status', 'Producto eliminado correctamente');
        session()->flash('accion', 'delete');

        $this->dispatch('saved');
    }
    //DELIVERED
    #[On('deliver')]
    public function deliver($id)
    {
        $order = Order::find($id);
        $orderDetails = Order_Detail::where('orders_id', '=', $id)->get();

        $newSale = new Sale();

        $newSale->total = $order->total;
        $newSale->total_quantity = $order->total_quantity;
        $newSale->users_id = $order->users_id;
        $newSale->payment = $order->payment;

        $newSale->save();
        $sale = Sale::latest('created_at')->first();

        foreach ($orderDetails as $orderDetail) {
            $newSaleDetail = new Sale_Detail();
            $newSaleDetail->quantity = $orderDetail->quantity;
            $newSaleDetail->subtotal = $orderDetail->subtotal;
            $newSaleDetail->products_id = $orderDetail->products_id;
            $newSaleDetail->sales_id = $sale->id;
            $newSaleDetail->save();
        }
        $order->delete();

        $this->dispatch('render');
        //TOAST
        session()->flash('status', 'Pedido entregado correctamente');
        session()->flash('accion', 'create');
        $this->dispatch('saved');
    }

    //RESET ON FILTERS
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingCant()
    {
        $this->resetPage();
    }

    //FILTERS ORDER
    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'desc';
        }
    }
}
