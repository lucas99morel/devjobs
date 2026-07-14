<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis vacantes') }}
        </h2>
    </x-slot>

    
    <div class="p-2">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @if (session('mensaje'))
                <div class="py-2">
                    <p class="p-2 bg-green-700 border-l-4 border-green-400 text-white text-sm">
                        {{ session('mensaje') }}
                    </p>
                </div>
            @endif

            <livewire:mostrar-vacante />
        </div>
    </div>
</x-app-layout>
