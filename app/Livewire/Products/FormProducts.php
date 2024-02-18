<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Livewire\Forms\Products\CreateFormProducts;
use App\Livewire\Forms\Products\EditFormProducts;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class FormProducts extends Component
{
    use WithFileUploads;

    //FORM OBJECT
    public CreateFormProducts $productCreate;
    public EditFormProducts $productEdit;

    //MODAL
    public $formtitle = "Crear nuevo producto";
    public $editform = false;
    public $open = false;

    //SELECT CATEGORIES
    public $categories = '';
    public $category_id = '';

    //SAVE
    public function save()
    {
        $this->productCreate->save();
        $this->dispatch('render')->to(ShowProducts::class);
        $this->dispatch('saved');
        $this->resetExcept('productCreate', 'productEdit', 'categories');
    }

    //UPDATE
    public function update()
    {
        $this->productEdit->update();
        $this->updatingOpen();
        $this->dispatch('render')->to(ShowProducts::class);
        $this->resetExcept('productCreate', 'productEdit', 'categories');
        $this->dispatch('saved');
    }

    //DELETE
    #[On('delete')]
    public function delete(Product $productId)
    {
        $featuredPath = $productId->featured;

        // Elimina el producto
        $productId->delete();

        // Elimina la imagen si existe
        if ($featuredPath && Storage::exists($featuredPath)) {
            Storage::delete($featuredPath);
        }

        $this->dispatch('render')->to(ShowProducts::class);

        //TOAST
        session()->flash('status', 'Producto eliminado correctamente');
        session()->flash('accion', 'delete');
        $this->dispatch('saved');
    }

    //MODAL UPDATE
    #[On('edit-product')]
    public function edit($id)
    {
        $this->editform = true;
        $this->formtitle = "Editar producto";
        $this->productEdit->edit($id);
        $this->open = true;
    }

    public function render()
    {
        return view('livewire.products.form-products');
    }

    //SHOW CATEGORIES
    public function mount()
    {
        $this->categories = Category::all();
    }

    //MODAL RESET
    public function updatingOpen()
    {
        if ($this->open == true) {
            $this->resetExcept('productCreate', 'productEdit', 'categories');
            $this->resetValidation();
            $this->productCreate->reset();
            $this->productEdit->reset();
            $this->productCreate->imageKey = rand();
        }
    }
}
