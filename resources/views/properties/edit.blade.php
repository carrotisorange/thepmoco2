<x-app-layout>
    @section('title', '| '.$property_details->property.' | Edit',)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md w-full">
                            <ol class="list-reset flex">
                                <li><a href="/properties" class="text-blue-600 hover:text-blue-700">Properties </a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>

                                <li><a href="/property/{{ $property_details->uuid }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        $property_details->property }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Edit</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button onclick="window.location.href='/property/{{ Session::get('property') }}'"><i
                            class="fa-solid fa-circle-arrow-left"></i>&nbspBack
                    </x-button>
                    <x-button onclick="window.location.href='/property/{{ Str::random(10) }}/create'"><i
                            class="fa-solid fa-circle-plus"></i>&nbspProperty
                    </x-button>
                    {{-- <x-button form="edit-form">Save</x-button> --}}
                </h5>

            </div>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border-b border-gray-200">
                    <div>
                        @livewire('property-edit-component', ['property_details' => $property_details])
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>