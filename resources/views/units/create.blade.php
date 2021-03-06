<x-app-layout>
    @section('title', '| Units | Create')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md w-full">
                            <ol class="list-reset flex">
                                <li><a href="/property/{{ Session::get('property') }}" class="text-blue-600 hover:text-blue-700">{{
                                        Session::get('property_name') }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li><a href="/property/{{ Session::get('property') }}/units" class="text-blue-600 hover:text-blue-700">Units</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Create</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/units'"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp Back
                    </x-button>
                   
                </h5>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="flex flex-col items-center 
              justify-center">
                    <form method="POST" action="/unit/{{ $batch_no }}/store">
                        @csrf
                        <div clas="">
                            <x-label for="number_of_units" :value="__('How many units you want to create?')" />

                            <x-input id="number_of_units" class="block mt-1 w-full" type="number" min="1"
                                name="number_of_units" :value="old('number_of_units', 1)" autofocus />

                            @error('number_of_units')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror

                            <x-button class="mt-2">
                                <p class="text-right">{{ __('Submit') }}</p>
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>