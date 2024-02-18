<?php

namespace App\Livewire\Forms\Products;


use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models\Product;
use Illuminate\Support\Str;

class CreateFormProducts extends Form
{

    //VALIDATION RULES
    #[Rule('required|max:40|regex:/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ\s]+$/|min:3|unique:products,name', as: 'producto')]
public $name;
    #[Rule('required', as: 'categoría')]
    public $category_id;
    #[Rule('required|numeric|max:2147483647', as: 'precio')]
    public $price;
    #[Rule('required|image|max:4096', as: 'imagen')]
    public $newFeatured;
    #[Rule('max:150', as: 'descripción')]
    public $description;

    //RESET IMAGE
    public $imageKey;

    //SAVE
    public function save(){
        $this->validate();
        $featured=$this->newFeatured->store('products');
        $product=Product::create([
            'name'=>$this->name,
            'category_id'=>$this->category_id,
            'price'=>$this->price,
            'description'=>$this->description,
            'featured'=>$featured,
        ]);
        //TOAST
        session()->flash('status', 'Producto agregado correctamente');
        session()->flash('accion', 'create');
        
        $this->reset();
        $this->imageKey=rand();
    }
}
