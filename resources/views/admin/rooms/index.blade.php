<x-app-layout>
    @section('title', '| Rooms')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rooms') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row">
                        <div class="basis-1/4">
                            
                        </div>
                        <div class="basis-3/4">
                            Rooms
                            <div class="basis-full">
                                <div class="11/12">
                                    @foreach($rooms as $room)
                                    <a href="/room/{{ $room->slug }}"><img src="/storage/{{ $room->thumbnail }}"
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>