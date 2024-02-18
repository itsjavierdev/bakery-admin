<?php

namespace App\Livewire\Forms\Categories;


use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models\Category;

class EditFormCategories extends Form
{
    //ON EDIT
    public $category;
    public $category_id; 

    //INPUT
    public $name;

    //VALIDATION RULES
    public function rules(){
        return[
            'name' => 'required|min:3|max:20|regex:/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ\s]+$/|unique:categories,name,' . $this->category_id
        ];
    }
    public function validationAttributes(){return['name'=>'categoría'];}

    //MODAL UPDATE
    public function edit($id){
        $this->category=Category::findOrFail($id);
        $this->name=$this->category->name;
        $this->category_id=$this->category->id;

    }

    //UPDATE
    public function update(){
        $validated=$this->validate();
        Category::findOrFail($this->category->id)->update($validated);

        session()->flash('status', 'Categoría actualizada correctamente');
        session()->flash('accion', 'update');

        $this->reset();
    }
}
