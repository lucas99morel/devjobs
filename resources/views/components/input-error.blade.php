@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <p class="p-2 bg-red-700 border-l-4 border-red-400 text-white text-md">
                {{ $message }}
            </p>
        @endforeach
    </div>
@endif
