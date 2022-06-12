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
                                <li>{{$unit->unit }}</a>
                                </li>

                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/units'">Go back to
                        units
                    </x-button>
                    <x-button data-modal-toggle="add-building-modal">Create a building
                    </x-button>
                    {{-- <x-button data-modal-toggle="add-building-modal">
                        <i class="fa-solid fa-circle-plus"></i>&nbspBuilding
                    </x-button> --}}
                    {{-- <x-button onclick="window.location.href='/unit/{{ Str::random(10) }}/create'"><i
                            class="fa-solid fa-circle-plus"></i>&nbspUnit
                    </x-button> --}}
                    @include('utilities.show-unit-show-options')
                    @include('utilities.show-unit-create-options')
                </h5>

            </div>
    </x-slot>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border-b border-gray-200">
                    <div>
                        <form action="/unit/{{ $unit->uuid }}/update" method="POST" id="edit-form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div>
                                <x-label for="unit" value="Unit" />

                                <x-form-input form="edit-form" type="text" name="unit"
                                    value="{{old('unit', $unit->unit)}}" required autofocus />

                                @error('unit')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-5">
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

                            <div class="mt-5">
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

                            <div class="mt-5">
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


                            <div class="mt-5">
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

                            <div class="mt-5">
                                <x-label for="" :value="__('Leasing')" />
                                @if($unit->is_enrolled == 0)
                                <p>Unerolled</p>
                                @elseif($unit->is_enrolled == 1)
                                <p>Enrolled</p>
                                @else
                                <p>Pulled out</p>
                                @endif
                            </div>

                            <div class="mt-5">
                                <x-label for="size" :value="__('Size')" />

                                <x-form-input form="edit-form" type="text" name="size"
                                    value="{{old('size', $unit->size)}}" required autofocus />

                                @error('size')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <x-label for="rent" :value="__('Rent')" />

                                <x-form-input form="edit-form" type="number" step="0.00" name="rent"
                                    value="{{old('rent', $unit->rent)}}" autofocus />

                                @error('rent')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="mt-5">
                                <x-label for="discount" :value="__('Discount')" />

                                <x-form-input form="edit-form" type="number" step="0.00" name="discount"
                                    value="{{old('discount', $unit->discount)}}" autofocus />

                                @error('discount')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <x-label for="occupancy" :value="__('Occupancy')" />

                                <x-form-input form="edit-form" type="number" name="occupancy"
                                    value="{{old('occupancy', $unit->occupancy)}}" autofocus />

                                @error('occupancy')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
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

                            <div class="mt-5">
                                <h5 class="flex-1 text-right">
                                    <x-button form="edit-form">Save</x-button>
                                </h5>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('utilities.create-building-modal');
</x-app-layout>