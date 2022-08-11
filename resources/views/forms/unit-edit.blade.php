<form action="/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/update" method="POST" id="edit-form"
    enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="flex flex-row">
        <div class="basis-full">
            <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                <x-label for="unit" value="Unit" />

                <x-form-input form="edit-form" type="text" name="unit" value="{{old('unit', $unit->unit)}}" required
                    autofocus />

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

                <x-form-input form="edit-form" type="text" name="size" value="{{old('size', $unit->size)}}" required
                    autofocus />

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
    <div class="mt-5">
        <p class="text-right">
            <x-form-button type="submit" wire:loading.remove wire:click="submitForm()" id="create-form">
                Update
            </x-form-button>
        </p>
    </div>
    </div>
</form>