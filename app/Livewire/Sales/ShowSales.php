<?php

namespace App\Livewire\Sales;

use Livewire\Component;
use App\Models\Sale;
use App\Models\Sale_detail;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ShowSales extends Component
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
        $saleClients = Sale::join('users', 'sales.users_id', '=', 'users.id')
            ->where(function ($query) {
                $query->where('sales.total', 'like', '%' . $this->search . '%')
                    ->orWhere('sales.created_at', 'like', '%' . $this->search . '%')
                    ->orWhere('users.name', 'like', '%' . $this->search . '%')
                    ->orWhere('users.phone', 'like', '%' . $this->search . '%')
                    ->orWhere('sales.created_at', 'like', '%' . $this->search . '%');
            })
            ->select('sales.*', 'users.name', 'users.phone')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);

        return view('livewire.sales.show-sales', compact('saleClients'));
    }
    //DELETE
    #[On('delete')]
    public function delete(Sale $saleId)
    {
        $saleId->delete();

        $this->dispatch('render');

        //TOAST
        session()->flash('status', 'Producto eliminado correctamente');
        session()->flash('accion', 'delete');

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
