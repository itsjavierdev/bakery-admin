<?php

namespace App\Livewire\Forms\Categories;


use Livewire\Component;
use Livewire\Form;
use Livewire\Attributes\Rule;
use App\Models\Category;

class CreateFormCategories extends Form
{
    //VALIDATION RULES
    #[Rule('required|min:3|max:20|regex:/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ\s]+$/|unique:categories,name', as: 'categoría')]
    public $name;

    //CREATE
    public function save(){
        $this->validate();
        $category=Category::create($this->only('name'));
        //TOAST
        session()->flash('status', 'Categoría agregada correctamente');
        session()->flash('accion', 'create');

        $this->reset();
    }

}
