<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use App\Livewire\Forms\Categories\CreateFormCategories;
use App\Livewire\Forms\Categories\EditFormCategories;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;

class FormCategories extends Component
{
    //FORM OBJECT
    public CreateFormCategories $categoryCreate;
    public EditFormCategories $categoryEdit;

    //MODAL
    public $formtitle = "Crear nueva categoría";
    public $editform = false;
    public $open = false;

    //SAVE
    public function save()
    {
        $this->categoryCreate->save();
        $this->dispatch('render')->to(ShowCategories::class);
        $this->dispatch('saved');
        $this->resetExcept('categoryCreate', 'categoryEdit');
    }

    //UPDATE
    public function update()
    {
        $this->categoryEdit->update();
        $this->updatingOpen();
        $this->dispatch('render')->to(ShowCategories::class);
        $this->dispatch('saved');
        $this->resetExcept('categoryCreate', 'categoryEdit');
    }

    //DELETE
    #[On('delete')]
    public function delete(Category $categoryId)
    {
        $categoryId->delete();

        $this->dispatch('render')->to(ShowCategories::class);
        //TOAST
        session()->flash('status', 'Categoría eliminada correctamente');
        session()->flash('accion', 'delete');
        $this->dispatch('saved');
    }

    //MODAL UPDATE
    #[On('edit-mode')]
    public function edit($id)
    {
        $this->editform = true;
        $this->open = true;
        $this->formtitle = "Editar categoría";
        $this->categoryEdit->edit($id);
    }

    public function render()
    {
        return view('livewire.categories.form-categories');
    }

    //MODAL RESET
    public function updatingOpen()
    {
        if ($this->open == true) {
            $this->resetExcept('categoryCreate', 'categoryEdit');
            $this->resetValidation();
            $this->categoryCreate->reset();
            $this->categoryEdit->reset();
        }
    }
}
