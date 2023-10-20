<x-tenant-portal-layout>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700" wire:ignore>
                    {{ucfirst(Route::current()->getName())}}
                </h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-button onclick="window.location.href='/{{ auth()->user()->role_id }}/tenant/{{ auth()->user()->username }}/concerns/create'">
                    New Concern
                </x-button>

            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                    <div class="mb-10 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">

                        <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                        </div>

                        @include('tables.concerns')

                </div>
            </div>
        </div>
    </div>
</x-tenant-portal-layout>
