<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-4 py-2 h-8 bg-blue-700 rounded font-semibold text-white text-xs uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-800 active:bg-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-400 ']) }}>
    {{ $slot }}
</button>
