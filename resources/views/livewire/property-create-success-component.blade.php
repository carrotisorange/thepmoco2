<div>
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">

        <h2 class="p-10 text-center text-3xl font-bold tracking-tight text-gray-900 font-pop">You've
            successfully created {{ $property->property .' '. $property->type->type }}!</h2>
        <div class=" flex items-center justify-center">
            <img class="h-48 w-auto" src="{{ asset('/brands/success_property.png') }}">
        </div>

        <div class=" mt-10 flex items-center justify-center">
            <button type="button" wire:click="redirectToUnitPage" wire:loading.remove
                class="w-64 items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Let's get started.</button>

            <button type="button" wire:loading disabled
                class="w-64 items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Loading...</button>
        </div>
    </div>
</div>