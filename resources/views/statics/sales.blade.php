<x-app-layout>

    @push('pagetitle', 'Ventas - Admin')
    <!--HEADER-->
    <div class="flex gap-4 px-5 py-3 items-center">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Ventas') }}
        </h2>
    </div>
    <!--CONTENT-->
    <div class="bg-white shadow-lg rounded-lg p-4 mt-1">
        <h3 class="pb-3 px-2">Listado de ventas</h3>
        <hr>
        @livewire('sales.show-sales')
    </div>
</x-app-layout>
