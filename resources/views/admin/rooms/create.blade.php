<x-app-layout>
    @section('title', '| Create')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <nav class="rounded-md w-full">
                <ol class="list-reset flex">
                    <li><a href="/property/{{ Session::get('property') }}" class="text-blue-600 hover:text-blue-700">{{
                            Session::get('property_name') }}</a>
                    </li>
                    <li><span class="text-gray-500 mx-2">/</span></li>
                    <li><a href="/property/{{ Session::get('property') }}/rooms"
                            class="text-blue-600 hover:text-blue-700">Rooms</a>
                    </li>
                    <li><span class="text-gray-500 mx-2">/</span></li>
                    <li class="text-gray-500">Create</li>
                </ol>
            </nav>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="flex flex-col items-center 
              justify-center">
                    <form method="POST" action="/room/{{ $batch_no }}/store">
                        @csrf
                        <div clas="">
                            <x-label for="number_of_rooms" :value="__('How many rooms you want to create?')" />

                            <x-input id="number_of_rooms" class="block mt-1 w-full" type="number" min="1"
                                name="number_of_rooms" :value="old('number_of_rooms', 1)" required autofocus />

                            @error('number_of_rooms')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror

                            <x-button class="mt-2">
                                {{ __('Submit') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>