<x-new-layout>
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
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
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                    </div>

                    <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="mb-5 mt-2 relative overflow-hidden ring-opacity-5">
                            @include('tables.delinquents')
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</x-new-layout>
