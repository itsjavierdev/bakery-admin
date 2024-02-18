<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use App\Livewire\Forms\Roles\CreateFormRoles;
use App\Livewire\Forms\Roles\EditFormRoles;
use App\Models\Permission;
use App\Models\Role;
use Livewire\Attributes\On;

class FormRoles extends Component
{
    //FORM OBJECT
    public CreateFormRoles $rolCreate;
    public EditFormRoles $rolEdit;

    //MODAL
    public $formtitle = "Crear nueva ROL";
    public $editform = false;
    public $open = false;

    public $permissions;
     //SAVE
     public function save()
     {
         $this->rolCreate->save();
         $this->dispatch('render')->to(ShowRoles::class);
         $this->dispatch('saved');
         $this->resetExcept('rolCreate', 'rolEdit','permissions');
     }
 
     //UPDATE
     public function update()
     {
         $this->rolEdit->update();
         $this->updatingOpen();
         $this->dispatch('render')->to(ShowRoles::class);
         $this->dispatch('saved');
         $this->resetExcept('rolCreate', 'rolEdit','permissions');
     }
 
     //DELETE
     #[On('delete')]
     public function delete(Role $roleId)
     {
         $roleId->delete();
 
         $this->dispatch('render')->to(ShowRoles::class);
        //TOAST
         session()->flash('status', 'Rol eliminado correctamente');
         session()->flash('accion', 'delete');
         $this->dispatch('saved');
     }
 
     //MODAL UPDATE
     #[On('edit-mode')]
     public function edit($id)
     {
         $this->editform = true;
         $this->open = true;
         $this->formtitle = "Editar rol";
         $this->rolEdit->edit($id);
     }
 
     public function render()
     {  
         return view('livewire.roles.form-roles');
     }
     //SHOW PERMISSIONS
     public function mount(){
        $this->permissions=Permission::all();
     }
 
     //MODAL RESET
     public function updatingOpen()
     {
         if ($this->open == true) {
             $this->resetExcept('rolCreate', 'rolEdit','permissions');
             $this->resetValidation();
             $this->rolCreate->reset();
             $this->rolEdit->reset();
         }
     }
}
