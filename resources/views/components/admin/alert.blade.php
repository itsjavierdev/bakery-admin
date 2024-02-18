@props(['action' => 'create'])

@php
    switch ($action) {
        case 'create':
            $background = 'bg-green-600';
            $hoverBackground = 'bg-green-800';
            $icon = 'check-circle';
            break;

        case 'delete':
            $background = 'bg-red-600';
            $hoverBackground = 'bg-red-800';
            $icon = 'times-circle';
            break;

        case 'update':
            $background = 'bg-orange-600';
            $hoverBackground = 'bg-orange-800';
            $icon = 'edit';
            break;

        default:
            $background = 'bg-green-600';
            $hoverBackground = 'bg-green-800';
            $icon = 'check-circle';
            break;
    }
@endphp

<div x-data="{ isOpen: true }" x-show.transition.out.duration.100ms="isOpen"
    {{ $attributes->merge(['class' => "text-white flex items-center justify-between p-3 rounded-lg $background"]) }}>
    <div class="flex gap-2 items-center">
        <i class="fas fa-{{ $icon }} fa-lg p-2"></i>
        <span>{{ $slot }}</span>
    </div>
    <div>
        <button @click="isOpen = false" class="hover:{{ $hoverBackground }} px-2 pt-2 pb-1 rounded-lg">
            <i class="fas fa-times fa-lg"></i>
        </button>
    </div>
</div>
