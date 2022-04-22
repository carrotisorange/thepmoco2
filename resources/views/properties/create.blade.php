<x-property-base>
    <x-slot name="header">
        <header class="bg-white shadow">
            <div class="max-w-12xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="flex">
                    <div class="h-3">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            <nav class="rounded-md">
                                <ol class="list-reset flex">
                                    <li><a href="/properties/" class="text-blue-600 hover:text-blue-700">Properties</a>
                                    </li>

                                    <li><span class="text-gray-500 mx-2">/</span></li>
                                    <li class="text-gray-500">Create</li>
                                </ol>
                            </nav>
                        </h2>
                    </div>
                    <h5 class="flex-1 text-right">
                        <x-button onclick="window.location.href='/properties'">
                            <i class="fa-solid fa-circle-left"></i> Back
                        </x-button>
                    </h5>

                </div>
            </div>

        </header>
    </x-slot>


    <x-slot name="body">
        @livewire('property-component', ['types' => $types])
    </x-slot>
</x-property-base>