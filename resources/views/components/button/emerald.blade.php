<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-4 py-2 h-12 bg-emerald-500 rounded font-semibold text-white text-xs uppercase tracking-widest hover:bg-emerald-700 focus:bg-emerald-800 active:bg-emerald-800 focus:outline-none focus:ring-1 focus:ring-emerald-400 ']) }}>
    {{ $slot }}
</button>
