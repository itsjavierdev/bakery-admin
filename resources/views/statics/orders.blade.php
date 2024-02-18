<x-app-layout>
    @push('pagetitle', 'Pedidos - Admin')
    <!--HEADER-->
    <div class="flex gap-4 px-5 py-3 items-center">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Pedidos') }}
        </h2>
    </div>
    <!--CONTENT-->
    <div class="bg-white shadow-lg rounded-lg p-4 mt-1">
        <h3 class="pb-3 px-2">Listado de pedidos</h3>
        <hr>
        @livewire('orders.show-orders')
    </div>
</x-app-layout>
