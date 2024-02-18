<div class="px-2 py-1">
    <!--DATATABLE PROPIERTIES-->
    <div class="flex justify-between flex-col md:flex-row gap-5 py-4">
        <!--SHOW ENTRIES-->
        <div class="flex items-center gap-3">
            <span>Mostrar</span>
            <x-input.admin-select wire:model.live="cant">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </x-input.admin-select>
            <span>entradas</span>
        </div>
        <!--ORDER BY MOBILE SCREENS-->
        <div class="md:hidden flex gap-2">
            <x-input.admin-select wire:model.live="sort">
                <option value="id">Ordenar por: ID</option>
                <option value="name">Nombre</option>
            </x-input.admin-select>
            <x-input.admin-select wire:model.live="direction">
                <option value="desc">Z-A</option>
                <option value="asc">A-Z</option>
            </x-input.admin-select>
        </div>
        <!--SEARCH BUTTON-->
        <div class="flex items-center gap-3">
            <spa class="hidden md:block">Buscar:</spa>
            <x-input wire:model.live="search" class="w-full" placeholder="Buscar" />
        </div>
    </div>
    <!--TABLE-->
    <div class="hidden md:block">
        <table class="border border-gray-300 w-full text-left">
            <!--HEAD-->
            <thead class="bg-gray-700 text-white">
                <tr>
                    <th scope="col" wire:click="order('id')"
                        class="capitalize p-2 cursor-pointer border border-gray-600 w-1/7">
                        <span>ID</span>
                        <!--Sort content-->
                        @if ($sort == 'id')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1 "></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="order('name')"
                        class="capitalize p-2 cursor-pointer border border-gray-600 w-1/7">
                        <span>Nombre</span>
                        @if ($sort == 'name')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="order('email')"
                        class="capitalize p-2 cursor-pointer border border-gray-600 w-1/7">
                        <span>Email</span>
                        @if ($sort == 'email')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="order('phone')"
                        class="capitalize p-2 cursor-pointer border border-gray-600 w-1/7">
                        <span>telefono</span>
                        @if ($sort == 'phone')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="order('role_name')"
                        class="capitalize p-2 cursor-pointer border border-gray-600 w-1/7">
                        <span>Rol</span>
                        @if ($sort == 'role_name')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th class="capitalize p-3 border border-gray-600 w-1/7">Acciones</th>
                </tr>
            </thead>
            <!--CONTENT-->
            @if ($users->count())
                <tbody>
                    @foreach ($users as $user)
                        @if (auth()->user() && $user->id === auth()->user()->id)
                            {{-- Omitir el usuario autenticado --}}
                        @else
                            <tr class="odd:bg-gray-100 even:bg-white">
                                <td class="p-3">{{ $user->id }}</td>
                                <td class="p-3">{{ $user->name }}</td>
                                <td class="p-3">
                                    {{ $user->email }}
                                </td>
                                <td class="p-3">{{ $user->phone }}</td>
                                <td class="p-3">
                                    {{ $user->role_name }}
                                </td>
                                <td class="p-3 flex">
                                    @can('users.edit')
                                        <x-button.yellow wire:click="$dispatch('edit-user', {id:{{ $user->id }}})"
                                            class="mr-2">
                                            <i class="fas fa-edit fa-lg text-lg"></i>
                                        </x-button.yellow>
                                    @endcan
                                    @can('users.destroy')
                                        <x-danger-button wire:click="$dispatch('delete-user', {{ $user->id }})">
                                            <i class="fas fa-times fa-lg text-lg px-1"></i>
                                        </x-danger-button>
                                    @endcan
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            @else
                <!--EMPTY TABLE-->
                <tbody>
                    <tr>
                        <td class="p-3 text-center bg-gray-100" colspan="8">No se encontraron registros
                        </td>
                    </tr>
                </tbody>
            @endif
            <!--FOOTER-->
            @if ($users->count() >= 11)
                <tfoot class="bg-gray-700 text-white">
                    <tr>
                        <th class="capitalize p-3 border border-gray-600">ID</th>
                        <th class="capitalize p-3 border border-gray-600">Nombre</th>
                        <th class="capitalize p-3 border border-gray-600">Email</th>
                        <th class="capitalize p-3 border border-gray-600">Telefono</th>
                        <th class="capitalize p-3 border border-gray-600">Rol</th>
                        <th class="capitalize p-3 border border-gray-600">Acciones</th>
                    </tr>
                </tfoot>
            @endif
        </table>
    </div>
    <!--MOBILE SCREENS-->
    <div class="md:hidden ">
        @foreach ($users as $user)
            @if (auth()->user() && $user->id === auth()->user()->id)
                {{-- Omitir el usuario autenticado --}}
            @else
                <div class="bg-gray-100 shadow-lg rounded-lg p-4 mt-1 mb-4">
                    <div class="flex flex-col gap-2">
                        <div class="flex justify-between items-center gap-2">
                            <div class="">
                                <span class="text-blue-700 font-bold">#{{ $user->id }}</span>
                                <span class="font-bold">{{ $user->name }}</span>
                            </div>
                            <span class="bg-gray-700 text-white py-1 px-3 rounded-full">{{ $user->role_name }}</span>
                        </div>
                        <p>{{ $user->email }}</p>
                        <p class="mb-2">{{ $user->phone }}</p>
                    </div>
                    <div class="w-full flex gap-2">
                        @can('users.edit')
                            <x-button.yellow wire:click="$dispatch('edit-user', {id:{{ $user->id }}})"
                                class="w-full h-8">
                                Editar
                            </x-button.yellow>
                        @endcan
                        @can('users.destroy')
                            <x-danger-button wire:click="$dispatch('delete-user', {{ $user->id }})" class="w-full">
                                Eliminar
                            </x-danger-button>
                        @endcan
                    </div>

                </div>
            @endif
        @endforeach
    </div>
    <!--PAGINATION-->
    @if ($users->hasPages())
        <div class="px-6 py-3">
            {{ $users->links() }}
        </div>
    @endif

    @livewire('users.form-users')

    <!--ALERT DELETE-->
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('delete-user', userId => {
                console.log('hola')
                Swal.fire({
                    title: "¿Estas seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.dispatch('delete', {
                            userId: userId
                        })
                    }
                });
            })
        </script>
    @endpush

</div>
