<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class FormUsers extends Component
{
    //MODAL
    public $open = false;

    //SHOW USER, ROLES, UNIQUE VALIDATION
    public $users;
    public $user;
    public $user_id;
    public $roles;

    //INPUTS AND VALIDATIONS
    public $email;
    public $phone;

    #[Rule('required', as: 'usuario')]
    public $name;

    #[Rule('required', as: 'rol')]
    public $rol_id;

    public function rules()
    {
        return [
            'phone' => 'required|numeric|max:80000000|unique:admin_connection.users,phone,' . $this->user_id,
            'email' => 'required|string|email|max:255|unique:admin_connection.users,email,' . $this->user_id
        ];
    }



    //UPDATE
    public function update()
    {
        $this->validate();
        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        $this->user->roles()->sync($this->rol_id);

        //TOAST
        session()->flash('status', 'Usuario actualizado correctamente');
        session()->flash('accion', 'update');

        $this->resetExcept('roles');

        $this->updatingOpen();
        $this->dispatch('render')->to(ShowUsers::class);
        $this->dispatch('saved');
    }

    //MODAL UPDATE
    #[On('edit-user')]
    public function edit($id)
    {
        $this->user = User::findOrFail($id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->user_id = $this->user->id;

        $this->open = true;
    }

    #[On('delete')]
    public function delete(User $userId)
    {
        $userId->roles()->detach();
        // Elimina el producto
        $userId->delete();

        $this->dispatch('render')->to(ShowUsers::class);

        //TOAST
        session()->flash('status', 'Usuario eliminado correctamente');
        session()->flash('accion', 'delete');
        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.users.form-users');
    }
    //MOUNT ROLES
    public function mount()
    {

        $this->roles = Role::all();
    }

    //MODAL RESET
    public function updatingOpen()
    {
        if ($this->open == true) {
            $this->resetExcept('roles');
            $this->resetValidation();
        }
    }
}
