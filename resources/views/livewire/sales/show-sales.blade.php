<div class="px-2 py-1">
    <!--DATATABLE PROPIERTIES-->
    <div class="flex justify-between flex-col md:flex-row py-4 gap-5">
        <!--SHOW ENTRIES-->
        <div class="flex items-center gap-3">
            <span>Mostrar</span>
            <select wire:model.live="cant" class="border-gray-300 rounded-md shadow-sm w-full">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <span>entradas</span>
        </div>
        <div class="md:hidden flex gap-2">
            <select wire:model.live="sort" class="border-gray-300 rounded-md shadow-sm w-full">
                <option value="sales.id">Ordenar por: ID</option>
                <option value="sales.created_at">Fecha</option>
                <option value="users.name">Nombre del cliente</option>
                <option value="users.phone">Telefono</option>
                <option value="sales.total">Monto</option>
            </select>
            <select wire:model.live="direction" class="border-gray-300 rounded-md shadow-sm w-full">
                <option value="desc">Z-A</option>
                <option value="asc">A-Z</option>
            </select>
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
                    <th scope="col" wire:click="order('sales.id')"
                        class="capitalize p-2 cursor-pointer border border-gray-600 w-1/7">
                        <span>ID</span>
                        <!--Sort content-->
                        @if ($sort == 'sales.id')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1 "></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="order('sales.created_at')"
                        class="capitalize p-2 cursor-pointer border border-gray-600 w-1/7">
                        <span>Fecha</span>
                        <!--Sort content-->
                        @if ($sort == 'sales.created_at')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1 "></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="order('users.name')"
                        class="capitalize p-2 cursor-pointer border border-gray-600 w-1/7">
                        <span>Datos Cliente</span>
                        <!--Sort content-->
                        @if ($sort == 'users.name')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1 "></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="order('sales.total')"
                        class="capitalize p-2 cursor-pointer border border-gray-600 w-2/7">
                        <span>Total</span>
                        <!--Sort content-->
                        @if ($sort == 'sales.total')
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1 "></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th class="capitalize p-3 border border-gray-600 w-2/7">Acciones</th>
                </tr>
            </thead>
            <!--CONTENT-->
            @if ($saleClients->count())
                <tbody>
                    @foreach ($saleClients as $saleClient)
                        <tr class="odd:bg-gray-100 even:bg-white">
                            <td class="p-3">
                                {{ $saleClient->id }}
                            </td>
                            <td class="p-3">
                                {{ $saleClient->created_at }}
                            </td>
                            <td class="p-3">
                                <p>{{ $saleClient->name }}</p>
                                <p>{{ $saleClient->phone }}</p>
                            </td>
                            <td class="p-3">
                                Bs {{ $saleClient->total }}
                            </td>
                            <td class="p-3">
                                <x-button.emerald wire:click="$dispatch('detail', {id:{{ $saleClient->id }}})">
                                    <i class="fas fa-bars fa-lg text-lg px-1"></i>
                                </x-button.emerald>
                                <x-danger-button wire:click="$dispatch('delete-sale', {{ $saleClient->id }})">
                                    <i class="fas fa-times fa-lg text-lg px-1"></i>
                                </x-danger-button>
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
            @if ($saleClients->count() >= 25)
                <tfoot class="bg-gray-700 text-white">
                    <tr>
                        <th class="capitalize p-3 border border-gray-600">ID</th>
                        <th class="capitalize p-3 border border-gray-600">Fecha</th>
                        <th class="capitalize p-3 border border-gray-600">Datos Cliente</th>
                        <th class="capitalize p-3 border border-gray-600">Total</th>
                        <th class="capitalize p-3 border border-gray-600">Acciones</th>
                    </tr>
                </tfoot>
            @endif
        </table>
    </div>
    <div class="md:hidden ">
        @foreach ($saleClients as $saleClient)
            <div class="bg-gray-100 shadow-lg rounded-lg p-4 mt-1 mb-4">
                <div class="flex flex-col gap-2">
                    <div class="flex justify-between items-center gap-2">
                        <div class="">
                            <span class="text-blue-700 font-bold">#{{ $saleClient->id }}</span>
                            <span>{{ $saleClient->created_at }}</span>
                        </div>
                    </div>
                    <p>{{ $saleClient->name }}</p>
                    <p>{{ $saleClient->phone }}</p>
                    <span class="font-bold">Bs{{ $saleClient->total }}</span>
                </div>
                <div class="w-full flex gap-2">
                    <x-button.emerald class="w-full h-8"
                        wire:click="$dispatch('detail', {id:{{ $saleClient->id }}})">Detalle
                    </x-button.emerald>
                    @can('sales.destroy')
                        <x-danger-button wire:click="$dispatch('delete-sale', {{ $saleClient->id }})" class="w-full">
                            Eliminar
                        </x-danger-button>
                    @endcan
                </div>

            </div>
        @endforeach
    </div>
    <!--PAGINATION-->
    @if ($saleClients->hasPages())
        <div class="px-6 py-3">
            {{ $saleClients->links() }}
        </div>
    @endif

    <!--MODAL DETAIL ORDER-->
    @livewire('sales.show-detail-sales')

    <!--TOAST-->
    <x-action-message on="saved">
        @if (session('status'))
            <x-admin.alert action="{{ session('accion') }}">
                {{ session('status') }}
            </x-admin.alert>
        @endif
    </x-action-message>

    <!--ALERT DELETE-->
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('delete-sale', saleId => {
                console.log(saleId)
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
                        Livewire.dispatch('delete', {
                            saleId: saleId
                        })
                    }
                });
            })
        </script>
    @endpush

</div>
