{{-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Maria Skłodowska-Curie --}}
<form action="" class="md:w-4/5 space-y-4" wire:submit.prevent='editarVacante' novalidate>
    <div>
        <x-input-label for="titulo" :value="__('Titulo de la Vacante')" />
        <x-text-input 
            id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="titulo" 
            :value="old('titulo')" 
            required autofocus 
            placeholder="Vacante para..."
        />
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>

    <div class="">
        <x-input-label for="salario" :value="__('Salario')" />
        <select 
            wire:model="salario" 
            id="salario" 
            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        >
            <option value="" class="hidden">~~ Seleccionar ~~</option>    
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach  
        </select>
        <x-input-error :messages="$errors->get('salario')" class="mt-2" />
    </div>

    <div class="">
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select 
            wire:model="categoria" 
            id="categoria" 
            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        >
            <option value="" class="hidden">~~ Seleccionar ~~</option>    
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach  
        </select>
        <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Nombre de la Empresa')" />
        <x-text-input 
            id="empresa" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="empresa" 
            :value="old('empresa')" 
            required autofocus 
            placeholder="Ejemplo: Uber, Netflix, Shopify..."
        />
        <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo dia para postularse')" />
        <x-text-input 
            id="ultimo_dia" 
            class="block mt-1 w-full" 
            type="date" 
            wire:model="ultimo_dia" 
            :value="old('ultimo_dia')" 
            required autofocus 
        />
        <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripcion de la Vacante')" />
        <textarea 
            wire:model="descripcion" 
            id="descripcion"
            placeholder="Descripcion breve, experiencia, etc"
            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm h-36"
        ></textarea>
        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen de Referencia')" />
        <x-text-input 
            id="imagen" 
            class="block mt-1 w-full" 
            type="file" 
            wire:model="imagenNueva"
            accept="image/*"
        />
        <div class="sm:flex sm:justify-start sm:gap-4">
            <div class="my-5 w-60">
                <x-input-label :value="__('Imagen Actual:')" />
                <img src="{{ asset('storage/vacantes/' . $imagen) }}" alt="{{ 'Imagen Vacante: ' . $titulo }}">
            </div>

            <div wire:loading.flex wire:target='imagenNueva' class="my-2 gap-2 items-center">
                <svg class="animate-spin h-4 w-4" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                <p class="block font-medium text-gray-700 dark:text-gray-300">Cargando imagen Nueva...</p>
            </div>
            
            @if ($imagenNueva)
                <div class="my-5 w-60">
                    <p class="block font-medium text-sm text-gray-700 dark:text-gray-300">Imagen Nueva:</p>
                    <img src="{{ $imagenNueva->temporaryUrl() }}" alt="PreviewImagenVacante">
                </div>
            @endif
        </div>

        <x-input-error :messages="$errors->get('imagenNueva')" class="mt-2" />
    </div>  

    <x-primary-button wire:loading.attr='disabled' wire:loading.class='opacity-30' wire:target='imagenNueva'>
        Guardar Cambios
    </x-primary-button>
</form>
