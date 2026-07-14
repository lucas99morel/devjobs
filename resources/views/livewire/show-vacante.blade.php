{{-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius --}}
<div class=" p-6  pt-4">

    <div class="">

        <div class="md:grid md:grid-cols-2 bg-gray-100 dark:bg-gray-700 px-4 py-2  my-3">
            <p class="font-bold text-sm uppercase text-gray-800 dark:text-gray-200 my-3">Empresa:
                <span class="normal-case font-normal">{{$vacante->empresa}}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 dark:text-gray-200 my-3">Ultimo dia para postularse:
                <span class="normal-case font-normal">{{$vacante->ultimo_dia->toFormattedDateString()}}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 dark:text-gray-200 my-3">Categoria:
                <span class="normal-case font-normal">{{$vacante->categoria->categoria}}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 dark:text-gray-200 my-3">Salario:
                <span class="normal-case font-normal">{{$vacante->salario->salario}}</span>
            </p>
        </div>

        <div class="md:grid md:grid-cols-6 gap-4">
            <div class="md:col-span-2">
                <img src="{{asset('storage/vacantes/' . $vacante->imagen)}}" alt="{{'Imagen Vacante: ' . $vacante->titulo}}">
            </div>
            <div class="md:col-span-4 mt-2">
                <h2 class="text-xl text-gray-800 dark:text-gray-200 font-bold mb-2">Descripcion del Puesto</h2>
                <p class="text-gray-700 dark:text-gray-300">{{$vacante->descripcion}}</p>
            </div>
        </div>
        
    </div>
    @auth
        @cannot('create', App\Models\Vacante::class)
            <livewire:postular-vacante :vacante="$vacante" />
        @endcannot
    @endauth
    @guest
        <div class="mt-5 border border-gray-600 p-3 text-center text-gray-900 font-semibold dark:text-white">
            <p>
                Deseas postularte a esta vacante?
                <a class="font-bold text-indigo-600 dark:text-indigo-500" href="{{route('register')}}">Obten una cuenta y aplica a esta y otras vacantes</a>
            </p>
        </div>
    @endguest

</div>
