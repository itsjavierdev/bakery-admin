<!-- NAVIGATION LINKS -->
<div class="w-full flex flex-col gap-1 px-1 py-2">
    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>
    @can('categories.index')
        <x-nav-link href="{{ route('categories') }}" :active="request()->routeIs('categories')">
            {{ __('Categorías') }}
        </x-nav-link>
    @endcan
    @can('products.index')
        <x-nav-link href="{{ route('products') }}" :active="request()->routeIs('products')">
            {{ __('Productos') }}
        </x-nav-link>
    @endcan
    @can('orders.index')
        <x-nav-link href="{{ route('orders') }}" :active="request()->routeIs('orders')">
            {{ __('Pedidos') }}
        </x-nav-link>
    @endcan
    @can('sales.index')
        <x-nav-link href="{{ route('sales') }}" :active="request()->routeIs('sales')">
            {{ __('Ventas') }}
        </x-nav-link>
    @endcan
    @can('users.index')
        <x-nav-link href="{{ route('users') }}" :active="request()->routeIs('users')">
            {{ __('Usuarios') }}
        </x-nav-link>
    @endcan
    @can('roles.index')
        <x-nav-link href="{{ route('roles') }}" :active="request()->routeIs('roles')">
            {{ __('Roles') }}
        </x-nav-link>
    @endcan
</div>
