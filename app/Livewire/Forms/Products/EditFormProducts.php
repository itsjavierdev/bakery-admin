<?php

namespace App\Livewire\Forms\Products;

use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models\Product;
use App\Models\Category;
use Livewire\Component;

class EditFormProducts extends Form
{
    //ON EDIT
    public $product;
    public $product_id;

    //RESET IMAGE
    public $oldFeatured;
    public $imageKey;

    //VALIDATION RULES
    #[Rule('required', as: 'categoría')]
    public $category_id;
    #[Rule('required|numeric|max:2147483647', as: 'precio')]
    public $price;
    #[Rule('nullable|image|max:4096', as: 'imagen')]
    public $newFeatured;
    #[Rule('max:150', as: 'descripción')]
    public $description;
    
    public $name;
    public function rules()
    {
        return [
            'name' => 'required|max:40|regex:/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ\s]+$/|min:3|unique:products,name,' . $this->product_id
        ];
    }
    public function validationAttributes(){return['name'=>'nombre'];}

    //MODAL UPDATE
    public function edit($id){
        $this->product=Product::findOrFail($id);
        $this->product_id=$this->product->id;
        $this->name=$this->product->name;
        $this->price=$this->product->price;
        $this->category_id=$this->product->category_id;
        $this->description=$this->product->description;
        $this->oldFeatured=$this->product->featured;
    }
    
    //UPDATE
    public function update(){
        $validated=$this->validate();
        $featured=$this->product->featured;
        if($this->newFeatured){
            $featured=$this->newFeatured->store('products');
        }
        $this->product->slug=null;
        $this->product->update([
            'name'=>$this->name,
            'category_id'=>$this->category_id,
            'price'=>$this->price,
            'description'=>$this->description,
            'featured'=>$featured

        ]);
        //TOAST
        session()->flash('status', 'Producto actualizado correctamente');
        session()->flash('accion', 'update');

        $this->reset();
    }

}
