{{-- Do what you can, with what you have, where you are. - Theodore Roosevelt --}}
<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg divide-y-8 divide-gray-100 dark:divide-gray-900">
        @forelse ($vacantes as $vacante )
            <div class="py-4 px-6 mb-1 text-gray-900 dark:text-gray-100 sm:flex sm:justify-between sm:items-center">
                <div class="">
                    <a href="{{route('vacantes.show',$vacante->id)}}" class="text-3xl font-extrabold text-gray-800 dark:text-gray-100 mb-1">
                        {{$vacante->titulo}}
                    </a>
                    <p class="text-base font-bold dark:text-gray-300 text-gray-800 mb-3">{{$vacante->empresa}}</p>
                    <p class="text-xs font-semibold dark:text-gray-300 text-gray-800">
                        Ultimo dia para postularse:
                        <span class="text-gray-700 dark:text-gray-400 font-normal">{{$vacante->ultimo_dia->format('d/m/Y')}}</span>
                    </p>
                </div>
    
                <div class="sm:flex sm:justify-between gap-3 items-center mt-4 md:mt-0">
                    <a 
                        href="{{ route('candidatos.index', $vacante) }}" 
                        class="bg-slate-600 py-3 md:py-2 px-4 rounded-lg text-white text-xs font-bold uppercase"
                    >{{$vacante->candidatos->count()}} Candidatos</a>
                    <a 
                        href="{{ route('vacantes.edit',$vacante->id) }}" 
                        class="bg-indigo-600 py-3 md:py-2 px-4 rounded-lg text-white text-xs font-bold uppercase"
                    >Editar</a>
                    <button 
                        wire:click="$dispatch('mostrarAlerta', { id: {{ $vacante->id }} })"
                        class="bg-red-600 py-3 md:py-2 px-4 rounded-lg text-white text-xs font-bold uppercase"
                    >Eliminar</button>
                </div>
            </div>
        @empty 
            <div class="flex justify-center items-center font-bold dark:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                </svg>
                <p class="p-3 text-center text-lg text-gray-800 dark:text-white">No hay vacantes aun</p>
            </div>
        @endforelse

    </div>
    <div class="mt-4 px-6 pb-4">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('mostrarAlerta', (evento) => {
            Swal.fire({
                title: 'Eliminar vacante?',
                text: "Una vez eliminado, no se puede revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('eliminarVacante', { id: evento.id });
                }
            });
        });

        Livewire.on('vacanteEliminada', () => {
            Swal.fire('Eliminado!', 'La vacante fue eliminada', 'success');
        });
    </script>
@endpush