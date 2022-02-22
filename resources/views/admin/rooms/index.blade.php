<x-app-layout>
    @section('title', '| Rooms')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md">
                            <ol class="list-reset flex">
                                <li><a href="/property/{{ Session::get('property') }}" class="text-blue-600 hover:text-blue-700">{{
                                        Session::get('property_name') }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Rooms ({{ $rooms->count() }})</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button onclick="window.location.href='/room/{{ Str::random(10) }}/create'">Create</x-button>
                </h5>
                
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (!$rooms->count())
                    <span class="text-center text-red">No rooms found!</span>
                    @else
                    <div class="flex flex-row">
                        <div class="basis-1/4">
                            Filters
                        </div>
                        <div class="basis-3/4">
                            Rooms
                            <div class="basis-full">
                                <div class="11/12">
                                    @foreach($rooms as $room)
                                    <a href="/room/{{ $room->uuid }}"><img src="/storage/{{ $room->thumbnail }}"
                                            class="p-2 bg-white border rounded max-w-sm mt-5 mx-5 ml-5 mr-5 hover:bg-purple-600"
                                            alt="..." />{{ $room->room }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-3">
                                {{ $rooms->links() }}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>