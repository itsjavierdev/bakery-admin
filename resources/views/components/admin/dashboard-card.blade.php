@props([
    'title' => 'Ventas',
    'quantity' => '20',
    'icon' => 'truck',
    'colorHead' => 'bg-green-800',
    'colorBody' => 'bg-green-700',
])

<div class="flex text-white w-72">
    <div class="{{ $colorHead }}  p-5 rounded-s flex gap-1 items-center">
        {{ $slot }}
        <i class="fas fa-{{ $icon }} fa-lg text-3xl"></i>
    </div>
    <div class="{{ $colorBody }}  p-3 rounded-e w-full">
        <h2>{{ $title }}</h2>
        <span class="font-bold text-xl">{{ $quantity }}</span>
    </div>
</div>
