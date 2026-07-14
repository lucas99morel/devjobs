{{-- When there is no desire, all things are at peace. - Laozi --}}
<div class="bg-gray-200 dark:bg-gray-700 p-5 mt-4 flex flex-col justify-center items-center sm:rounded-md">
    <h3 class="text-center text-gray-900 dark:text-white text-2xl font-bold mb-4">Postularme a esta vacante</h3>

    @if (session('mensaje'))
        <div class="pb-2 w-96">
            <p class="p-2 bg-green-700 border-l-4 border-green-400 text-white text-sm">
                {{ session('mensaje') }}
            </p>
        </div>
    @else
        <form class="w-96" wire:submit.prevent='postularme'>
            <div>
                <x-input-label for="cv" :value="__('Curriculum u Hoja de Vida (PDF)')" class="uppercase"/>
                <x-text-input wire:model='cv' id="cv" type="file" accept=".pdf" class="block mt-1 w-full"></x-text-input>
                <x-input-error :messages="$errors->get('cv')" class="mt-2" />
            </div>
        
            <div wire:loading.flex wire:target='cv' class="my-2 gap-2 items-center text-gray-600 dark:text-gray-300">
                <svg class="animate-spin h-4 w-4" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                <p class="block font-medium">Cargando archivo...</p>
            </div>

            <div class="flex justify-end">
                <x-primary-button class="mt-4" wire:loading.attr='disabled' wire:loading.class='opacity-30' wire:target='cv'>
                    {{ __('Postularme') }}
                </x-primary-button>
            </div>
        </form>
    @endif

</div>
