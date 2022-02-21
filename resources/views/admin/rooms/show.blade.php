<x-app-layout>
    @section('title', '| ',$room->room)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <nav class="rounded-md w-full">
                <ol class="list-reset flex">
                    <li><a href="/property/{{ Session::get('property') }}" class="text-blue-600 hover:text-blue-700">{{ Session::get('property_name') }}</a>
                    </li>
                    <li><span class="text-gray-500 mx-2">/</span></li>
                    <li><a href="/property/{{ Session::get('property') }}/rooms" class="text-blue-600 hover:text-blue-700">Rooms</a>
                    </li>
                    <li><span class="text-gray-500 mx-2">/</span></li>
                    <li class="text-gray-500">{{ $room->room }}</li>
                </ol>
            </nav>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row">
                        <div class="basis-1/4">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>