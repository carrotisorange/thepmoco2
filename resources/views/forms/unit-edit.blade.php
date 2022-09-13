<div>
    <form method="POST" wire:submit.prevent="submitForm()" class="w-full" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6 mt-9">

            <div class="sm:col-span-6">
                <div
                    class="relative bg-white border border-gray-300 rounded-md rounded-b-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                    <label for="name" class="block text-xs font-medium text-gray-900">Unit No.</label>
                    <input type="text" wire:model="unit" value="{{ old('unit', $unit_details->unit) }}"
                        class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                        placeholder="">
                </div>
            </div>

            <div class="sm:col-span-2">
                <div
                    class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                    <label for="building_id" class="block text-xs font-medium text-gray-900">Building</label>
                    <select wire:model="building_id"
                        class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                        @foreach($buildings as $building)
                        <option value="{{ $building->id }}" {{ old('building_id', $unit_details->
                            building_id) == $building->id ? 'selected' : 'selected' }}>
                            {{ $building->building }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="sm:col-span-2">
                <div
                    class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                    <label for="floor_id" class="block text-xs font-medium text-gray-900">Floor</label>
                    <select wire:model="floor_id"
                        class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                        @foreach($floors as $floor)
                        <option value="{{ $floor->id }}" {{ old('floor_id', $unit_details->
                            floor_id) == $floor->id ? 'selected' : 'selected' }}>
                            {{ $floor->floor }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="sm:col-span-2">
                <div
                    class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                    <label for="category_id" class="block text-xs font-medium text-gray-900">Category</label>
                    <select wire:model="category_id"
                        class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $unit_details->
                            category_id) == $category->id ? 'selected' : 'selected' }}>
                            {{ $category->category }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="sm:col-span-2">
                <div
                    class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                    <label for="job-title" class="block text-xs font-medium text-gray-900">Area</label>
                    <input type="text" wire:model="size" value="{{old('size', $unit_details->size)}}"
                        class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                        placeholder="">
                </div>
            </div>

            <div class="sm:col-span-2">
                <div
                    class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                    <label for="job-title" class="block text-xs font-medium text-gray-900">Occupancy</label>
                    <input type="text" wire:model="occupancy" value="{{old('occupancy', $unit_details->occupancy)}}"
                        class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                        placeholder="">
                </div>
            </div>

            <div class="sm:col-span-2">
                <div
                    class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                    <label for="job-title" class="block text-xs font-medium text-gray-900">Status</label>
                    <select wire:model="status_id"
                        class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                        @foreach($statuses as $status)
                        <option value="{{ $status->id }}" {{ old('status_id', $unit_details->
                            status_id) == $status->id ? 'selected' : 'selected' }}>
                            {{ $status->status }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="sm:col-span-3">
                <div
                    class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                    <label for="rent" class="block text-xs font-medium text-gray-900">Rent</label>
                    <input type="text" wire:model="rent" value="{{old('rent', $unit_details->rent)}}"
                        class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                        placeholder="">
                </div>
            </div>

            <div class="sm:col-span-3">
                <div
                    class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                    <label for="discount" class="block text-xs font-medium text-gray-900">Discount</label>
                    <input type="text" wire:model="discount" value="{{old('discount', $unit_details->discount)}}"
                        class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                        placeholder="">
                </div>
            </div>
        </div>
        <div class="mt-10 flex justify-end">
            <x-form-button wire:loading.remove wire:click="submitForm()">Update</x-form-button>
        </div>
    </form>
    @include('layouts.notifications')
</div>
{{-- <div>
    <form method="POST" wire:submit.prevent="submitForm()" class="w-full" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="flex flex-row">
            <div class="basis-full">
                <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                    <x-label for="unit" value="Unit" />

                    <x-form-input form="edit-form" type="text" wire:model="unit"
                        value="{{ old('unit', $unit_details->unit) }}" required autofocus />

                    @error('unit')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="basis-full">
                <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                    <x-label for="building_id" :value="__('Building')" />

                    <x-form-select form="edit-form" wire:model="building_id">
                        @foreach($buildings as $building)
                        <option value="{{ $building->id }}" {{ old('building_id', $unit_details->
                            building_id) == $building->id ? 'selected' : 'selected' }}>
                            {{ $building->building }}
                        </option>
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

                    <x-form-select form="edit-form" wire:model="floor_id">
                        @foreach($floors as $floor)
                        <option value="{{ $floor->id }}" {{ old('floor_id', $unit_details->
                            floor_id) == $floor->id ? 'selected' : 'selected' }}>
                            {{ $floor->floor }}
                        </option>
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

                    <x-form-select form="edit-form" wire:model="category_id">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $unit_details->
                            category_id) == $category->id ? 'selected' : 'selected' }}>
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

                    <x-form-select form="edit-form" wire:model="status_id">
                        @foreach($statuses as $status)
                        <option value="{{ $status->id }}" {{ old('status_id', $unit_details->
                            status_id) == $status->id ? 'selected' : 'selected' }}>
                            {{ $status->status }}
                        </option>
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

                    <x-form-input form="edit-form" type="text" wire:model="size"
                        value="{{old('size', $unit_details->size)}}" required autofocus />

                    @error('size')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="basis-full">
                <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                    <x-label for="rent" :value="__('Rent')" />

                    <x-form-input form="edit-form" type="number" step="0.00" wire:model="rent"
                        value="{{old('rent', $unit_details->rent)}}" autofocus />

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

                    <x-form-input form="edit-form" type="number" step="0.00" wire:model="discount"
                        value="{{old('discount', $unit_details->discount)}}" autofocus />

                    @error('discount')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="basis-full">
                <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                    <x-label for="occupancy" :value="__('No of Beds')" />

                    <x-form-input form="edit-form" type="number" wire:model="occupancy"
                        value="{{old('occupancy', $unit_details->occupancy)}}" autofocus />

                    @error('occupancy')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

        </div>
        <div class="mt-5">
            <p class="text-right">
                <x-form-button wire:loading.remove wire:click="submitForm()">Update</x-form-button>
            </p>
        </div>
</div>
</form>
@include('layouts.notifications')
</div> --}}