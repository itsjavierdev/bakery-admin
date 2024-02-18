<?php

namespace App\Livewire\Forms\Roles;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Attributes\Rule;
use App\Models\Role;
use App\Models\Permission;

class CreateFormRoles extends Form
{
    #[Rule('required|min:3|max:15|alpha|unique:admin_connection.roles,name', as: 'rol')]
    public $name;

    #[Rule('required', as: 'permisos')]
    public $selectedPermissions=[];

    //CREATE
    public function save(){
        $this->validate();
        $rol=Role::create([
            'name'=>$this->name,
            'guard_name'=>'web'
        ]);
        if (!empty($this->selectedPermissions)) {
            //FILTERED DUPLICATED
            $uniquePermissions = array_unique($this->selectedPermissions);
            //ADD PERMISSIONS TO ROL
            $rol->permissions()->attach($uniquePermissions);
        }
        //TOAST
        session()->flash('status', 'Rol agregado correctamente');
        session()->flash('accion', 'create');

        $this->reset();
    }
}
