<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Role;


class ShowUsers extends Component
{
    use WithPagination;

    public $roles;

    //FILTERS
    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 10;

    protected $listeners = ['render'];

    public function render()
    {
        $users = User::where('users.name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('phone', 'like', '%' . $this->search . '%')

            ->orWhere('roles.name', 'like', '%' . $this->search . '%')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->orderBy($this->sort, $this->direction)
            ->select('users.*', 'roles.name as role_name') // Seleccionar campos necesarios
            ->paginate($this->cant);
        return view('livewire.users.show-users', compact('users'));
    }
    //RESET PAGE ON FILTERS
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingCant()
    {
        $this->resetPage();
    }
    //FILTERS ORDER
    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'desc';
        }
    }
}
