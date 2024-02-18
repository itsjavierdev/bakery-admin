<?php

namespace App\Livewire\Forms\Roles;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Attributes\Rule;
use App\Models\Role;
use App\Models\Permission;

class EditFormRoles extends Form
{
     //ON EDIT
     public $role;
     public $role_id;

     //VALIDATION RULES
    #[Rule('required', as: 'permisos')]
     public $selectedPermissions; 
    //UNIQUE VALIDATION RULES
     public $name;
     public function rules(){
        return[
            'name' => 'required|min:3|max:15|alpha|unique:admin_connection.roles,name,' . $this->role_id
        ];
    }
    public function validationAttributes(){return['name'=>'rol'];}
 
     //MODAL UPDATE
     public function edit($id){
         $this->role=Role::findOrFail($id);
         $this->name=$this->role->name;
         $this->role_id=$this->role->id;
         //GET PERMISSIONS OF THE ROLE
         $this->selectedPermissions = Permission::join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
         ->where('role_has_permissions.role_id', $id)
         ->pluck('permissions.id')
         ->toArray();
     }
 
     //UPDATE
     public function update(){
        $this->validate();
        $role = Role::findOrFail($this->role->id);
        $role->update(['name' => $this->name]);
        //UPDATE PERMISSIONS
        $permissionNames = Permission::whereIn('id', $this->selectedPermissions)->pluck('name')->toArray();
        $role->syncPermissions($permissionNames);
        //TOAST
         session()->flash('status', 'Rol actualizadao correctamente');
         session()->flash('accion', 'update');
 
         $this->reset();
     }
}
