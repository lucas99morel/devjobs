<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-6 px-2">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="divide-y divide-gray-400"></div>
                    @forelse ($notificaciones as $notificacion)
                        <div class="p-5 sm:flex justify-between items-center">
                            <div>
                                <p>Tienes un nuevo candidato para:
                                    <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span>
                                </p>

                                <p>
                                    <span class="font-bold">{{ $notificacion->created_at->diffForhumans() }}</span>
                                </p>
                            </div>
                            <div class="mt-5 lg:mt-0">
                                <a href="{{route('candidatos.index', $notificacion->data['id_vacante'])}}" class="bg-indigo-600 p-3 text-sm uppercase font-bold text-white rounded-lg">
                                    Ver Candidatos
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="flex justify-center items-center font-bold dark:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                            </svg>
                            <p class="p-3 text-center text-lg text-gray-800 dark:text-white">No hay nuevas Notificaciones</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
