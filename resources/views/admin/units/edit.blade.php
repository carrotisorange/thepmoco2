<x-app-layout>
    @section('title', '| '.$unit->unit.' | Edit',)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md w-full">
                            <ol class="list-reset flex">
                                <li><a href="/property/{{ Session('property') }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        Session::get('property_name')}}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li><a href="/property/{{ Session('property') }}/units"
                                        class="text-blue-600 hover:text-blue-700">Units</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li><a href="/unit/{{ $unit->uuid }}" class="text-blue-600 hover:text-blue-700">{{
                                        $unit->unit }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Edit</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button onclick="window.location.href='/unit/{{ $unit->uuid }}'">Back
                    </x-button>
                    <x-button data-modal-toggle="small-modal">
                        Create Building
                    </x-button>
                    <x-button onclick="window.location.href='/unit/{{ Str::random(10) }}/create'">Create Unit
                    </x-button>

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
                        <form action="/unit/{{ $unit->uuid }}/update" method="POST" id="edit-form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div>
                                <x-label for="unit" :value="__('Unit')" />

                                <x-input form="edit-form" class="block mt-1 w-full" type="text" name="unit"
                                    value="{{old('unit', $unit->unit)}}" required autofocus />

                                @error('unit')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>



                            <div class="mt-5">
                                <x-label for="building_id" :value="__('Building')" />

                                <select form="edit-form"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="building_id" id="building_id">
                                    @foreach($buildings as $building)
                                    <option value="{{ $building->id }}" {{ $building->id == $unit->building_id ?
                                        'selected' : ''
                                        }}>{{ $building->building }}</option>
                                    @endforeach
                                </select>

                                @error('building_id')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <x-label for="floor_id" :value="__('Floor')" />

                                <select form="edit-form"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="floor_id" id="floor_id">
                                    @foreach($floors as $floor)
                                    <option value="{{ $floor->id }}" {{ $floor->id == $unit->floor_id ?
                                        'selected' : ''
                                        }}>{{ $floor->floor }}</option>
                                    @endforeach
                                </select>

                                @error('floor_id')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <x-label for="category_id" :value="__('Category')" />

                                <select form="edit-form"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="category_id" id="category_id">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $unit->category_id) ==
                                        $category->id ? 'selected' : '' }}>
                                        {{ $category->category }}

                                        @endforeach
                                </select>

                                @error('category_id')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                          
                            <div class="mt-5">
                                <x-label for="category_id" :value="__('Status')" />

                                <select form="edit-form"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="status_id" id="status_id">
                                    @foreach($statuses as $status)
                                    <option value="{{ $status->id }}" {{ old('status_id', $unit->status_id) ==
                                        $status->id ? 'selected' : '' }}>
                                        {{ $status->status }}
                                        @endforeach
                                </select>

                                @error('status_id')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                         
                            <div class="mt-5">
                                <x-label for="size" :value="__('Size')" />

                                <x-input form="edit-form" class="block mt-1 w-full" type="text" name="size"
                                    value="{{old('size', $unit->size)}}" required autofocus />

                                @error('size')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <x-label for="rent" :value="__('Rent')" />

                                <x-input form="edit-form" class="block mt-1 w-full" type="number" name="rent"
                                    value="{{old('rent', $unit->rent)}}" autofocus />

                                @error('rent')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="mt-5">
                                <x-label for="discount" :value="__('Discount')" />

                                <x-input form="edit-form" class="block mt-1 w-full" type="number" name="discount"
                                    value="{{old('discount', $unit->discount)}}" autofocus />

                                @error('discount')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <x-label for="occupancy" :value="__('Occupancy')" />

                                <x-input form="edit-form" class="block mt-1 w-full" type="number" name="occupancy"
                                    value="{{old('occupancy', $unit->occupancy)}}" required autofocus />

                                @error('occupancy')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5 flex">
                                <div class="flex-3">
                                    <x-label for="thumbnail" :value="__('Thumbnail')" />

                                    <x-input form="edit-form" id="thumbnail" class="block mt-1 w-full" type="file"
                                        name="thumbnail" value="{{old('thumbnail', $unit->thumbnail)}}" autofocus />

                                    @error('thumbnail')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mt-6">
                                    <img class="h-10 w-10 rounded-xl ml-6" src="/storage/{{ $unit->thumbnail }}" alt="">
                                </div>
                            </div>

                            <h5 class="flex-1 text-right">
                                <x-button form="edit-form">Save</x-button>
                            </h5>



                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('utilities.create-building');
</x-app-layout>