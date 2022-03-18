<x-app-layout>
    @section('title', '| '.$property->property.' | Edit',)
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

                                <li><a href="/property/{{ $property->uuid }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        $property->property }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Edit</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button onclick="window.location.href='/property/{{ Str::random(10) }}/create'">Create Property 
                    </x-button>
                    {{-- <x-button form="edit-form">Save</x-button> --}}
                </h5>

            </div>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <!-- Name -->
                    <div>
                        <form action="/property/{{ $property->uuid }}/update" method="POST" id="edit-form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div>
                                <x-label for="property" :value="__('Property')" />

                                <x-input form="edit-form" class="block mt-1 w-full" type="text" name="property"
                                    value="{{old('property', $property->property)}}" required autofocus />

                                @error('property')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <x-label for="type" :value="__('Description')" />

                                <textarea
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="description" id="description" cols="30"
                                    rows="10">{{ old('description', $property->description) }}</textarea>

                                @error('description')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <x-label for="type_id" :value="__('Type')" />

                                <select form="edit-form"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="type_id" id="type_id">
                                    @foreach($types as $type)
                                    <option value="{{ $type->id }}" {{ $type->id == $property->type_id ? 'selected' : ''
                                        }}>{{ $type->type }}</option>
                                    @endforeach
                                </select>

                                @error('type_id')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5 flex">
                                <div class="flex-3">
                                    <x-label for="thumbnail" :value="__('Thumbnail')" />

                                    <x-input form="edit-form" id="thumbnail" class="block mt-1 w-full" type="file"
                                        name="thumbnail" value="{{old('thumbnail', $property->thumbnail)}}" autofocus />

                                    @error('thumbnail')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mt-6">
                                    <img class="h-10 w-10 rounded-xl ml-6" src="/storage/{{ $property->thumbnail }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="mt-5">
                                <p class="text-right">
                                    <x-button>Save</x-button>
                                </p>
                            </div>


                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>