<div>
    <x-dialog-modal wire:model="open">
        <x-slot name=title>Detalles del pedido</x-slot>
        <x-slot name='content'>
            @if ($open)
                <!--TABLE-->
                <table class="border border-gray-100 w-full text-left">
                    <!--HEAD-->
                    <thead class="bg-gray-700 text-white p-5">
                        <tr>
                            <th scope="col" class="capitalize p-2 border border-gray-600 w-2/5">Producto</th>
                            <th scope="col" class="capitalize p-2 border border-gray-600 w-1/5">Precio</th>
                            <th scope="col" class="capitalize p-2 border border-gray-600 w-1/5">Cantidad</th>
                            <th scope="col" class="capitalize p-2 border border-gray-600 w-1/5">Subtotal</th>
                        </tr>
                    </thead>
                    <!--CONTENT-->
                    <tbody>
                        @foreach ($saleDetails as $saleDetail)
                            <tr class="odd:bg-gray-100 even:bg-white">
                                <td class="p-3">
                                    {{ $saleDetail->name }}
                                </td>
                                <td class="p-3">
                                    Bs {{ $saleDetail->price }}
                                </td>
                                <td class="p-3">
                                    {{ $saleDetail->quantity }}
                                </td>
                                <td class="p-3">
                                    Bs {{ $saleDetail->subtotal }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    <!--TOTAL-->
                    <tfoot class="text-blue-600">
                        <tr>
                            <th colspan="2" class="capitalize p-3">TOTALES</th>
                            <th colspan="1" class="capitalize p-3"> {{ $saleTotals->total_quantity }}</th>
                            <th colspan="1" class="capitalize p-3">Bs {{ $saleTotals->total }}</th>
                        </tr>
                    </tfoot>
                </table>
            @endif
        </x-slot>
        <!--CLOSE MODAL-->
        <x-slot name='footer'>
            <x-secondary-button wire:click="$set('open', false)">
                Cerrar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
