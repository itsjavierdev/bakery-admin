<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-4 py-2 h-12 bg-yellow-400 rounded font-semibold text-white text-xs uppercase tracking-widest hover:bg-yellow-500 focus:bg-yellow-500  active:bg-yellow-700 focus:outline-none focus:ring-1 focus:ring-yellow-400 ']) }}>
    {{ $slot }}
</button>
