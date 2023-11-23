<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500" wire:ignore>
                    {{ucfirst(Route::current()->getName())}}
                </h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

            </div>
        </div>
        <div class="mt-3">
                @include('layouts.under-construction-general')
                    {{-- @include('tables.violations') --}}

            </div>
        </div>
        @include('modals.instructions.create-tenant-modal')
    </div>
</div>
