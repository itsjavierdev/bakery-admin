<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use App\Models\Role;

class ShowRoles extends Component
{
    public $roles;

    protected $listeners = ['render'];

    public function render()
    {
        $this->roles = Role::orderBy('id', 'desc')->get();
        return view('livewire.roles.show-roles');
    }
}
