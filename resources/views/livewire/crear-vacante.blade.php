{{-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh --}}
<form action="" class="md:w-1/2 space-y-4" wire:submit.prevent='crearVacante' novalidate>
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
            wire:model="imagen"
            accept="image/*"
        />

        @if ($imagen)
            <div class="my-5 w-60">
                <p class="block font-medium text-sm text-gray-700 dark:text-gray-300">Preview:</p>
                <img src="{{ $imagen->temporaryUrl() }}" alt="PreviewImagenVacante">
            </div>
        @endif

        <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
    </div>

    <x-primary-button>
        Crear Vacante
    </x-primary-button>
</form>

