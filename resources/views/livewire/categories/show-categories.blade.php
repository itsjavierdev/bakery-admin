<div class="px-2 py-1">
    <!--DATATABLE PROPERTIES-->
    <div class="flex justify-between flex-col  md:flex-row py-4 gap-5">
        <!--Show entries-->
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
        <!--Search button-->
        <div class="flex items-center gap-3">
            <spa class="hidden md:block">Buscar:</spa>
            <x-input wire:model.live="search" class="w-full" placeholder="Buscar" />
        </div>
    </div>
    <!--TABLE-->
    <div>
        <table class="border border-gray-300 w-full text-left">
            <!--HEAD-->
            <thead class="bg-gray-700 text-white">
                <tr>
                    <th scope="col" wire:click="order('id')"
                        class="capitalize p-3 cursor-pointer border border border-gray-600  w-1/6 ">
                        <span>ID</span>
                        <!--SORT CONTENT-->
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
                        class="capitalize p-3 cursor-pointer border border-gray-600 w-1/2">
                        <span>Categoría</span>
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
                    <th class="capitalize p-3 border border-gray-600 w-1/4">Acciones</th>
                </tr>
            </thead>
            <!--CONTENT-->
            @if ($categories->count())
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="odd:bg-gray-100 even:bg-white">
                            <td class="p-3">{{ $category->id }}</td>
                            <td class="p-3">{{ $category->name }}</td>
                            <td class="p-3 flex">
                                @can('categories.edit')
                                    <x-button.yellow wire:click="$dispatch('edit-mode', {id:{{ $category->id }}})"
                                        class="mr-2">
                                        <i class="fas fa-edit fa-lg text-lg"></i>
                                    </x-button.yellow>
                                @endcan
                                @can('categories.destroy')
                                    <x-danger-button wire:click="$dispatch('delete-category', {{ $category->id }})">
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
            @if ($categories->count() >= 11)
                <tfoot class="bg-gray-700 text-white">
                    <tr>
                        <th class="capitalize p-3 border border-gray-600">ID</th>
                        <th class="capitalize p-3 border border-gray-600">Categoría</th>
                        <th class="capitalize p-3 border border-gray-600">Acciones</th>
                    </tr>
                </tfoot>
            @endif
        </table>
    </div>


    <!--PAGINATION-->
    @if ($categories->hasPages())
        <div class="px-6 py-3">
            {{ $categories->links() }}
        </div>
    @endif

    <!--ALERT DELETE-->
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('delete-category', categoryId => {
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
                            categoryId: categoryId
                        })
                    }
                });
            })
        </script>
    @endpush

</div>
