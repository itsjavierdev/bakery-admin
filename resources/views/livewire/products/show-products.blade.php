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
                <option value="category_id">Categoría</option>
                <option value="price">Precio</option>
                <option value="description">Descripción</option>
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
                    <th scope="col" wire:click="order('category_id')"
                        class="capitalize p-2 cursor-pointer border border-gray-600 w-1/7">
                        <span>Categoría</span>
                        @if ($sort == 'category_id')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="order('price')"
                        class="capitalize p-2 cursor-pointer border border-gray-600 w-1/7">
                        <span>Precio</span>
                        @if ($sort == 'price')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="order('description')"
                        class="capitalize p-2 cursor-pointer border border-gray-600 w-3/7">
                        <span>Descripción</span>
                        @if ($sort == 'description')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" class="capitalize p-2 border border-gray-600 w-1/7">
                        Imagen
                    </th>
                    <th class="capitalize p-3 border border-gray-600 w-1/7">Acciones</th>
                </tr>
            </thead>
            <!--CONTENT-->
            @if ($products->count())
                <tbody>
                    @foreach ($products as $product)
                        <tr class="odd:bg-gray-100 even:bg-white">
                            <td class="p-3">{{ $product->id }}</td>
                            <td class="p-3">{{ $product->name }}</td>
                            <td class="p-3">
                                {{ $product->category->name }}
                            </td>
                            <td class="p-3">Bs {{ $product->price }}</td>
                            <td class="p-3">{{ $product->description }}</td>
                            <td class="p-3">
                                <img src="{{ asset('storage/' . $product->featured) }}" alt="" width="100px"
                                    class="rounded-lg">
                            </td>
                            <td class="p-3 flex">
                                @can('products.edit')
                                    <x-button.yellow wire:click="$dispatch('edit-product', {id:{{ $product->id }}})"
                                        class="mr-2">
                                        <i class="fas fa-edit fa-lg text-lg"></i>
                                    </x-button.yellow>
                                @endcan
                                @can('products.destroy')
                                    <x-danger-button wire:click="$dispatch('delete-product', {{ $product->id }})">
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
                        <td class="p-3 text-center bg-gray-100" colspan="8">No se encontraron registros
                        </td>
                    </tr>
                </tbody>
            @endif
            <!--FOOTER-->
            @if ($products->count() >= 11)
                <tfoot class="bg-gray-700 text-white">
                    <tr>
                        <th class="capitalize p-3 border border-gray-600">ID</th>
                        <th class="capitalize p-3 border border-gray-600">Nombre</th>
                        <th class="capitalize p-3 border border-gray-600">Categoría</th>
                        <th class="capitalize p-3 border border-gray-600">Precio</th>
                        <th class="capitalize p-3 border border-gray-600">Decripción</th>
                        <th class="capitalize p-3 border border-gray-600">Imagen</th>
                        <th class="capitalize p-3 border border-gray-600">Acciones</th>
                    </tr>
                </tfoot>
            @endif
        </table>
    </div>
    <!--MOBILE SCREENS-->
    <div class="md:hidden ">
        @foreach ($products as $product)
            <div class="bg-gray-100 shadow-lg rounded-lg p-4 mt-1 mb-4">
                <div class="flex py-2">
                    <div class="flex flex-col gap-2 min-[500px]:w-4/5 w-3/5">
                        <div class="flex justify-between items-center gap-2">
                            <div class="flex flex-wrap gap-1">
                                <span class="text-blue-700 font-bold">#{{ $product->id }}</span>
                                <span class="font-semibold">{{ $product->name }}</span>
                            </div>
                            <span
                                class="text-white px-3 rounded-full bg-gray-600">{{ $product->category->name }}</span>
                        </div>
                        <span>{{ $product->description }}</span>
                        <span class="font-bold">Bs{{ $product->price }}</span>
                    </div>
                    <div class="min-[500px]:w-1/5 w-2/5 p-1">
                        <img width="130px" src="{{ asset('storage/' . $product->featured) }}" alt=""
                            class=" rounded-lg">
                    </div>
                </div>
                <div class="w-full flex">
                    @can('products.edit')
                        <x-button.yellow wire:click="$dispatch('edit-product', {id:{{ $product->id }}})"
                            class="mr-2 w-full h-8">
                            Editar
                        </x-button.yellow>
                    @endcan
                    @can('products.destroy')
                        <x-danger-button wire:click="$dispatch('delete-product', {{ $product->id }})" class="w-full">
                            eliminar
                        </x-danger-button>
                    @endcan
                </div>

            </div>
        @endforeach
    </div>
    <!--PAGINATION-->
    @if ($products->hasPages())
        <div class="px-6 py-3">
            {{ $products->links() }}
        </div>
    @endif

    <!--ALERT DELETE-->
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('delete-product', productId => {
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
                            productId: productId
                        })
                    }
                });
            })
        </script>
    @endpush

</div>
