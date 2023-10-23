@props([
        'type'=>'button'
    ])

<button wire:loading.remove type="{{ $type }}" {{ $attributes->merge(['class' => '"w-64 items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center
bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) }}>
    {{ $slot }}
</button>

<button wire:loading disabled {{ $attributes->merge(['class' => '"w-64 items-center px-4 py-2 border
    border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center
    bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) }}>
   Loading <i class="fa-solid fa-spinner"></i>
</button>
