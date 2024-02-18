<div class="px-2 py-1">
    <!--TABLE-->
    <div>
        <table class="border border-gray-300 w-full text-left">
            <!--HEAD-->
            <thead class="bg-gray-700 text-white">
                <tr>
                    <th scope="col" class="capitalize p-3 cursor-pointer border border border-gray-600  w-1/6 ">
                        <span>ID</span>
                    </th>
                    <th scope="col" class="capitalize p-3 cursor-pointer border border-gray-600 w-1/2">
                        <span>Roles</span>
                    </th>
                    <th class="capitalize p-3 border border-gray-600 w-1/4">Acciones</th>
                </tr>
            </thead>
            <!--CONTENT-->
            @if ($roles->count())
                <tbody>
                    @foreach ($roles as $role)
                        <tr class="odd:bg-gray-100 even:bg-white">
                            <td class="p-3">{{ $role->id }}</td>
                            <td class="p-3">{{ $role->name }}</td>
                            <td class="p-3 flex">
                                @can('roles.edit')
                                    <x-button.yellow wire:click="$dispatch('edit-mode', {id:{{ $role->id }}})"
                                        class="mr-2">
                                        <i class="fas fa-edit fa-lg text-lg"></i>
                                    </x-button.yellow>
                                @endcan
                                @can('roles.destroy')
                                    <x-danger-button wire:click="$dispatch('delete-role', {{ $role->id }})">
                                        <i class="fas fa-times fa-lg text-lg px-1"></i>
                                    </x-danger-button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @else
                <!--EMPTY TABLE-->
                <tbody>
                    <tr>
                        <td class="p-3 text-center bg-gray-100" colspan="3">No se encontraron registros
                        </td>
                    </tr>
                </tbody>
            @endif
            <!--FOOTER-->
            @if ($roles->count() >= 11)
                <tfoot class="bg-gray-700 text-white">
                    <tr>
                        <th class="capitalize p-3 border border-gray-600">ID</th>
                        <th class="capitalize p-3 border border-gray-600">Roles</th>
                        <th class="capitalize p-3 border border-gray-600">Acciones</th>
                    </tr>
                </tfoot>
            @endif
        </table>
    </div>

    <!--ALERT DELETE-->
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('delete-role', roleId => {
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
                            roleId: roleId
                        })
                    }
                });
            })
        </script>
    @endpush

</div>
