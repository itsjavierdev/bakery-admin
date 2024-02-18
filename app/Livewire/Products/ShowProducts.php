<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;

class ShowProducts extends Component
{
    use WithPagination;

    //FILTERS
    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 10;

    protected $listeners = ['render'];

    //SHOW DATABLE
    public function render()
    {
        $category = Category::all();
        $products = Product::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('price', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->orWhereHas('category', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);
        return view('livewire.products.show-products', compact('products', 'category'));
    }

    //RESET PAGE ON FILTERS
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
