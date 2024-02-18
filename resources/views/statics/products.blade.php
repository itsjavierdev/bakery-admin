<x-app-layout>

    @push('pagetitle', 'Productos - Admin')
    <!--HEAFER-->
    <div class="flex gap-4 px-5 py-3 items-center">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Productos') }}
        </h2>
        @can('products.create')
            @livewire('products.form-products')
        @endcan
    </div>
    <!--CONTENT-->
    <div class="bg-white shadow-lg rounded-lg p-4 mt-1">
        <h3 class="pb-3 px-2">Listado de productos</h3>
        <hr>
        @livewire('products.show-products')
    </div>
</x-app-layout>
