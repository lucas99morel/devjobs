<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-3 py-1.5 bg-indigo-700 rounded-md text-white font-bold hover:bg-indigo-600 hover:dark:bg-indigo-800']) }}>
    {{ $slot }}
</button>
