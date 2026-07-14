<x-app-layout>
    <h2 class="text-center text-3xl leading-8 font-extrabold tracking-tight text-indigo-600 sm:text-4xl my-5">
        Vacante: <span class="text-gray-900 dark:text-white">{{$vacante->titulo}}</span>
    </h2>
    <div class="pb-6 px-2">
        <div class="max-w-5xl mx-auto sm:px-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <livewire:show-vacante :vacante="$vacante"/>
            </div>
        </div>
    </div>
</x-app-layout>
