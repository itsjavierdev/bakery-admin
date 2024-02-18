<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-4 py-2 h-14 bg-font-primary rounded font-semibold text-white uppercase tracking-widest hover:bg-gray-900 focus:bg-black active:bg-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-500 ']) }}>
    {{ $slot }}
</button>
