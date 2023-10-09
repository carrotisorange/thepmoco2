<div>
    <div class="mx-auto px-4 sm:px-6 lg:px-8">

        <div class="pt-6 sm:pb-5">

            <div>

                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-3xl font-bold text-gray-500">Unit Inventory / {{ $unit->unit }}</h1>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <button
                            onclick="window.location.href='/property/{{ $unit->property_uuid }}/unit/{{ $unit->uuid }}/inventory/{{ Str::random(8) }}/create'"
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                            type="button">Go back
                        </button>


                    </div> -
                </div>
                <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
                    <h3 class="text-base font-semibold leading-6 text-gray-900">Item</h3>
                    <p class="mt-1 text-sm text-gray-500">{{ $unit_inventory->item }}</p>
                </div>
                <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
                    <h3 class="text-base font-semibold leading-6 text-gray-900">Quantity</h3>
                    <p class="mt-1 text-sm text-gray-500">{{ $unit_inventory->quantity }}</p>
                </div>
                <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
                    <h3 class="text-base font-semibold leading-6 text-gray-900">Remarks</h3>
                    <p class="mt-1 text-sm text-gray-500">{{ $unit_inventory->remarks }}</p>
                </div>
                <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
                    <h3 class="text-base font-semibold leading-6 text-gray-900">Image</h3>
                    <div class="sm:col-span-3">
                        <p class="text-center">
                            <img class="aspect-[3/2] w-1/2 rounded-1xl object-cover"
                                src="{{ asset('/storage/'.$unit_inventory->image) }}" alt="" />
                        </p>

                        <div
                            class="mt-2 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600" wire:target="submitForm">
                                    <label for="image"
                                        class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload an image</span>
                                        <input id="image" name="image" type="file" class="sr-only" wire:model="image">

                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                <p class="text-center">
                                    @error('image')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @else
                                @if($image)
                                <p class="text-green-500 text-xs mt-2">Image has been uploaded!</p>
                                @endif
                                @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-right">
                    <x-button wire:click="submitForm()"
                        type="button">Confirm
                    </x-button>

                   
                </p>
            </div>
        </div>
    </div>
</div>