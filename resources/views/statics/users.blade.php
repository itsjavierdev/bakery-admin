<x-app-layout>

    @push('pagetitle', 'Usuarios - Admin')
    <!--HEADER-->
    <div class="flex gap-4 px-5 py-3 items-center">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Usuarios') }}
        </h2>
        @can('users.create')
            <a href="{{ route('register') }}">
                <x-button.blue>
                    Crear
                </x-button.blue>
            </a>
        @endcan
    </div>
    <!--CONTENT-->
    <div class="bg-white shadow-lg rounded-lg p-4 mt-1">
        <h3 class="pb-3 px-2">Listado de usuarios</h3>
        <hr>
        @livewire('users.show-users')
    </div>
</x-app-layout>
