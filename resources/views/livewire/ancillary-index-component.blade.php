<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500" wire:ignore>
                    {{ucfirst(Route::current()->getName())}}
                </h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-button data-modal-toggle="violation-create-component">New ancillary </x-button>
            </div>
        </div>
        <div class="mt-3">
            @include('tables.ancillaries')
        </div>
    </div>
    {{-- @livewire('violation-create-component') --}}
</div>
