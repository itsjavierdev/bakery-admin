<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class ShowCategories extends Component
{
    use WithPagination;

    //FILTERS
    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 10;

    protected $listeners = ['render'];

    //SHOW DATATABLE
    public function render()
    {
        $categories = Category::where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);
        return view('livewire.categories.show-categories', compact('categories'));
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
