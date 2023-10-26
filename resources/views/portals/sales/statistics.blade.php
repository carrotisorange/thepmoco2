<x-sale-portal-layout>
    <div class=" mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mt-10 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700" wire:ignore>
                        {{ucfirst(Route::current()->getName())}}
                    </h1>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                </div>
            </div>

            <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">

                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                    <div
                        class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <!-- Selected row actions, only show when rows are selected. -->
                        <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                        </div>

                      <div class="bg-white py-24 sm:py-32">
                        <div class="mx-auto max-w-7xl px-6 lg:px-8">
                            <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-6">
                                <div class="mx-auto flex max-w-xs flex-col gap-y-2">
                                    <dt class="text-base leading-7 text-gray-600">Buildings</dt>
                                    <dd class="order-first text-xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ number_format($buildings,0) }}</dd>
                                </div>
                                <div class="mx-auto flex max-w-xs flex-col gap-y-2">
                                    <dt class="text-base leading-7 text-gray-600">Units</dt>
                                    <dd class="order-first text-xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ number_format($units,0) }}
                                    </dd>
                                </div>
                                <div class="mx-auto flex max-w-xs flex-col gap-y-2">
                                    <dt class="text-base leading-7 text-gray-600">Users</dt>
                                    <dd class="order-first text-xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ number_format($users,0) }}</dd>
                                </div>
                                <div class="mx-auto flex max-w-xs flex-col gap-y-2">
                                    <dt class="text-base leading-7 text-gray-600">Owners</dt>
                                    <dd class="order-first text-xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ number_format($owners,0) }}</dd>
                                </div>
                                <div class="mx-auto flex max-w-xs flex-col gap-y-2">
                                    <dt class="text-base leading-7 text-gray-600">Tenants</dt>
                                    <dd class="order-first text-xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ number_format($tenants,0) }}</dd>
                                </div>
                                <div class="mx-auto flex max-w-xs flex-col gap-y-2">
                                    <dt class="text-base leading-7 text-gray-600">Personnels</dt>
                                    <dd class="order-first text-xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ number_format($personnels,0) }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    </div>

                </div>
            </div>
        </div>


    </div>
</x-sale-portal-layout>

