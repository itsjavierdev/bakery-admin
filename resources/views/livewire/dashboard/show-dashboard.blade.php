<div class="flex gap-5 flex-wrap justify-center p-10">
    <x-admin.dashboard-card colorHead="bg-red-800" colorBody="bg-red-700" title="Pedidos" quantity="{{ $totalOrders }}"
        icon="truck"></x-admin.dashboard-card>

    <x-admin.dashboard-card colorHead="bg-green-600" colorBody="bg-green-500" title="Ingresos del día"
        quantity="Bs{{ $totalIncomeToday }}" icon="dollar-sign"></x-admin.dashboard-card>

    <x-admin.dashboard-card colorHead="bg-green-800" colorBody="bg-green-700" title="Ingresos de ayer"
        quantity="Bs{{ $totalIncomeYesterday }}" icon="dollar-sign"><i
            class="fas fa-chevron-left fa-lg text-xs"></i></x-admin.dashboard-card>

    <x-admin.dashboard-card colorHead="bg-blue-600" colorBody="bg-blue-500" title="Productos vendidos"
        quantity="{{ $totalProductsSoldToday }}" icon="chart-line"></x-admin.dashboard-card>

    <x-admin.dashboard-card colorHead="bg-blue-800" colorBody="bg-blue-700" title="Productos vendidos ayer"
        quantity="{{ $totalProductsSoldYesterday }}" icon="chart-line"> <i
            class="fas fa-chevron-left fa-lg text-xs"></i></x-admin.dashboard-card>

    <x-admin.dashboard-card colorHead="bg-violet-600" colorBody="bg-violet-500" title="Ventas del día"
        quantity="{{ $individualSalesToday }}" icon="shopping-cart"></x-admin.dashboard-card>

    <x-admin.dashboard-card colorHead="bg-violet-800" colorBody="bg-violet-700" title="Ventas de ayer"
        quantity="{{ $individualSalesYesterday }}" icon="shopping-cart"><i
            class="fas fa-chevron-left fa-lg text-xs"></i></x-admin.dashboard-card>

    <x-admin.dashboard-card colorHead="bg-rose-800" colorBody="bg-rose-700" title="Productos"
        quantity="{{ $totalProducts }}" icon="boxes"></x-admin.dashboard-card>

    <x-admin.dashboard-card colorHead="bg-orange-600" colorBody="bg-orange-500" title="Clientes"
        quantity="{{ $countUsersWithSales }}" icon="user"></x-admin.dashboard-card>

    <x-admin.dashboard-card colorHead="bg-orange-800" colorBody="bg-orange-700" title="Usuarios"
        quantity="{{ $totalUsers }}" icon="user"></x-admin.dashboard-card>
</div>
