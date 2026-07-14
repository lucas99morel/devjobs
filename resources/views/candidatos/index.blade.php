<x-app-layout>
    <h2 class="text-center text-3xl leading-8 font-extrabold tracking-tight text-indigo-600 sm:text-4xl my-5">
        Candidatos a la Vacante: <span class="text-gray-900 dark:text-white">{{$vacante->titulo}}</span>
    </h2>
    <div class="px-2 pb-4">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-2 px-6 text-gray-900 dark:text-gray-100">
                    <div class="md:flex md:justify-center">
                        <ul class="divide-y divide-gray-300 dark:divide-gray-500 w-full">
                            @forelse ($vacante->candidatos as $candidato)
                                <li class="p-3 flex items-center">
                                    <div class="flex-1">
                                        <p class="text-xl font-medium text-gray-900 dark:text-gray-200">{{$candidato->user->name}}</p>
                                        <p class="text-sm text-gray-800 dark:text-gray-400">{{$candidato->user->email}}</p>
                                        <p class="text-sm font-medium text-gray-800 dark:text-gray-400">{{$candidato->created_at->diffForHumans()}}</p>
                                    </div>

                                    <div>
                                        <a 
                                            class="inline-flex items-center shadow-sm px-5 py-2 border-gray-300 text-sm font-bold leading-5 rounded-full text-white bg-indigo-600 hover:bg-indigo-800 dark:bg-gray-600 dark:hover:bg-gray-500" 
                                            href="{{asset('storage/cv/' . $candidato->cv)}}"
                                            target="__blanck"
                                            rel="noreferrer noopener"
                                        >
                                            Ver CV
                                        </a>
                                    </div>
                                </li>                            
                            @empty
                                
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
