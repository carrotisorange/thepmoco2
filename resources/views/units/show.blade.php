<x-index-layout>
    @section('title', ' | '.$unit->unit)
    <x-slot name="labels">
        {{ $unit->unit }}
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/unit'">Go back to
            units
        </x-button>
        <x-button data-modal-toggle="add-building-modal">Create a building
        </x-button>
        {{-- @include('utilities.show-unit-show-options')
        @include('utilities.show-unit-create-options') --}}
    </x-slot>

    <div class="p-6 bg-white border-b border-gray-200">
   
        <div>
            <form action="/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/update" method="POST"
                id="edit-form" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="flex flex-row">
                    <div class="basis-full">
                        <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                            <x-label for="unit" value="Unit" />

                            <x-form-input form="edit-form" type="text" name="unit" value="{{old('unit', $unit->unit)}}"
                                required autofocus />

                            @error('unit')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="basis-full">
                        <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                            <x-label for="building_id" :value="__('Building')" />

                            <x-form-select form="edit-form" name="building_id" id="building_id">
                                @foreach($buildings as $building)
                                <option value="{{ $building->id }}" {{ $building->id == $unit->building_id ?
                                    'selected' : ''
                                    }}>{{ $building->building }}</option>
                                @endforeach
                            </x-form-select>

                            @error('building_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="basis-full">
                        <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                            <x-label for="floor_id" :value="__('Floor')" />

                            <x-form-select form="edit-form" name="floor_id" id="floor_id">
                                @foreach($floors as $floor)
                                <option value="{{ $floor->id }}" {{ $floor->id == $unit->floor_id ?
                                    'selected' : ''
                                    }}>{{ $floor->floor }}</option>
                                @endforeach
                            </x-form-select>

                            @error('floor_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="basis-full">
                        <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                            <x-label for="category_id" :value="__('Category')" />

                            <x-form-select form="edit-form" name="category_id" id="category_id">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $unit->category_id) ==
                                    $category->id ? 'selected' : '' }}>
                                    {{ $category->category }}
                                </option>
                                @endforeach
                            </x-form-select>

                            @error('category_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="flex flex-row">
                    <div class="basis-full">
                        <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                            <x-label for="category_id" :value="__('Status')" />

                            <x-form-select form="edit-form" name="status_id" id="status_id">
                                @foreach($statuses as $status)
                                <option value="{{ $status->id }}" {{ old('status_id', $unit->status_id) ==
                                    $status->id ? 'selected' : '' }}>
                                    {{ $status->status }}
                                    @endforeach
                            </x-form-select>

                            @error('status_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                        <div class="basis-full">
                            <x-label for="size" :value="__('Size')" />

                            <x-form-input form="edit-form" type="text" name="size" value="{{old('size', $unit->size)}}"
                                required autofocus />

                            @error('size')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="basis-full">
                        <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                            <x-label for="rent" :value="__('Rent')" />

                            <x-form-input form="edit-form" type="number" step="0.00" name="rent"
                                value="{{old('rent', $unit->rent)}}" autofocus />

                            @error('rent')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-row">
                    <div class="basis-full">
                        <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                            <x-label for="discount" :value="__('Discount')" />

                            <x-form-input form="edit-form" type="number" step="0.00" name="discount"
                                value="{{old('discount', $unit->discount)}}" autofocus />

                            @error('discount')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="basis-full">
                        <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                            <x-label for="occupancy" :value="__('No of Beds')" />

                            <x-form-input form="edit-form" type="number" name="occupancy"
                                value="{{old('occupancy', $unit->occupancy)}}" autofocus />

                            @error('occupancy')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    {{--
                    <div class="mt-5 flex">
                        <div class="flex-3">
                            <x-label for="thumbnail" :value="__('Thumbnail')" />

                            <x-form-input form="edit-form" id="thumbnail" type="file" name="thumbnail"
                                value="{{old('thumbnail', $unit->thumbnail)}}" autofocus />

                            @error('thumbnail')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-6">
                            <img class="h-10 w-10 rounded-xl ml-6" src="/storage/{{ $unit->thumbnail }}" alt="">
                        </div>
                    </div> --}}
                </div>
                <div class="">
                    <div class="mt-5">
                        <p class="text-right">
                            <x-button form="edit-form">Update</x-button>
                        </p>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>

    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Contracts</h1>
        @include('tables.contracts')
        <div class="mt-5">
            {{ $contracts->links() }}
        </div>
        <div class="mt-5">
            <p class="text-right">
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/tenant/{{ Str::random(8) }}/create'">
                    Add
                </x-button>
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/contracts/'">
                    See more
                </x-button>
            </p>
        </div>
    </div>


    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Deed of sales</h1>
        @include('tables.deed_of_sales')
        <div class="mt-5">
            {{ $deed_of_sales->links() }}
            <p class="text-right">
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/owner/{{ Str::random(8) }}/create'">
                    Add
                </x-button>
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/deed_of_sales/'">
                    See more
                </x-button>
            </p>
        </div>
    </div>



    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Enrollees</h1>
        @include('tables.enrollees')
        <div class="mt-5">
            {{ $enrollees->links() }}
            <p class="text-right">
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/{{ $unit->uuid }}/enrollee/'">
                    Add
                </x-button>
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/enrollee/'">
                    See more

                </x-button>
            </p>
        </div>
    </div>

    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Bills</h1>
        @include('tables.bills')
        <div class="mt-5">
         {{ $bills->links() }}
            <p class="text-right">
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/bills/'">
                    See more
                </x-button>
            </p>
        </div>
    </div>
    @include('utilities.create-building-modal')
</x-index-layout>