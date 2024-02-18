<x-app-layout>
    @push('pagetitle', 'Administración')
    <!--HEADER-->
    <div class="flex gap-4 px-5 py-3 items-center">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Panel') }}
        </h2>
    </div>
    <!--CONTENT-->
    <div class="bg-white shadow-lg rounded-lg p-4 mt-1">
        @can('dashboard')
            <div>
                @livewire('dashboard.show-dashboard')
            </div>
            <hr class="m-4">
            <!--CHARTS-->
            <div class="pt-6">
                @livewire('dashboard.show-charts')
            </div>
        @else
            <div class="w-full flex items-center justify-center h-screen pb-40">
                <p class="text-3xl">No tienes acceso al dashboard</p>
            </div>
        @endcan
    </div>
</x-app-layout>
