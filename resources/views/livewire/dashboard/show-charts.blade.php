<div class="md:flex flex-wrap justify-center block gap-5 mb-5">
    <div class="w-full max-w-2xl min-w-md bg-gray-100 rounded-lg shadow p-5 mb-5">
        <!--PRODUCTS BEST SELLER CHART-->
        <div class="{{ $chartProduct == 'sellingDesc' ? '' : 'hidden' }}">
            @livewire('dashboard.products.products-most-popular')
        </div>
        <!--PRODUCTS LEAST SELLER CHART-->
        <div {{ $chartProduct == 'sellingAsc' ? '' : 'hidden' }}>
            @livewire('dashboard.products.products-less-popular')
        </div>
        <!--HIGH REVENUE PRODUCTS CHART-->
        <div {{ $chartProduct == 'revenueDesc' ? '' : 'hidden' }}>
            @livewire('dashboard.products.high-revenue-products')
        </div>
        <!--LOW REVENUE PRODUCTS CHART-->
        <div {{ $chartProduct == 'revenueAsc' ? '' : 'hidden' }}>
            @livewire('dashboard.products.low-revenue-products')
        </div>
        <div class="pt-5">
            <!--PRODUCT BEST SELLER BUTTONS-->
            @if ($chartProduct == 'sellingDesc')
                <x-button.dark class="h-8 text-xs" wire:click="$set('chartProduct', 'sellingDesc')">Mas
                    vendidos</x-button.dark>
            @else
                <x-secondary-button wire:click="$set('chartProduct', 'sellingDesc')">Mas
                    vendidos</x-secondary-button>
            @endif
            <!--PRODUCTS LEAST SELLER BUTTONS-->
            @if ($chartProduct == 'sellingAsc')
                <x-button.dark class="h-8 text-xs" wire:click="$set('chartProduct', 'sellingAsc')">Menos
                    vendidos</x-button.dark>
            @else
                <x-secondary-button wire:click="$set('chartProduct', 'sellingAsc')">Menos
                    vendidos</x-secondary-button>
            @endif
            <!--HIGH REVENUE PRODUCTS BUTTONS-->
            @if ($chartProduct == 'revenueDesc')
                <x-button.dark class="h-8 text-xs" wire:click="$set('chartProduct', 'revenueDesc')">Mas
                    ingresos</x-button.dark>
            @else
                <x-secondary-button wire:click="$set('chartProduct', 'revenueDesc')">Mas
                    ingresos</x-secondary-button>
            @endif
            <!--LOW REVENUE PRODUCTS BUTTONS-->
            @if ($chartProduct == 'revenueAsc')
                <x-button.dark class="h-8 text-xs" wire:click="$set('chartProduct', 'revenueAsc')">Menos
                    ingresos</x-button.dark>
            @else
                <x-secondary-button wire:click="$set('chartProduct', 'revenueAsc')">Menos
                    ingresos</x-secondary-button>
            @endif
        </div>
    </div>
    <div class="w-full max-w-2xl min-w-md bg-gray-100 rounded-lg shadow p-5 mb-5">
        <!--SALES LAST YEAR CHART-->
        <div class="{{ $chartSales == 'year' ? '' : 'hidden' }}">
            @livewire('dashboard.sales.sales-last-year')
        </div>
        <!--SALES LAST MONTH CHART-->
        <div class="{{ $chartSales == 'month' ? '' : 'hidden' }}">
            @livewire('dashboard.sales.sales-last-month')
        </div>
        <!--SALES LAST WEEK CHART-->
        <div class="{{ $chartSales == 'week' ? '' : 'hidden' }}">
            @livewire('dashboard.sales.sales-last-week')
        </div>
        <div class="pt-5">
            <!--SALES LAST YEAR BUTTONS-->
            @if ($chartSales == 'year')
                <x-button.dark class="h-8 text-xs" wire:click="$set('chartSales', 'year')">ULTIMO
                    AÑO</x-button.dark>
            @else
                <x-secondary-button wire:click="$set('chartSales', 'year')">ULTIMO AÑO</x-secondary-button>
            @endif
            <!--SALES LAST MONTH BUTTONS-->
            @if ($chartSales == 'month')
                <x-button.dark class="h-8 text-xs" wire:click="$set('chartSales', 'month')">ULTIMO
                    MES</x-button.dark>
            @else
                <x-secondary-button wire:click="$set('chartSales', 'month')">ULTIMO MES</x-secondary-button>
            @endif
            <!--SALES LAST WEEK BUTTONS-->
            @if ($chartSales == 'week')
                <x-button.dark class="h-8 text-xs" wire:click="$set('chartSales', 'week')">ULTIMA
                    SEMANA</x-button.dark>
            @else
                <x-secondary-button wire:click="$set('chartSales', 'week')">ULTIMA SEMANA</x-secondary-button>
            @endif

        </div>
    </div>
</div>
