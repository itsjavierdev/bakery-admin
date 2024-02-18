@props(['on'])

<div x-data="{ shown: false, timeout: null }" x-init="@this.on('{{ $on }}', () => {
    clearTimeout(timeout);
    shown = true;
    timeout = setTimeout(() => { shown = false }, 2000);
})" x-show.transition.out.opacity.duration.1500ms="shown"
    x-transition:leave.opacity.duration.100ms style="display: none;"
    {{ $attributes->merge(['class' => 'w-full max-w-md fixed']) }}>
    {{ $slot->isEmpty() ? 'Saved.' : $slot }}
</div>
<style>
    @media (min-width: 640px) {

        /* Estilo para pantallas medianas y grandes */
        .max-w-md {
            right: 20px;
            top: 65px;
        }
    }

    @media (max-width: 768px) {

        /* Estilo para pantallas pequeñas */
        .max-w-md {
            left: 50%;
            transform: translateX(-50%);
            top: 120px;
            /* Ajusta la distancia desde la parte superior según tus necesidades */
        }
    }
</style>
