<x-app-layout>
    @section('title', '| Create')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <nav class="rounded-md w-1/2">
                <ol class="list-reset flex">
                    <li><a href="/properties/" class="text-blue-600 hover:text-blue-700">Properties</a></li>
                    <li><span class="text-gray-500 mx-2">/</span></li>
                    <li><a href="/property/{{ Session::get('property') }}/employees" class="text-blue-600 hover:text-blue-700">Employees</a></li>
                    <li><span class="text-gray-500 mx-2">/</span></li>
                    <li class="text-gray-500">Create</li>
                </ol>
            </nav>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <!-- Name -->
                    <div>
                        <form action="/property/{{ $random_str }}/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <x-label for="property" :value="__('Property')" />

                                <x-input id="property" class="block mt-1 w-full" type="text" name="property"
                                    :value="old('property')" required autofocus />

                                @error('property')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <x-label for="type" :value="__('Type')" />

                                <select
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="type_id" id="type">
                                    <option value="">Select one</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                                    @endforeach
                                </select>

                                @error('type')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <x-label for="thumbnail" :value="__('Thumbnail')" />

                                <x-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail"
                                    :value="old('thumbnail')" required autofocus />

                                @error('thumbnail')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <p class="text-right">
                                    <x-button>Submit</x-button>
                                </p>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>